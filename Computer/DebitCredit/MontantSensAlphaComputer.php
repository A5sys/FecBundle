<?php

namespace A5sys\FecBundle\Computer\DebitCredit;

use A5sys\FecBundle\Exception\FecException;
use A5sys\FecBundle\ValueObject\EcritureComptableInterface;

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
    public function toArray(EcritureComptableInterface $ecritureComptable)
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

    /**
     * Compute Debit and Credit Fields
     * @param EcritureComptableInterface $ecritureComptable
     * @param array                      $data the FEC entry
     *
     * @throw FecException
     * @return EcritureComptableInterface
     */
    public function toValueObject(EcritureComptableInterface $ecritureComptable, array $data)
    {
        if (!isset($data['Sens']) || !isset($data['Montant'])) {
            throw new FecException('Fields "Sens" and "Montant" are mandatory when using the computer '.get_class($this));
        }

        if ($data['Sens'] !== static::DEBIT || $data['Sens'] !== static::CREDIT) {
            throw new FecException('Field "Sens" must be one of "'.static::DEBIT.'" or "'.static::CREDIT.'" when using the computer '.get_class($this));
        }

        if ($data['Sens'] === static::DEBIT) {
            $ecritureComptable->setDebit($data['Montant']);
        } else {
            $ecritureComptable->setCredit($data['Montant']);
        }

        return $data;
    }
}
