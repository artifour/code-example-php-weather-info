<?php

namespace App\Command;

use App\Contract\WeatherApiDataProviderInterface;
use App\Exception\NotSupportedFileFormatException;
use App\Service\SaveWeatherInfoService;
use App\ValueObject\FileFormat;

class GatherWeatherInfoCommand
{
    private WeatherApiDataProviderInterface $weatherApiDataProvider;
    private SaveWeatherInfoService $saveWeatherInfoService;

    public function __construct(
        WeatherApiDataProviderInterface $weatherApiDataProvider,
        SaveWeatherInfoService $saveWeatherInfoService
    ) {
        $this->weatherApiDataProvider = $weatherApiDataProvider;
        $this->saveWeatherInfoService = $saveWeatherInfoService;
    }

    /**
     * @param string $format
     *
     * @throws NotSupportedFileFormatException
     */
    protected function execute(string $format = FileFormat::JSON): void
    {
        $weatherInfoDto = $this->weatherApiDataProvider->getInfo();
        $this->saveWeatherInfoService->save($weatherInfoDto, $format);
    }
}
