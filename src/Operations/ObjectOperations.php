<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations;

use Psr\Http\Message\ResponseInterface;

final class ObjectOperations extends AbstractOperations implements ObjectOperationsInterface
{
    /** @var string */
    private $database;
    /** @var string */
    private $username;
    /** @var string */
    private $password;
    /** @var CommonOperationsInterface */
    private $commonOperations;

    /** @var int */
    private $uid;

    public function __construct(
        string $database,
        string $username,
        string $password,
        CommonOperationsInterface $commonOperations
    ) {
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
        $this->commonOperations = $commonOperations;

        parent::__construct(
            $commonOperations->getApiRequestMaker(),
            $commonOperations->getRequestBodyFactory(),
            $commonOperations->getXmlRpcSerializerHelper()
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
}
