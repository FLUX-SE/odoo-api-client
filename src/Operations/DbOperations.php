<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations;

final class DbOperations extends AbstractOperations implements DbOperationsInterface
{
    public function getEndpointPath(): string
    {
        return '/db';
    }

    public function list(bool $document = false): array
    {
        $responseBody = $this->request(__FUNCTION__, [$document]);

        return $responseBody->decodeArray();
    }

    public function server_version(): string
    {
        $responseBody = $this->request(__FUNCTION__);

        return $responseBody->decodeString();
    }

    public function db_exist(string $dbName): bool
    {
        $responseBody = $this->request(__FUNCTION__, [$dbName]);

        return $responseBody->decodeBool();
    }

    public function list_lang(): array
    {
        $responseBody = $this->request(__FUNCTION__);

        return $responseBody->decodeArray();
    }

    public function create_database(
        string $masterPassword,
        string $dbName,
        string $demo,
        string $lang,
        string $serPassword = 'admin',
        string $login = 'admin',
        string $countryCode = null,
        string $phone = null
    ): array {
        $responseBody = $this->request(__FUNCTION__, [
            $masterPassword,
            $dbName,
            $demo,
            $lang,
            $serPassword,
            $login,
            $countryCode,
            $phone,
        ]);

        return $responseBody->decodeArray();
    }

    public function duplicate_database(
        string $masterPassword,
        string $dbOriginalName,
        string $dbName
    ): bool {
        $responseBody = $this->request(__FUNCTION__, [
            $masterPassword,
            $dbOriginalName,
            $dbName,
        ]);

        return $responseBody->decodeBool();
    }

    public function drop(
        string $masterPassword,
        string $dbName
    ): bool {
        $responseBody = $this->request(__FUNCTION__, [
            $masterPassword,
            $dbName,
        ]);

        return $responseBody->decodeBool();
    }

    public function dump(
        string $masterPassword,
        string $dbName,
        string $format = 'zip'
    ): string {
        $responseBody = $this->request(__FUNCTION__, [
            $masterPassword,
            $dbName,
            $format,
        ]);

        return $responseBody->decodeString();
    }

    public function restore(
        string $masterPassword,
        string $dbName,
        string $data,
        bool $copy = false
    ): bool {
        $responseBody = $this->request(__FUNCTION__, [
            $masterPassword,
            $dbName,
            $data,
            $copy,
        ]);

        return $responseBody->decodeBool();
    }

    public function rename(
        string $masterPassword,
        string $oldName,
        string $newName
    ): bool {
        $responseBody = $this->request(__FUNCTION__, [
            $masterPassword,
            $oldName,
            $newName,
        ]);

        return $responseBody->decodeBool();
    }

    public function change_admin_password(
        string $masterPassword,
        string $newPassword
    ): bool {
        $responseBody = $this->request(__FUNCTION__, [
            $masterPassword,
            $newPassword,
        ]);

        return $responseBody->decodeBool();
    }

    public function migrate_databases(
        string $masterPassword,
        array $databases
    ): bool {
        $responseBody = $this->request(__FUNCTION__, [
            $masterPassword,
            $databases,
        ]);

        return $responseBody->decodeBool();
    }

    public function list_countries(string $masterPassword): array
    {
        $responseBody = $this->request(__FUNCTION__, [$masterPassword]);

        return $responseBody->decodeArray();
    }
}
