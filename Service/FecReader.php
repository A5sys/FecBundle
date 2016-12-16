<?php

namespace A5sys\FecBundle\Service;

use A5sys\FecBundle\Computer\DebitCredit\DebitCreditComputerInterface;
use A5sys\FecBundle\Normalizer\NormalizerInterface;
use A5sys\FecBundle\Reader\ReaderInterface;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Fec Reader is the entry point for reading a FEC file
 */
class FecReader
{
    /**
     * The reader service (csv, ...)
     * @var ReaderInterface
     */
    protected $reader;

    /**
     * Normalizer service, to get base informations
     * @var NormalizerInterface
     */
    protected $normalizer;

    /**
     * debitCredit instance to compute Debit and Credit fields (D/C or M/S)
     * @var DebitCreditComputerInterface
     */
    protected $debitCreditComputer;

    /**
     * Constructor
     * @param ReaderInterface     $reader
     * @param NormalizerInterface $normalizer
     * @param ComputerInterface   $debitCreditComputer
     */
    public function __construct(ReaderInterface $reader, NormalizerInterface $normalizer, DebitCreditComputerInterface $debitCreditComputer)
    {
        $this->reader = $reader;
        $this->normalizer = $normalizer;
        $this->debitCreditComputer = $debitCreditComputer;
    }

    /**
     * read the FEC file
     * @param File $file
     *
     * @throws FecException
     * @return array<\A5sys\FecBundle\ValueObject\EcritureComptableInterface>
     */
    public function readFile(File $file)
    {
        // read the file to get an array of assoc array
        $data = $this->reader->read($file);

        // loop over each FEC entry to create a EcritureComptableInterface
        $ecritures = [];
        foreach ($data as $fecEntry) {
            $ecriture = $this->normalizer->toValueObject($fecEntry);
            $this->debitCreditComputer->toValueObject($ecriture, $fecEntry);

            $this->normalizer->validateValueObject($ecriture);

            $ecritures[] = $ecriture;
        }

        return $ecritures;
    }
}
