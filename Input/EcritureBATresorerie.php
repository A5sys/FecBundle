<?php

namespace A5sys\FecBundle\Input;

/**
 * Représente une écriture comptable française pour les bénéfices agricoles comptabilisant les recettes et dépenses professionnelles
 */
class EcritureBATresorerie extends AbstractEcritureComptable implements EcritureBATresorerieInterface
{
    /**
     * La date de réglement de l'écriture comptable
     * @var \DateTime
     */
    protected $dateRglt;

    /**
     * Le mode de réglement
     * @var string
     */
    protected $modeRglt;

    /**
     * La nature de l'opération
     * @var string
     */
    protected $natOp;

    /**
     * Retourne la date de réglement de l'écriture comptable
     * @return \DateTime
     */
    public function getDateRglt()
    {
        return $this->dateRglt;
    }

    /**
     * Retourne le mode de réglement
     * @return string
     */
    public function getModeRglt()
    {
        return $this->modeRglt;
    }

    /**
     * Retourne la nature de l'opération
     * @return string
     */
    public function getNatOp()
    {
        return $this->natOp;
    }

    /**
     * Affecte la date de réglement de l'écriture comptable
     * @param \DateTime $dateRglt
     * @return \A5sys\FecBundle\Input\EcritureBATresorerie
     */
    public function setDateRglt(\DateTime $dateRglt)
    {
        $this->dateRglt = $dateRglt;

        return $this;
    }

    /**
     * Affecte le mode de réglement
     * @param string $modeRglt
     * @return \A5sys\FecBundle\Input\EcritureBATresorerie
     */
    public function setModeRglt($modeRglt)
    {
        $this->modeRglt = $modeRglt;

        return $this;
    }

    /**
     * Affecte la nature de l'opération
     * @param string $natOp
     * @return \A5sys\FecBundle\Input\EcritureBATresorerie
     */
    public function setNatOp($natOp = null)
    {
        $this->natOp = $natOp;

        return $this;
    }
}
