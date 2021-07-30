<?php

namespace Core;

use DirectoryIterator;

class Helper
{
    public static function listFiles(string $path, bool $withExtension = true): array
    {
        $output = [];

        $iterator = new DirectoryIterator($path);

        foreach ($iterator as $fileinfo) {
            if ($fileinfo->isDot() || $fileinfo->isDir() || $fileinfo->isLink()) {
                continue;
            }

            $filename = empty($fileinfo->getExtension())
            ? $fileinfo->getFileName()
            : substr($fileinfo->getFileName(), 0, -(strlen($fileinfo->getExtension()) + 1));

            $octalPerms = substr(sprintf('%o', $fileinfo->getPerms()), -4);

            $output[] = $withExtension ? $fileinfo->getFileName() : $filename;
        }

        return $output;
    }
}
