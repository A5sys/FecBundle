<?php

namespace A5sys\FecBundle\Normalizer;

use A5sys\FecBundle\Exception\FecException;
use A5sys\FecBundle\ValueObject\EcritureBATresorerie;
use A5sys\FecBundle\ValueObject\EcritureBATresorerieInterface;
use A5sys\FecBundle\ValueObject\EcritureComptableInterface;

/**
 * EN : Normalize input to an assoc array for BA Tresorerie
 * FR : Normalise l'entrée en un tableau associatif pour les déclarations de trésorerie des bénéfices agricoles
 */
class BATresorerieNormalizer extends AbstractStandardNormalizer
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
    public function toArray(EcritureComptableInterface $ecritureComptable)
    {
        if (!$ecritureComptable instanceof EcritureBATresorerieInterface) {
            throw new FecException(get_class($this).' accepts only EcritureBATresorerieInterface instances. Maybe check object list you gave to the manager.');
        }

        // validation in parent
        $data = parent::toArray($ecritureComptable);

        // add new fields
        $data['DateRglt'] = $ecritureComptable->getDateRglt();
        $data['ModeRglt'] = $ecritureComptable->getModeRglt();
        $data['NatOp'] = $ecritureComptable->getNatOp();

        return $data;
    }

    /**
     * Normalize one array to an EcritureComptableInterface
     * @param array $data
     * @return EcritureBICIS
     */
    public function toValueObject(array $data)
    {
        $ecritureComptable = new EcritureBATresorerie();

        $this->setStandardProperties($ecritureComptable, $data);
        $this->setBATresorerieProperties($ecritureComptable, $data);

        return $ecritureComptable;
    }

    /**
     * Set the BA Tresorerie specific properties
     * @param EcritureBATresorerie $ecritureComptable
     * @param array $data
     */
    protected function setBATresorerieProperties(EcritureBATresorerie $ecritureComptable, $data)
    {
        $ecritureComptable->setDateRglt($data['DateRglt']);
        $ecritureComptable->setModeRglt($data['ModeRglt']);
        $ecritureComptable->setNatOp($data['NatOp']);
    }
}
