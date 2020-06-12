<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations;

interface DbOperationsInterface extends OperationsInterface
{
    public function db_exist(string $dbName): bool;

    public function rename(string $masterPassword, string $oldName, string $newName): bool;

    public function migrate_databases(string $masterPassword, array $databases): bool;

    public function server_version(): string;

    public function drop(string $masterPassword, string $dbName): bool;

    public function list_lang(): array;

    public function list(bool $document = false): array;

    public function change_admin_password(string $masterPassword, string $newPassword): bool;

    public function list_countries(string $masterPassword): array;

    public function create_database(
        string $masterPassword,
        string $dbName,
        string $demo,
        string $lang,
        string $serPassword = 'admin',
        string $login = 'admin',
        string $countryCode = null,
        string $phone = null
    ): array;

    public function restore(
        string $masterPassword,
        string $dbName,
        string $data,
        bool $copy = false
    ): bool;

    public function duplicate_database(string $masterPassword, string $dbOriginalName, string $dbName): bool;

    public function dump(string $masterPassword, string $dbName, string $format = 'zip'): string;
}
