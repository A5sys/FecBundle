<?php

namespace A5sys\FecBundle\Computer\DebitCredit;

use A5sys\FecBundle\Input\EcritureComptableInterface;

/**
 * Compute Montant and Sens fields in alphanumeric mode according to input into an assoc array
 */
class MontantSensAlphaComputer implements DebitCreditComputerInterface
{
    const DEBIT = 'D';
    const CREDIT = 'C';

    /**
     * Returns the names of the fields
     * Warning : order matters
     * @return array<string>
     */
    public function getFieldNames()
    {
        return array(
            'Montant',
            'Sens',
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

        if (!empty($ecritureComptable->getDebit())) {
            $data['Montant'] = $ecritureComptable->getDebit();
            $data['Sens'] = static::DEBIT;
        }

        if (!empty($ecritureComptable->getCredit())) {
            $data['Montant'] = $ecritureComptable->getCredit();
            $data['Sens'] = static::CREDIT;
        }

        return $data;
    }
}
