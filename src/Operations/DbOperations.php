<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations;

use Webmozart\Assert\Assert;

final class DbOperations extends AbstractOperations implements DbOperationsInterface
{
    public function getEndpointPath(): string
    {
        return '/db';
    }

    public function list(bool $document = false): array
    {
        $response = $this->request(__FUNCTION__, [$document]);

        return $this->deserializeArrayOfString($response);
    }

    public function server_version(): string
    {
        $response = $this->request(__FUNCTION__);

        return $this->deserializeString($response);
    }

    public function db_exist(string $dbName): bool
    {
        $response = $this->request(__FUNCTION__, [$dbName]);

        return $this->deserializeBoolean($response);
    }

    public function list_lang(): array
    {
        $response = $this->request(__FUNCTION__);

        return $this->getRpcSerializerHelper()->decodeResponseBody($response->getBody());
    }

    public function create_database(
        string $masterPassword,
        string $dbName,
        string $demo,
        string $lang,
        string $serPassword = 'admin',
        string $login = 'admin',
        ?string $countryCode = null,
        ?string $phone = null
    ): array {
        $response = $this->request(__FUNCTION__, [
            $masterPassword,
            $dbName,
            $demo,
            $lang,
            $serPassword,
            $login,
            $countryCode,
            $phone,
        ]);

        return $this->deserializeArrayOfString($response);
    }

    public function duplicate_database(
        string $masterPassword,
        string $dbOriginalName,
        string $dbName
    ): bool {
        $response = $this->request(__FUNCTION__, [
            $masterPassword,
            $dbOriginalName,
            $dbName,
        ]);

        return $this->deserializeBoolean($response);
    }

    public function drop(
        string $masterPassword,
        string $dbName
    ): bool {
        $response = $this->request(__FUNCTION__, [
            $masterPassword,
            $dbName,
        ]);

        return $this->deserializeBoolean($response);
    }

    public function dump(
        string $masterPassword,
        string $dbName,
        string $format = 'zip'
    ): string {
        $response = $this->request(__FUNCTION__, [
            $masterPassword,
            $dbName,
            $format,
        ]);

        return $this->deserializeString($response);
    }

    public function restore(
        string $masterPassword,
        string $dbName,
        string $data,
        bool $copy = false
    ): bool {
        $response = $this->request(__FUNCTION__, [
            $masterPassword,
            $dbName,
            $data,
            $copy,
        ]);

        return $this->deserializeBoolean($response);
    }

    public function rename(
        string $masterPassword,
        string $oldName,
        string $newName
    ): bool {
        $response = $this->request(__FUNCTION__, [
            $masterPassword,
            $oldName,
            $newName,
        ]);

        return $this->deserializeBoolean($response);
    }

    public function change_admin_password(
        string $masterPassword,
        string $newPassword
    ): bool {
        $response = $this->request(__FUNCTION__, [
            $masterPassword,
            $newPassword,
        ]);

        return $this->deserializeBoolean($response);
    }

    public function migrate_databases(
        string $masterPassword,
        array $databases
    ): bool {
        $response = $this->request(__FUNCTION__, [
            $masterPassword,
            $databases,
        ]);

        return $this->deserializeBoolean($response);
    }

    public function list_countries(string $masterPassword): array
    {
        $response = $this->request(__FUNCTION__, [$masterPassword]);

        $decodeResponseBody = $this->getRpcSerializerHelper()->decodeResponseBody($response->getBody());
        Assert::isArray($decodeResponseBody);

        return $decodeResponseBody;
    }
}
