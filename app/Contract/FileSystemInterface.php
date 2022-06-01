<?php

namespace App\Contract;

interface FileSystemInterface
{
    /**
     * @param string $path
     * @param string $content
     *
     * @return bool
     */
    public function put(string $path, string $content): bool;
}
