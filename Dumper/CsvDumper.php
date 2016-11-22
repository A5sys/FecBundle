<?php

namespace A5sys\FecBundle\Dumper;

use Symfony\Component\HttpFoundation\File\File;

/**
 * Dumps a associative array in a file
 */
class CsvDumper implements DumperInterface
{
    const CHARSET = 'ISO-8859-15';
    const DATEFORMAT = 'Ymd';
    const FLOAT_NB_DECIMALS = 2;
    const FLOAT_DECIMAL_SEPARATOR = ',';
    const FLOAT_THOUSAND_SEPARATOR = '';

    protected $separator = "\t";
    protected $fileExtension = 'txt';

    /**
     * Constructor
     * @param string $separator
     * @param string $fileExtension
     */
    public function __construct($separator, $fileExtension)
    {
        $this->separator = $separator;
        $this->fileExtension = $fileExtension;
    }

    /**
     * fileExtension getter
     * @return string
     */
    public function getFileExtension()
    {
        return $this->fileExtension;
    }

    /**
     * Writes the CSV FEC
     * @param File  $file
     * @param array $fieldNames array of the field names
     * @param array $data       assoc array of the data to be dumped
     * @return Symfony\Component\HttpFoundation\File\File
     */
    public function dump(File $file, $fieldNames, $data)
    {
        $splFileObject = $file->openFile('w+');

        // write csv data
        $this->writeCsv($splFileObject, $fieldNames, $data);

        // close handle
        $splFileObject = null;

        return $file;
    }

    /**
     * Write the lines in the FEC file
     * @param \SplFileObject $fileObject
     * @param array          $fieldNames
     * @param array          $data
     */
    protected function writeCsv(\SplFileObject $fileObject, array $fieldNames, array $data)
    {
        // CSV column names : convert to ISO-8859-15
        $headers = array();
        foreach ($fieldNames as $fieldName) {
            $headers[] = mb_convert_encoding($fieldName, static::CHARSET);
        }
        $fileObject->fputcsv($headers, $this->separator);

        $csvData = array();
        foreach ($data as $fecEntry) {
            // prepare the data to be printed
            $csvData[] = $this->prepareCsvData($fecEntry);
        }

        foreach ($csvData as $data) {
            // add the csv line to the file
            $fileObject->fputcsv($data, $this->separator);
        }
    }

    /**
     * Prepare a fecEntry to be printed in the csv, by formating floats and DateTime
     * @param array $fecEntry
     * @return array
     */
    protected function prepareCsvData($fecEntry)
    {
        $csvDataArray = array();
        foreach ($fecEntry as $value) {
            // format numbers
            if (is_float($value)) {
                $value = number_format($value, static::FLOAT_NB_DECIMALS, static::FLOAT_DECIMAL_SEPARATOR, static::FLOAT_THOUSAND_SEPARATOR);
            }

            // convert \DateTime to CSV conventionned format
            if ($value instanceof \DateTime) {
                $value = $value->format(static::DATEFORMAT);
            }
            $csvDataArray[] = mb_convert_encoding($value, static::CHARSET);
        }

        return $csvDataArray;
    }
}
