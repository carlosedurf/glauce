<?php

namespace Glauce\Directory;

class Dir
{

    public static function fixPath(string $path): string
    {
        return str_replace('.', '/', $path);
    }

}