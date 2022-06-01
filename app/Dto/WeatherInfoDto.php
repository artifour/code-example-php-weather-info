<?php

namespace App\Dto;

use App\Contract\XmlSerializable;

class WeatherInfoDto implements \JsonSerializable, XmlSerializable
{
    public ?string $date = null;
    public ?float $temperature = null;
    public ?float $windDirection = null;
    public ?float $windSpeed = null;

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'data' => $this->date,
            'temperature' => $this->temperature,
            'windDirection' => $this->windDirection,
            'windSpeed' => $this->windSpeed,
        ];
    }

    /**
     * @inheritDoc
     */
    public function xmlSerialize(): array
    {
        return [
            'data' => $this->date,
            'windSpeed' => $this->windSpeed,
            'temperature' => $this->temperature,
            'windDirection' => $this->windDirection,
        ];
    }
}
