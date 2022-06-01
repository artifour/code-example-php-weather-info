<?php

namespace App\Contract\Mock;

use App\Contract\WeatherApiDataProviderInterface;
use App\Dto\WeatherInfoDto;

class WeatherApiMockDataProvider implements WeatherApiDataProviderInterface
{
    /**
     * @inheritDoc
     */
    public function getInfo(): WeatherInfoDto
    {
        $weatherInfoDto = new WeatherInfoDto();
        $weatherInfoDto->date = date('Y-m-d');
        $weatherInfoDto->temperature = 26;
        $weatherInfoDto->windDirection = 90;
        $weatherInfoDto->windSpeed = 14;

        return $weatherInfoDto;
    }
}
