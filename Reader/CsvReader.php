<?php

namespace A5sys\FecBundle\Reader;

use A5sys\FecBundle\Exception\FecException;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Dumps a associative array in a file
 */
class CsvReader implements ReaderInterface
{
    const CHARSET = 'ISO-8859-15';
    const DATEFORMAT = 'Ymd';
    const FLOAT_NB_DECIMALS = 2;
    const FLOAT_DECIMAL_SEPARATOR = ',';
    const FLOAT_THOUSAND_SEPARATOR = '';

    protected $separator = "\t";

    /**
     * Constructor
     * @param string $separator
     */
    public function __construct($separator)
    {
        $this->separator = $separator;
    }

    /**
     * Reads the CSV FEC
     * @param File  $file
     * @return array<array>
     */
    public function read(File $file)
    {
        $splFileObject = $file->openFile('r');

        // write csv data
        $data = $this->readCsv($splFileObject);

        // close handle
        $splFileObject = null;

        return $data;
    }

    /**
     * read the lines in the FEC file
     * @param \SplFileObject $fileObject
     * @param array          $fieldNames
     * @return array<array>
     */
    protected function readCsv(\SplFileObject $fileObject)
    {
        $header = null;
        $data = [];
        $cnt = 1;

        $fileObject->setFlags(\SplFileObject::READ_CSV | \SplFileObject::READ_AHEAD | \SplFileObject::SKIP_EMPTY);
        while (!$fileObject->eof()) {
            $row = $this->readLine($fileObject, $cnt);
            if(!$header) {
                $header = $row;
            } else {
                if (count($row) !== 0) { // if not empty (needed as PHP ignore SKIP_EMPTY for now)
                    if (count($header) !== count($row)) {
                        throw new FecException('Malformed FEC file. The Line '.$cnt.' has '.count($row).' columns, but there is '.count($header).' columns in the header');
                    }
                    $data[] = $this->convertFields(array_combine($header, $row), $cnt);
                }
            }
            $cnt++;
        }

        return $data;
    }

    /**
     * Read one line in the file
     * @param \SplFileObject $fileObject
     * @param int            $cnt index of the entry in the file
     * @return array
     */
    protected function readLine(\SplFileObject $fileObject, $cnt)
    {
        $rawRow = $fileObject->fgetcsv($this->separator);
        $row = null;

        if (is_array($rawRow)) {
            $row = array_map(function($value) {
                $value = mb_convert_encoding($value, 'UTF-8', static::CHARSET);
                $value = trim($value);

                return $value;
            }, $rawRow);
        }

        return $row;
    }

    /**
     * Convert string, date and numeric fields in the right PHP format
     * @param array $row
     * @param int   $cnt index of the entry in the file
     */
    protected function convertFields($row, $cnt)
    {
        // convert date fields
        $row = $this->convertDateFields($row, $cnt);
        // convert numeric fields
        $row = $this->convertFloatFields($row, $cnt);
        // convert string fields
        $row = $this->convertStringFields($row, $cnt);

        return $row;
    }

    /**
     * Convert fields that are supposed to be dates in DateTime object
     * @param array $row
     * @param int   $cnt index of the entry in the file
     *
     * @throw FecException
     * @return array the modified row
     */
    protected function convertDateFields(array $row, $cnt)
    {
        $fields = ['EcritureDate', 'PieceDate', 'DateLet', 'ValidDate', 'DateRglt'];
        foreach ($fields as $field) {
            if (isset($row[$field])) {
                if ($row[$field] !== '') {
                    $date = \DateTime::createFromFormat('Ymd', $row[$field]);
                    $date->setTime(0, 0, 0);
                    if (!$date) {
                        throw new FecException('FEC file. Malformed date. Line '.$cnt.'. The field '.$field.' with value "'.$row[$field].'" is not a valid yyyymmdd date string');
                    }
                    $row[$field] = $date;
                } else {
                    $row[$field] = null;
                }
            }
        }

        return $row;
    }

    /**
     * Convert fields that are supposed to be numeric
     * @param array $row
     * @param int   $cnt index of the entry in the file
     *
     * @throw FecException
     * @return array the modified row
     */
    protected function convertFloatFields(array $row, $cnt)
    {
        $fields = ['Debit', 'Credit', 'Montant', 'Montantdevise'];
        foreach ($fields as $field) {
            if (isset($row[$field])) {
                if ($row[$field] !== '') {
                    $dotted = str_replace(',', '.', $row[$field]);

                    if (!is_numeric($dotted)) {
                        throw new FecException('FEC file. Malformed numeric. Line '.$cnt.'. The field '.$field.' with value "'.$row[$field].'" is not a valid numeric value string');
                    }
                    $row[$field] = floatval($dotted);
                } else {
                    $row[$field] = null;
                }
            }
        }

        return $row;
    }

    /**
     * Set the string to null if empty string
     * @param array $row
     * @param int   $cnt index of the entry in the file
     *
     * @throw FecException
     * @return array the modified row
     */
    protected function convertStringFields(array $row, $cnt)
    {
        foreach ($row as $field => $value) {
            if (is_string($row[$field]) && $row[$field] === '') {
                $row[$field] = null;
            }
        }

        return $row;
    }
}
