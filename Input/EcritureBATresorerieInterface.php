<?php

namespace A5sys\FecBundle\Input;

/**
 * Interface représentant une écriture comptable française pour les bénéfices agricoles comptabilisant les recettes et dépenses professionnelles
 */
interface EcritureBATresorerieInterface extends EcritureComptableInterface
{
    /**
     * Retourne la date de réglement de l'écriture comptable
     * @return \DateTime
     */
    public function getDateRglt();

    /**
     * Retourne le mode de réglement
     * @return string
     */
    public function getModeRglt();

    /**
     * Retourne la nature de l'opération
     * @return string
     */
    public function getNatOp();

    /**
     * Affecte la date de réglement de l'écriture comptable
     * @param \DateTime $dateRglt
     * @return \A5sys\FecBundle\Input\EcritureBATresorerieInterface
     */
    public function setDateRglt(\DateTime $dateRglt);

    /**
     * Affecte le mode de réglement
     * @param string $modeRglt
     * @return \A5sys\FecBundle\Input\EcritureBATresorerieInterface
     */
    public function setModeRglt($modeRglt);

    /**
     * Affecte la nature de l'opération
     * @param string $natOp
     * @return \A5sys\FecBundle\Input\EcritureBATresorerieInterface
     */
    public function setNatOp($natOp = null);
}
