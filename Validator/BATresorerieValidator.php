<?php

namespace A5sys\FecBundle\Validator;

use A5sys\FecBundle\Exception\FecException;
use A5sys\FecBundle\Exception\FecValidationException;
use A5sys\FecBundle\ValueObject\EcritureComptableInterface;
use A5sys\FecBundle\ValueObject\EcritureBATresorerieInterface;

/**
 * EN : Validate input to an assoc array for BA Tresorerie
 * FR : Valide l'entrée en un tableau associatif pour les déclarations de trésorerie des bénéfices agricoles
 */
class BATresorerieValidator extends StandardValidator
{
    /**
     * Validate one EcritureBATresorerieInterface
     * @param EcritureComptableInterface $ecritureComptable
     * @throw FecValidationException
     * @throw FecInvalidInterfaceException
     */
    public function validate(EcritureComptableInterface $ecritureComptable)
    {
        if (!$ecritureComptable instanceof EcritureBATresorerieInterface) {
            throw new FecException(get_class($this).' accepts only EcritureBATresorerieInterface instances. Maybe check object list you gave to the manager.');
        }

        parent::validate($ecritureComptable);

        // validate that all mandatory values are set
        $notNullMethods = array(
            'DateRglt' => 'getDateRglt',
            'ModeRglt' => 'getModeRglt',
        );

        foreach ($notNullMethods as $field => $method) {
            if ($this->isNullOrEmptyString($ecritureComptable->$method())) {
                throw new FecValidationException('Field '.$field.' of class '.get_class($ecritureComptable).' must not be null');
            }
        }
    }
}
