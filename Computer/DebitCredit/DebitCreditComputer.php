<?php

namespace A5sys\FecBundle\Computer\DebitCredit;

use A5sys\FecBundle\Exception\FecException;
use A5sys\FecBundle\ValueObject\EcritureComptableInterface;

/**
 * Compute Debit and Credit fields according to input into an assoc array
 */
class DebitCreditComputer implements DebitCreditComputerInterface
{
    /**
     * Returns the names of the fields
     * Warning : order matters
     * @return array<string>
     */
    public function getFieldNames()
    {
        return array(
            'Debit',
            'Credit',
        );
    }

    /**
     * Compute Debit and Credit Fields
     * Warning : order matters
     * @param EcritureComptableInterface $ecritureComptable
     * @return type
     */
    public function toArray(EcritureComptableInterface $ecritureComptable)
    {
        $data = array();

        $data['Debit'] = $ecritureComptable->getDebit();
        $data['Credit'] = $ecritureComptable->getCredit();

        return $data;
    }

    /**
     * Compute Debit and Credit Fields
     * @param EcritureComptableInterface $ecritureComptable
     * @param array                      $data the FEC entry
     *
     * @return EcritureComptableInterface
     */
    public function toValueObject(EcritureComptableInterface $ecritureComptable, array $data)
    {
        $ecritureComptable->setDebit($data['Debit']);
        $ecritureComptable->setCredit($data['Credit']);

        return $data;
    }
}
