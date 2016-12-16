<?php

namespace A5sys\FecBundle\Validator;

use A5sys\FecBundle\Exception\FecValidationException;
use A5sys\FecBundle\ValueObject\EcritureComptableInterface;
use A5sys\FecBundle\Validator\ValidatorInterface;

/**
 * validates standard input
 */
class StandardValidator implements ValidatorInterface
{
    /**
     * Validate one EcritureComptableInterface
     * @param EcritureComptableInterface $ecritureComptable
     * @throw FecValidationException
     */
    public function validate(EcritureComptableInterface $ecritureComptable)
    {
        // validate that all mandatory values are set
        $notNullMethods = array(
            'JournalCode' => 'getJournalCode',
            'JournalLib' => 'getJournalLib',
            'EcritureNum' => 'getEcritureNum',
            'EcritureDate' => 'getEcritureDate',
            'CompteNum' => 'getCompteNum',
            'CompteLib' => 'getCompteLib',
            'PieceRef' => 'getPieceRef',
            'PieceDate' => 'getPieceDate',
            'EcritureLib' => 'getEcritureLib',
            'ValidDate' => 'getValidDate',
        );

        foreach ($notNullMethods as $field => $method) {
            if ($this->isNullOrEmptyString($ecritureComptable->$method())) {
                throw new FecValidationException('Field '.$field.' of class '.get_class($ecritureComptable).' must not be null');
            }
        }

        // validate that only one of Debit and Credit is set
        if (!empty($ecritureComptable->getDebit()) && !empty($ecritureComptable->getCredit())) {
            throw new FecValidationException('Field Debit and Credit must not be set at the same time for class '.get_class($ecritureComptable));
        }

        if (empty($ecritureComptable->getDebit()) && empty($ecritureComptable->getCredit())) {
            throw new FecValidationException('Either Debit or Credit must be set for class '.get_class($ecritureComptable).'. None were given');
        }
    }

    /**
     * return true if the value is null or is an empty string
     * @param mixed $value
     */
    protected function isNullOrEmptyString($value)
    {
        return is_null($value) || $value === '';
    }
}
