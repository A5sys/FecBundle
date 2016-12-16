<?php

namespace A5sys\FecBundle\Normalizer;

use A5sys\FecBundle\ValueObject\EcritureBNCBADroitCommercial;

/**
 * EN : Normalize input to an assoc array for BNC/BA trade law
 * FR : Normalise l'entrée en un tableau associatif pour les déclarations BNC / BA Droit commercial
 */
class BNCBADroitCommercialNormalizer extends AbstractStandardNormalizer
{
    /**
     * Normalize one array to an EcritureComptableInterface
     * @param array $data
     * @return EcritureBICIS
     */
    public function toValueObject(array $data)
    {
        $ecritureComptable = new EcritureBNCBADroitCommercial();

        $this->setStandardProperties($ecritureComptable, $data);

        return $ecritureComptable;
    }
}
