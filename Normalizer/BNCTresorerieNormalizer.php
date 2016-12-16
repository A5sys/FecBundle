<?php

namespace A5sys\FecBundle\Normalizer;

use A5sys\FecBundle\ValueObject\EcritureBNCTresorerieInterface;
use A5sys\FecBundle\ValueObject\EcritureComptableInterface;
use A5sys\FecBundle\ValueObject\EcritureBNCTresorerie;

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
    public function toArray(EcritureComptableInterface $ecritureComptable)
    {
        if (!$ecritureComptable instanceof EcritureBNCTresorerieInterface) {
            throw new FecException(get_class($this).' accepts only EcritureBNCTresorerieInterface instances. Maybe check object list you gave to the manager.');
        }

        // validation in parent
        $data = parent::toArray($ecritureComptable);

        // add new fields
        $data['IdClient'] = $ecritureComptable->getIdClient();

        return $data;
    }

    /**
     * Normalize one array to an EcritureComptableInterface
     * @param array $data
     * @return EcritureBICIS
     */
    public function toValueObject(array $data)
    {
        $ecritureComptable = new EcritureBNCTresorerie();

        $this->setStandardProperties($ecritureComptable, $data);
        $this->setBATresorerieProperties($ecritureComptable, $data);
        $this->setBNCTresorerieProperties($ecritureComptable, $data);

        return $ecritureComptable;
    }

    /**
     * Set the BNC Tresorerie specific properties
     * @param EcritureBNCTresorerie $ecritureComptable
     * @param array $data
     */
    protected function setBNCTresorerieProperties(EcritureBNCTresorerie $ecritureComptable, $data)
    {
        $ecritureComptable->setIdClient($data['IdClient']);
    }
}
