<?php

namespace A5sys\FecBundle\Normalizer;

use A5sys\FecBundle\Input\EcritureComptableInterface;

/**
 * Interface representing a normalizer, so that is capable to retreive values from a EcritureComptableInterface or one of its child
 */
interface NormalizerInterface
{
    /**
     * Returns the names of the fields
     * Warning : order matters
     * @return array<string>
     */
    public function getFieldNames();

    /**
     * compute data
     * Warning : order matters
     * @param EcritureComptableInterface $ecritureComptableInterface
     *
     * @return array
     */
    public function normalize(EcritureComptableInterface $ecritureComptableInterface);
}
