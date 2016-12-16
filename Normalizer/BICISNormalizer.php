<?php

namespace A5sys\FecBundle\Normalizer;

use A5sys\FecBundle\ValueObject\EcritureBICIS;

/**
 * EN : Normalize input to an assoc array for BIC/IS
 * FR : Normalise l'entrée en un tableau associatif pour les déclarations BIC / IS
 */
class BICISNormalizer extends AbstractStandardNormalizer
{
    /**
     * Normalize one array to an EcritureComptableInterface
     * @param array $data
     * @return EcritureBICIS
     */
    public function toValueObject(array $data)
    {
        $ecritureComptable = new EcritureBICIS();

        $this->setStandardProperties($ecritureComptable, $data);

        return $ecritureComptable;
    }
}
