<?php

namespace App\Service;

use App\Contract\FileSystemInterface;
use App\Dto\WeatherInfoDto;
use App\Exception\NotSupportedFileFormatException;
use App\Factory\SerializerFactory;

class SaveWeatherInfoService
{
    private SerializerFactory $serializerFactory;
    private FileSystemInterface $fileSystem;

    public function __construct(
        SerializerFactory $serializerFactory,
        FileSystemInterface $fileSystem
    ) {
        $this->serializerFactory = $serializerFactory;
        $this->fileSystem = $fileSystem;
    }

    /**
     * @throws NotSupportedFileFormatException
     */
    public function save(WeatherInfoDto $weatherInfoDto, string $format): bool
    {
        $serializer = $this->serializerFactory->create($format);
        $content = $serializer->serialize($weatherInfoDto);

        return $this->fileSystem->put($this->getPath($weatherInfoDto, $format), $content);
    }

    private function getPath(WeatherInfoDto $weatherInfoDto, string $format): string
    {
        return "$weatherInfoDto->date.$format";
    }
}
