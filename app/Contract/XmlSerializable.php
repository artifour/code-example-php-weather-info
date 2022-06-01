<?php

namespace App\Contract;

interface XmlSerializable
{
    /**
     * @return array
     */
    public function xmlSerialize(): array;
}
