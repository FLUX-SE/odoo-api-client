<?php

declare(strict_types=1);

namespace FluxSE\OdooApiClient\Operations;

use Psr\Http\Message\ResponseInterface;

final class ObjectOperations extends AbstractOperations implements ObjectOperationsInterface
{
    private ?int $uid = null;

    public function __construct(
        private string $database,
        private string $username,
        private string $password,
        private CommonOperationsInterface $commonOperations
    ) {
        parent::__construct(
            $commonOperations->getApiRequestMaker(),
            $commonOperations->getRequestBodyFactory(),
            $commonOperations->getRpcSerializerHelper()
        );
    }

    public function getEndpointPath(): string
    {
        return '/object';
    }

    public function execute_kw(
        string $modelName,
        string $methodName,
        array $arguments = [],
        array $options = []
    ): ResponseInterface {
        $this->retrieveUid();

        return $this->request(__FUNCTION__, [
            $this->database,
            $this->uid,
            $this->password,
            $modelName,
            $methodName,
            $arguments,
            $options,
        ]);
    }

    public function retrieveUid(): int
    {
        if (null === $this->uid) {
            $this->uid = $this->commonOperations->authenticate(
                $this->database,
                $this->username,
                $this->password
            );
        }

        return $this->uid;
    }

    public function setDatabase(string $database): void
    {
        $this->database = $database;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getDatabase(): string
    {
        return $this->database;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
