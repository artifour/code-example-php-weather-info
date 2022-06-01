<?php

namespace App\Contract;

use App\Dto\WeatherInfoDto;

interface WeatherApiDataProviderInterface
{
    /**
     * @return WeatherInfoDto
     */
    public function getInfo(): WeatherInfoDto;
}
