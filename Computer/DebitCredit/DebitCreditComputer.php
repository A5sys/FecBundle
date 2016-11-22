<?php

namespace A5sys\FecBundle\Computer\DebitCredit;

use A5sys\FecBundle\Input\EcritureComptableInterface;

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
    public function compute(EcritureComptableInterface $ecritureComptable)
    {
        $data = array();

        $data['Debit'] = $ecritureComptable->getDebit();
        $data['Credit'] = $ecritureComptable->getCredit();

        return $data;
    }
}
