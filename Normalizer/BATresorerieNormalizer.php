<?php

namespace A5sys\FecBundle\Normalizer;

use A5sys\FecBundle\Exception\FecException;
use A5sys\FecBundle\Input\EcritureBATresorerieInterface;
use A5sys\FecBundle\Input\EcritureComptableInterface;

/**
 * EN : Normalize input to an assoc array for BA Tresorerie
 * FR : Normalise l'entrée en un tableau associatif pour les déclarations de trésorerie des bénéfices agricoles
 */
class BATresorerie extends StandardNormalizer
{
    /**
     * Returns the names of the fields.
     * Warning : order matters
     * @return array<string>
     */
    public function getFieldNames()
    {
        $parentFields = parent::getFieldNames();

        return array_merge($parentFields, array(
            'DateRglt',
            'ModeRglt',
            'NatOp',
        ));
    }

    /**
     * Normalize one EcritureBATresorerieInterface
     * Warning : order matters
     * @param EcritureComptableInterface $ecritureComptable
     * @throw A5sys\FecBundle\Exception\FecException
     * @throw A5sys\FecBundle\Exception\FecValidationException
     * @return array
     */
    public function normalize(EcritureComptableInterface $ecritureComptable)
    {
        if (!$ecritureComptable instanceof EcritureBATresorerieInterface) {
            throw new FecException(get_class($this).' accepts only EcritureBATresorerieInterface instances. Maybe check object list you gave to the manager.');
        }

        // validation in parent
        $data = parent::normalize($ecritureComptable);

        // add new fields
        $data['DateRglt'] = $ecritureComptable->getDateRglt();
        $data['ModeRglt'] = $ecritureComptable->getModeRglt();
        $data['NatOp'] = $ecritureComptable->getNatOp();

        return $data;
    }
}
