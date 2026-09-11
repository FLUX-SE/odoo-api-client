# Upgrade guide

## Migrating from JSON-RPC to JSON-2 (Odoo 19)

**This is an explicit, opt-in migration, not a protocol change on package update.**
`OdooApiClientBuilder` still defaults to JSON-RPC; its explicit XML-RPC mode is
unchanged. Keep RPC for Odoo 17/18. JSON-2 support is experimental and targets
Odoo 19; validate it against your own installed modules and access rules.

### 1. Prepare the connection and credentials

- Use an Odoo 19 server with external API access available to your account.
- Create a dedicated API key for an integration user with the required rights.
  A user password is **not** a JSON-2 API key. Plan key expiry, rotation and revocation.
- Inject the key through a secret manager or protected process environment.
  Never put it in source code, command arguments, URLs, logs or test reports.
- Supply the base URL (including any reverse-proxy prefix), **without** `/jsonrpc`
  or `/json/2`. Use HTTPS outside isolated local tests and specify the database.

The generator's environment variables change as follows. In PHP application
code, pass the corresponding values explicitly to the connection and builder.

| JSON-RPC CLI configuration | JSON-2 CLI configuration |
| --- | --- |
| `ODOO_API_HOST` | `ODOO_JSON2_HOST` or `--host` |
| `ODOO_API_DATABASE` | `ODOO_JSON2_DATABASE` or `--database` |
| `ODOO_API_PASSWORD` | `ODOO_JSON2_API_KEY` (required) |
| `ODOO_API_USERNAME` | `ODOO_JSON2_USERNAME` (optional compatibility label only) |

The key determines the Odoo user. The JSON-2 username is not authenticated,
does not select a user and is not sent to Odoo. No RPC login is performed before
JSON-2 calls. If explicitly requested, `retrieveUid()` reads `res.users/context_get`.

### 2. Replace the builder, retain supported business operations

The examples assume Composer autoloading and your existing validated `$host`,
`$database`, `$username` and `$password` application configuration.

**Before — JSON-RPC:**

````php
use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;

$builder = new OdooApiClientBuilder($host);
$records = $builder->buildExecuteKwOperations(
    RecordListOperations::class, $database, $username, $password,
);
````

**After — read the separately provisioned API key:**

````php
use FluxSE\OdooApiClient\Api\Json2\Json2Connection;
use FluxSE\OdooApiClient\Builder\Json2\Json2ApiClientBuilder;

$apiKey = getenv('ODOO_JSON2_API_KEY');
if (!is_string($apiKey) || '' === $apiKey) {
    throw new RuntimeException('ODOO_JSON2_API_KEY is required.');
}
````

Then construct the JSON-2 operations:

````php
$connection = new Json2Connection($host, $apiKey, $database);
$builder = new Json2ApiClientBuilder($connection, '', $apiKey);
$records = $builder->buildRecordListOperations();
````

Pass **the same key** to both constructors: the builder's explicit third argument
is required. Its second argument can stay empty. Unlike the RPC builder,
`buildExecuteKwOperations()` now takes only the operations class;
`buildObjectOperations()` takes no arguments. Update dependency-injection factories:
the new builder does not implement `OdooApiClientBuilderInterface`.

The supported business call stays the same with either builder:

````php
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;

$options = new SearchReadOptions();
$options->addField('name');
$options->setLimit(5);
$partners = $records->search_read('res.partner', null, $options);
````

Use `buildRecordOperations()`, `buildModelManager()` and `buildModelListManager()`
for the corresponding existing consumers. For `fields_get`, use the dedicated
`buildInspectionOperations()`. Configure injected PSR clients before building
operations; ensure they do not forward the Bearer token across origins on redirects.

### 3. Check calls that are not drop-in compatible

| Existing assumption | Required change |
| --- | --- |
| `common`, `db`, or raw RPC request-maker calls | Keep these on RPC where available; JSON-2 does not emulate them. |
| Arbitrary positional custom methods | Register an exact model/method signature, or use named parameters with the native client below. |
| Passing UID/password inside method arguments | Do not add them to JSON-2 parameters; authentication uses the API key. Preserve the required `context`, including company and language. |
| Manually decoding every response as a JSON-RPC envelope | Only the compatibility facade returns a local synthetic envelope. Decode native responses with the native client. |
| A scalar ID from native `create` | Native JSON-2 expects `vals_list` and returns a list of IDs. The single-record compatibility wrapper still returns an integer. |
| Custom methods returning `null` or a float | Use the native client; the compatibility facade rejects these result types. |

The native API returns a PSR response from `call()`, not decoded data:

````php
$client = $builder->buildJson2Client();
$response = $client->call('res.partner', 'search_read', [
    'domain' => [], 'fields' => ['id', 'name'], 'limit' => 5,
]);
$partners = $client->decode($response);
````

Review exception handling: native HTTP failures use `Json2HttpException`; the
facade maps 4xx/5xx to the historical `ClientErrorException`/`ServerErrorException`.
Transport and decoding failures remain distinct JSON-2 exceptions. Unsupported
calls/results fail explicitly instead of silently falling back to RPC.

### 4. Regenerate and verify model classes

After securely injecting `ODOO_JSON2_API_KEY`, select JSON-2 explicitly:

````sh
vendor/bin/odoo-model-classes-generator --api=json2 \
    --host=https://example.odoo.com --database=odoo-test \
    ./build/Odoo/Model/Object "App\Odoo\Model\Object"
````

Do not pass the key via `--password`; that option is RPC-only. Generate into a
temporary directory first, compare with your current classes, then update your
autoload configuration if needed. Verify changed Odoo fields, dates and relations.
The API user also needs read access to the model metadata used by the generator.

### 5. Roll out gradually and keep a rollback path

Add or update application tests and run them on a disposable Odoo 19 database:
first compare reads, then verify CRUD and accounting actions with the real user's
rights, context and expected server-side effects. Keep a separate RPC builder
behind a feature flag until the migrated paths are verified.

There is **no automatic retry or fallback**. Never dual-write through both
protocols. After a write timeout, reconcile Odoo's state before deciding whether
to retry. Rollback changes routing for future calls; it must not replay an
ambiguous write. Retire old credentials only after all remaining RPC users migrate.

See the [detailed migration guide](docs/json2-migration-guide.md) for supported
signatures and custom methods, and [integration testing](docs/json2-integration-testing.md)
for the reproducible Docker checks. These are consumer upgrade instructions,
not instructions for upgrading the Odoo server or migrating its database.
