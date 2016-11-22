<?php

namespace A5sys\FecBundle\Validator;

use A5sys\FecBundle\Input\EcritureComptableInterface;

/**
 * Interface representing a validator, so that is capable to valid a EcritureComptableInterface
 */
interface ValidatorInterface
{
    /**
     * Validates the EcritureComptableInterface
     * @param EcritureComptableInterface $ecritureComptableInterface
     * @throw FecValidationException
     */
    public function validate(EcritureComptableInterface $ecritureComptableInterface);
}
