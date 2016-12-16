<?php

namespace A5sys\FecBundle\ValueObject;

/**
 * Représente une écriture comptable française
 * Note le champ montantdevis et idevise portent bien le nom indiqué par l'administration française, malgré que leur format n'est pas le même que les autres champs.
 */
abstract class AbstractEcritureComptable implements EcritureComptableInterface
{
    /**
     * Le code journal de l'écriture comptable
     * @var string
     */
    protected $journalCode;

    /**
     * Le libellé journal de l'écriture comptable
     * @var string
     */
    protected $journalLib;

    /**
     * Le numéro sur une séquence continue de l'écriture comptable
     * @var string
     */
    protected $ecritureNum;

    /**
     * La date de comptabilisation de l'écriture comptable
     * @var \DateTime
     */
    protected $ecritureDate;

    /**
     * Le numéro de compte, dont les trois premiers caractères doivent correspondre à des chiffres respectant les normes du plan comptable français
     * @var string
     */
    protected $compteNum;

    /**
     * Le libellé de compte, conformément à la nomenclature du plan comptable français
     * @var string
     */
    protected $compteLib;

    /**
     * Le numéro de compte auxiliaire (à blanc si non utilisé)
     * @var string
     */
    protected $compAuxNum;

    /**
     * Le libellé de compte auxiliaire (à blanc si non utilisé)
     * @var string
     */
    protected $compAuxLib;

    /**
     * La référence de la pièce justificative
     * @var string
     */
    protected $pieceRef;

    /**
     * La date de la pièce justificative
     * @var \DateTime
     */
    protected $pieceDate;

    /**
     * Le libellé de l'écriture comptable
     * @var string
     */
    protected $ecritureLib;

    /**
     * Le montant au débit
     * @var float
     */
    protected $debit;

    /**
     * Le montant au crédit
     * @var float
     */
    protected $credit;

    /**
     * Le lettrage de l'écriture comptable (à blanc si non utilisé)
     * @var string
     */
    protected $ecritureLet;

    /**
     * La date de lettrage (à blanc si non utilisé)
     * @var \DateTime
     */
    protected $dateLet;

    /**
     * La date de validation de l'écriture comptable
     * @var \DateTime
     */
    protected $validDate;

    /**
     * Le montant en devise (à blanc si non utilisé)
     * @var float
     */
    protected $montantdevise;

    /**
     * L'identifiant de la devise (à blanc si non utilisé)
     * @var string
     */
    protected $idevise;

    /**
     * Retourne le code journal de l'écriture comptable
     * @return string
     */
    public function getJournalCode()
    {
        return $this->journalCode;
    }

    /**
     * Retourne le libellé journal de l'écriture comptable
     * @return string
     */
    public function getJournalLib()
    {
        return $this->journalLib;
    }

    /**
     * Retourne le numéro sur une séquence continue de l'écriture comptable
     * @return string
     */
    public function getEcritureNum()
    {
        return $this->ecritureNum;
    }

    /**
     * Retourne la date de comptabilisation de l'écriture comptable
     * @return \DateTime
     */
    public function getEcritureDate()
    {
        return $this->ecritureDate;
    }

    /**
     * Retourne le numéro de compte, dont les trois premiers caractères doivent correspondre à des chiffres respectant les normes du plan comptable français
     * @return string
     */
    public function getCompteNum()
    {
        return $this->compteNum;
    }

    /**
     * Retourne le libellé de compte, conformément à la nomenclature du plan comptable français
     * @return string
     */
    public function getCompteLib()
    {
        return $this->compteLib;
    }

    /**
     * Retourne le numéro de compte auxiliaire (à blanc si non utilisé)
     * @return string
     */
    public function getCompAuxNum()
    {
        return $this->compAuxNum;
    }

    /**
     * Retourne le libellé de compte auxiliaire (à blanc si non utilisé)
     * @return string
     */
    public function getCompAuxLib()
    {
        return $this->compAuxLib;
    }

    /**
     * Retourne la référence de la pièce justificative
     * @return string
     */
    public function getPieceRef()
    {
        return $this->pieceRef;
    }

    /**
     * Retourne la date de la pièce justificative
     * @return \DateTime
     */
    public function getPieceDate()
    {
        return $this->pieceDate;
    }

    /**
     * Retourne le libellé de l'écriture comptable
     * @return string
     */
    public function getEcritureLib()
    {
        return $this->ecritureLib;
    }

    /**
     * Retourne le montant au débit
     * @return float
     */
    public function getDebit()
    {
        return $this->debit;
    }

    /**
     * Retourne le montant au crédit
     * @return float
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * Retourne le lettrage de l'écriture comptable (à blanc si non utilisé)
     * @return string
     */
    public function getEcritureLet()
    {
        return $this->ecritureLet;
    }

    /**
     * Retourne la date de lettrage (à blanc si non utilisé)
     * @return \DateTime
     */
    public function getDateLet()
    {
        return $this->dateLet;
    }

    /**
     * Retourne la date de validation de l'écriture comptable
     * @return \DateTime
     */
    public function getValidDate()
    {
        return $this->validDate;
    }

    /**
     * Retourne le montant en devise (à blanc si non utilisé)
     * @return float
     */
    public function getMontantdevise()
    {
        return $this->montantdevise;
    }

    /**
     * Retourne l'identifiant de la devise (à blanc si non utilisé)
     * @return string
     */
    public function getIdevise()
    {
        return $this->idevise;
    }

    /**
     * Affecte le code journal de l'écriture comptable
     * @param string $journalCode
     * @return \A5sys\FecBundle\ValueObject\EcritureComptable
     */
    public function setJournalCode($journalCode)
    {
        $this->journalCode = $journalCode;

        return $this;
    }

    /**
     * Affecte le libellé journal de l'écriture comptable
     * @param string $journalLib
     * @return \A5sys\FecBundle\ValueObject\EcritureComptable
     */
    public function setJournalLib($journalLib)
    {
        $this->journalLib = $journalLib;

        return $this;
    }

    /**
     * Affecte le numéro sur une séquence continue de l'écriture comptable
     * @param string $ecritureNum
     * @return \A5sys\FecBundle\ValueObject\EcritureComptable
     */
    public function setEcritureNum($ecritureNum)
    {
        $this->ecritureNum = $ecritureNum;

        return $this;
    }

    /**
     * Affecte la date de comptabilisation de l'écriture comptable
     * @param \DateTime $ecritureDate
     * @return \A5sys\FecBundle\ValueObject\EcritureComptable
     */
    public function setEcritureDate(\DateTime $ecritureDate)
    {
        $this->ecritureDate = $ecritureDate;

        return $this;
    }

    /**
     * Affecte le numéro de compte, dont les trois premiers caractères doivent correspondre à des chiffres respectant les normes du plan comptable français
     * @param string $compteNum
     * @return \A5sys\FecBundle\ValueObject\EcritureComptable
     */
    public function setCompteNum($compteNum)
    {
        $this->compteNum = $compteNum;

        return $this;
    }

    /**
     * Affecte le libellé de compte, conformément à la nomenclature du plan comptable français
     * @param string $compteLib
     * @return \A5sys\FecBundle\ValueObject\EcritureComptable
     */
    public function setCompteLib($compteLib)
    {
        $this->compteLib = $compteLib;

        return $this;
    }

    /**
     * Optionnel - Affecte le numéro de compte auxiliaire (à blanc si non utilisé)
     * @param string $compAuxNum
     * @return \A5sys\FecBundle\ValueObject\EcritureComptable
     */
    public function setCompAuxNum($compAuxNum = null)
    {
        $this->compAuxNum = $compAuxNum;

        return $this;
    }

    /**
     * Optionnel - Affecte le libellé de compte auxiliaire (à blanc si non utilisé)
     * @param string $compAuxLib
     * @return \A5sys\FecBundle\ValueObject\EcritureComptable
     */
    public function setCompAuxLib($compAuxLib = null)
    {
        $this->compAuxLib = $compAuxLib;

        return $this;
    }

    /**
     * Affecte la référence de la pièce justificative
     * @param string $pieceRef
     * @return \A5sys\FecBundle\ValueObject\EcritureComptable
     */
    public function setPieceRef($pieceRef)
    {
        $this->pieceRef = $pieceRef;

        return $this;
    }

    /**
     * Affecte la date de la pièce justificative
     * @param \DateTime $pieceDate
     * @return \A5sys\FecBundle\ValueObject\EcritureComptable
     */
    public function setPieceDate(\DateTime $pieceDate)
    {
        $this->pieceDate = $pieceDate;

        return $this;
    }

    /**
     * Affecte le libellé de l'écriture comptable
     * @param string $ecritureLib
     * @return \A5sys\FecBundle\ValueObject\EcritureComptable
     */
    public function setEcritureLib($ecritureLib)
    {
        $this->ecritureLib = $ecritureLib;

        return $this;
    }

    /**
     * Affecte le montant au débit
     * @param float $debit
     * @return \A5sys\FecBundle\ValueObject\EcritureComptable
     * @throw \LogicException
     */
    public function setDebit($debit)
    {
        if ($debit !== null && !is_numeric($debit)) {
            throw new \LogicException('setDebit : "'.$debit.'" is not a numeric value');
        }

        $this->debit = floatval($debit);

        return $this;
    }

    /**
     * Affecte le montant au crédit
     * @param float $credit
     * @return \A5sys\FecBundle\ValueObject\EcritureComptable
     * @throw \LogicException
     */
    public function setCredit($credit)
    {
        if ($credit !== null && !is_numeric($credit)) {
            throw new \LogicException('setCredit : "'.$credit.'" is not a numeric value');
        }

        $this->credit = floatval($credit);

        return $this;
    }

    /**
     * Optionnel - Affecte le lettrage de l'écriture comptable (à blanc si non utilisé)
     * @param string $ecritureLet
     * @return \A5sys\FecBundle\ValueObject\EcritureComptable
     */
    public function setEcritureLet($ecritureLet = null)
    {
        $this->ecritureLet = $ecritureLet;

        return $this;
    }

    /**
     * Optionnel - Affecte la date de lettrage (à blanc si non utilisé)
     * @param \DateTime $dateLet
     * @return \A5sys\FecBundle\ValueObject\EcritureComptable
     */
    public function setDateLet(\DateTime $dateLet = null)
    {
        $this->dateLet = $dateLet;

        return $this;
    }

    /**
     * Affecte la date de validation de l'écriture comptable
     * @param \DateTime $validDate
     * @return \A5sys\FecBundle\ValueObject\EcritureComptable
     */
    public function setValidDate(\DateTime $validDate)
    {
        $this->validDate = $validDate;

        return $this;
    }

    /**
     * Optionnel - Affecte le montant en devise (à blanc si non utilisé)
     * @param float $montantDevise
     * @return \A5sys\FecBundle\ValueObject\EcritureComptable
     * @throw \LogicException
     */
    public function setMontantdevise($montantDevise = null)
    {
        if ($montantDevise !== null && !is_numeric($montantDevise)) {
            throw new \LogicException('setMontantdevise : "'.$montantDevise.'" is not a numeric value');
        }

        $this->montantdevise = floatval($montantDevise);

        return $this;
    }

    /**
     * Optionnel - Affecte l'identifiant de la devise (à blanc si non utilisé)
     * @param string $idDevise
     * @return \A5sys\FecBundle\ValueObject\EcritureComptable
     */
    public function setIdevise($idDevise = null)
    {
        $this->idevise = $idDevise;

        return $this;
    }
}
