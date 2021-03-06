<?php

namespace A5sys\FecBundle\Computer;

use A5sys\FecBundle\ValueObject\EcritureComptableInterface;

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
    public function toArray(EcritureComptableInterface $ecritureComptableInterface);

    /**
     * compute data to an ecritureComptableinterface
     * @param EcritureComptableInterface $ecritureComptableInterface
     * @param array $data the FEC entry
     *
     * @return EcritureComptableInterface
     */
    public function toValueObject(EcritureComptableInterface $ecritureComptableInterface, array $data);
}
