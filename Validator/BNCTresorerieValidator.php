<?php

namespace A5sys\FecBundle\Validator;

use A5sys\FecBundle\Exception\FecException;
use A5sys\FecBundle\ValueObject\EcritureComptableInterface;
use A5sys\FecBundle\ValueObject\EcritureBNCTresorerieInterface;

/**
 * EN : Validate input to an assoc array for BNC Tresorerie
 * FR : Valide l'entrée en un tableau associatif pour les déclarations de trésorerie des bénéfices non commerciaux
 */
class BNCTresorerieValidator extends BATresorerieValidator
{
    /**
     * Validate one EcritureBNCTresorerieInterface
     * @param EcritureComptableInterface $ecritureComptable
     * @throw FecValidationException
     * @throw FecInvalidInterfaceException
     */
    public function validate(EcritureComptableInterface $ecritureComptable)
    {
        if (!$ecritureComptable instanceof EcritureBNCTresorerieInterface) {
            throw new FecException(get_class($this).' accepts only EcritureBNCTresorerieInterface instances. Maybe check object list you gave to the manager.');
        }

        parent::validate($ecritureComptable);
    }
}
