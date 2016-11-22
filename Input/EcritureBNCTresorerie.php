<?php

namespace A5sys\FecBundle\Input;

/**
 * Représente une écriture comptable française pour les bénéfices non commerciaux comptabilisant les recettes et dépenses professionnelles
 */
class EcritureBNCTresorerie extends EcritureBATresorerie implements EcritureBNCTresorerieInterface
{
    /**
     * L'identification du client
     * @var string
     */
    protected $idClient;

    /**
     * Retourne l'identification du client
     * @return string
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Affecte le mode de réglement
     * @param string $idClient
     * @return \A5sys\FecBundle\Input\EcritureBNCTresorerie
     */
    public function setIdClient($idClient = null)
    {
        $this->idClient = $idClient;

        return $this;
    }
}
