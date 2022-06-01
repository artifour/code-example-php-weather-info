<?php

namespace App\Contract;

interface SerializerInterface
{
    /**
     * @param $data
     *
     * @return string
     */
    public function serialize($data): string;
}
