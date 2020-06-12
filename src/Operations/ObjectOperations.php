<?php

declare(strict_types=1);

namespace Flux\OdooApiClient\Operations;

use Flux\OdooApiClient\Api\OdooApiInterface;
use Flux\OdooApiClient\XmlRpc\ResponseBodyInterface;

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
        CommonOperationsInterface $commonOperations,
        OdooApiInterface $api
    ) {
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
        $this->commonOperations = $commonOperations;

        parent::__construct($api);
    }

    public function getEndpointPath(): string
    {
        return '/object';
    }

    /**
     * {@inheritdoc}
     */
    public function execute_kw(
        string $modelName,
        string $methodName,
        array $arguments = [],
        array $options = []
    ): ResponseBodyInterface {
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
}
