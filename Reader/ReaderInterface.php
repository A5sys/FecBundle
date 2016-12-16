<?php

namespace A5sys\FecBundle\Reader;

use Symfony\Component\HttpFoundation\File\File;

/**
 * Interface representing a reader with ablity to read a FEC file
 */
interface ReaderInterface
{
    /**
     * Reads the FEC file
     * @param File  $file
     *
     * @return array<array>
     */
    public function read(File $file);
}
