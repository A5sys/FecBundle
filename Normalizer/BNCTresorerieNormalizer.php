<?php

namespace A5sys\FecBundle\Normalizer;

use A5sys\FecBundle\Input\EcritureBNCTresorerieInterface;
use A5sys\FecBundle\Input\EcritureComptableInterface;

/**
 * EN : Normalize input to an assoc array for BNC Tresorerie
 * FR : Normalise l'entrée en un tableau associatif pour les déclarations de trésorerie des bénéfices non commerciaux
 */
class BNCTresorerieNormalizer extends BATresorerieNormalizer
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
            'IdClient',
        ));
    }

    /**
     * Normalize one EcritureBNCTresorerieInterface
     * Warning : order matters
     * @param EcritureComptableInterface $ecritureComptable
     * @throw A5sys\FecBundle\Exception\FecException
     * @throw A5sys\FecBundle\Exception\FecValidationException
     * @return array
     */
    public function normalize(EcritureComptableInterface $ecritureComptable)
    {
        if (!$ecritureComptable instanceof EcritureBNCTresorerieInterface) {
            throw new FecException(get_class($this).' accepts only EcritureBNCTresorerieInterface instances. Maybe check object list you gave to the manager.');
        }

        // validation in parent
        $data = parent::normalize($ecritureComptable);

        // add new fields
        $data['IdClient'] = $ecritureComptable->getIdClient();

        return $data;
    }
}
