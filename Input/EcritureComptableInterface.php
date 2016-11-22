<?php

namespace A5sys\FecBundle\Input;

/**
 * Interface représentant une écriture comptable française
 */
interface EcritureComptableInterface
{
    /**
     * Retourne le code journal de l'écriture comptable
     * @return string
     */
    public function getJournalCode();

    /**
     * Retourne le libellé journal de l'écriture comptable
     * @return string
     */
    public function getJournalLib();

    /**
     * Retourne le numéro sur une séquence continue de l'écriture comptable
     * @return string
     */
    public function getEcritureNum();

    /**
     * Retourne la date de comptabilisation de l'écriture comptable
     * @return \DateTime
     */
    public function getEcritureDate();

    /**
     * Retourne le numéro de compte, dont les trois premiers caractères doivent correspondre à des chiffres respectant les normes du plan comptable français
     * @return string
     */
    public function getCompteNum();

    /**
     * Retourne le libellé de compte, conformément à la nomenclature du plan comptable français
     * @return string
     */
    public function getCompteLib();

    /**
     * Retourne le numéro de compte auxiliaire (à blanc si non utilisé)
     * @return string
     */
    public function getCompAuxNum();

    /**
     * Retourne le libellé de compte auxiliaire (à blanc si non utilisé)
     * @return string
     */
    public function getCompAuxLib();

    /**
     * Retourne la référence de la pièce justificative
     * @return string
     */
    public function getPieceRef();

    /**
     * Retourne la date de la pièce justificative
     * @return \DateTime
     */
    public function getPieceDate();

    /**
     * Retourne le libellé de l'écriture comptable
     * @return string
     */
    public function getEcritureLib();

    /**
     * Retourne le montant au débit
     * @return float
     */
    public function getDebit();

    /**
     * Retourne le montant au crédit
     * @return float
     */
    public function getCredit();

    /**
     * Retourne le lettrage de l'écriture comptable (à blanc si non utilisé)
     * @return string
     */
    public function getEcritureLet();

    /**
     * Retourne la date de lettrage (à blanc si non utilisé)
     * @return \DateTime
     */
    public function getDateLet();

    /**
     * Retourne la date de validation de l'écriture comptable
     * @return \DateTime
     */
    public function getValidDate();

    /**
     * Retourne le montant en devise (à blanc si non utilisé)
     * @return float
     */
    public function getMontantdevise();

    /**
     * Retourne l'identifiant de la devise (à blanc si non utilisé)
     * @return string
     */
    public function getIdevise();

    /**
     * Affecte le code journal de l'écriture comptable
     * @param string $journalCode
     * @return \A5sys\FecBundle\Input\EcritureComptableInterface
     */
    public function setJournalCode($journalCode);

    /**
     * Affecte le libellé journal de l'écriture comptable
     * @param string $journalLib
     * @return \A5sys\FecBundle\Input\EcritureComptableInterface
     */
    public function setJournalLib($journalLib);

    /**
     * Affecte le numéro sur une séquence continue de l'écriture comptable
     * @param string $ecritureNum
     * @return \A5sys\FecBundle\Input\EcritureComptableInterface
     */
    public function setEcritureNum($ecritureNum);

    /**
     * Affecte la date de comptabilisation de l'écriture comptable
     * @param \DateTime $ecritureDate
     * @return \A5sys\FecBundle\Input\EcritureComptableInterface
     */
    public function setEcritureDate(\DateTime $ecritureDate);

    /**
     * Affecte le numéro de compte, dont les trois premiers caractères doivent correspondre à des chiffres respectant les normes du plan comptable français
     * @param string $compteNum
     * @return \A5sys\FecBundle\Input\EcritureComptableInterface
     */
    public function setCompteNum($compteNum);

    /**
     * Affecte le libellé de compte, conformément à la nomenclature du plan comptable français
     * @param string $compteLib
     * @return \A5sys\FecBundle\Input\EcritureComptableInterface
     */
    public function setCompteLib($compteLib);

    /**
     * Optionnel - Affecte le numéro de compte auxiliaire (à blanc si non utilisé)
     * @param string $compAuxNum
     * @return \A5sys\FecBundle\Input\EcritureComptableInterface
     */
    public function setCompAuxNum($compAuxNum = null);

    /**
     * Optionnel - Affecte le libellé de compte auxiliaire (à blanc si non utilisé)
     * @param string $compAuxLib
     * @return \A5sys\FecBundle\Input\EcritureComptableInterface
     */
    public function setCompAuxLib($compAuxLib = null);

    /**
     * Affecte la référence de la pièce justificative
     * @param string $pieceRef
     * @return \A5sys\FecBundle\Input\EcritureComptableInterface
     */
    public function setPieceRef($pieceRef);

    /**
     * Affecte la date de la pièce justificative
     * @param \DateTime $pieceDate
     * @return \A5sys\FecBundle\Input\EcritureComptableInterface
     */
    public function setPieceDate(\DateTime $pieceDate);

    /**
     * Affecte le libellé de l'écriture comptable
     * @param string $ecritureLib
     * @return \A5sys\FecBundle\Input\EcritureComptableInterface
     */
    public function setEcritureLib($ecritureLib);

    /**
     * Affecte le montant au débit
     * @param float $debit
     * @return \A5sys\FecBundle\Input\EcritureComptableInterface
     */
    public function setDebit($debit);

    /**
     * Affecte le montant au crédit
     * @param float $credit
     * @return \A5sys\FecBundle\Input\EcritureComptableInterface
     */
    public function setCredit($credit);

    /**
     * Optionnel - Affecte le lettrage de l'écriture comptable (à blanc si non utilisé)
     * @param string $ecritureLet
     * @return \A5sys\FecBundle\Input\EcritureComptableInterface
     */
    public function setEcritureLet($ecritureLet = null);

    /**
     * Optionnel - Affecte la date de lettrage (à blanc si non utilisé)
     * @param \DateTime $dateLet
     * @return \A5sys\FecBundle\Input\EcritureComptableInterface
     */
    public function setDateLet(\DateTime $dateLet = null);

    /**
     * Affecte la date de validation de l'écriture comptable
     * @param \DateTime $validDate
     * @return \A5sys\FecBundle\Input\EcritureComptableInterface
     */
    public function setValidDate(\DateTime $validDate);

    /**
     * Optionnel - Affecte le montant en devise (à blanc si non utilisé)
     * @param float $montantDevise
     * @return \A5sys\FecBundle\Input\EcritureComptableInterface
     */
    public function setMontantdevise($montantDevise = null);

    /**
     * Optionnel - Affecte l'identifiant de la devise (à blanc si non utilisé)
     * @param string $idDevise
     * @return \A5sys\FecBundle\Input\EcritureComptableInterface
     */
    public function setIdevise($idDevise = null);
}
