<?php

namespace App\Serializer;

use App\Contract\SerializerInterface;

class JsonSerializer implements SerializerInterface
{
    /**
     * @inheritDoc
     *
     * @param \JsonSerializable|object|array $data
     *
     * @throws \JsonException
     */
    public function serialize($data): string
    {
        return json_encode($data, JSON_THROW_ON_ERROR);
    }
}
