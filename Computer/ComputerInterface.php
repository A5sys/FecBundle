<?php

namespace A5sys\FecBundle\Computer;

use A5sys\FecBundle\Input\EcritureComptableInterface;

/**
 * Interface representing a computer, so that is capable to calculate some values from a EcritureComptableInterface or one of its child
 */
interface ComputerInterface
{
    /**
     * compute data
     * Warning : order matters
     * @param EcritureComptableInterface $ecritureComptableInterface
     *
     * @return array
     */
    public function compute(EcritureComptableInterface $ecritureComptableInterface);
}
