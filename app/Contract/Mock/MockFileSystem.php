<?php

namespace App\Contract\Mock;

use App\Contract\FileSystemInterface;

class MockFileSystem implements FileSystemInterface
{
    /**
     * @inheritDoc
     */
    public function put(string $path, string $content): bool
    {
        return true;
    }
}
