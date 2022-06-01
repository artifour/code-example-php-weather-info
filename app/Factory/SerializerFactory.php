<?php

namespace App\Factory;

use App\Contract\SerializerInterface;
use App\Exception\NotSupportedFileFormatException;
use App\Serializer\JsonSerializer;
use App\Serializer\XmlSerializer;
use App\ValueObject\FileFormat;
use Psr\Container\ContainerInterface;

class SerializerFactory
{
    private const FILE_FORMAT_SERIALIZERS = [
        FileFormat::XML => XmlSerializer::class,
        FileFormat::JSON => JsonSerializer::class,
    ];

    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @throws NotSupportedFileFormatException
     */
    public function create(string $fileFormat): SerializerInterface
    {
        if (!array_key_exists($fileFormat, self::FILE_FORMAT_SERIALIZERS)) {
            throw new NotSupportedFileFormatException($fileFormat);
        }

        return $this->container->get(self::FILE_FORMAT_SERIALIZERS[$fileFormat]);
    }
}
