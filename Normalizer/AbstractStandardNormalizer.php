<?php

namespace A5sys\FecBundle\Normalizer;

use A5sys\FecBundle\ValueObject\EcritureComptableInterface;
use A5sys\FecBundle\Validator\ValidatorInterface;

/**
 * Normalize standard input to an assoc array
 */
abstract class AbstractStandardNormalizer implements NormalizerInterface
{
    /**
     * Validator of this normalizer
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     * construct
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Returns the names of the fields.
     * Warning : Debit and Credit are NOT included since it can be Montant and Sens instead. @see DebitcreditComputerInterface implementers
     * Warning : order matters
     * @return array<string>
     */
    public function getFieldNames()
    {
        return array(
            'JournalCode',
            'JournalLib',
            'EcritureNum',
            'EcritureDate',
            'CompteNum',
            'CompteLib',
            'CompAuxNum',
            'CompAuxLib',
            'PieceRef',
            'PieceDate',
            'EcritureLib',
            'EcritureLet',
            'DateLet',
            'ValidDate',
            'Montantdevise',
            'Idevise',
        );
    }

    /**
     * Normalize one EcritureComptableInterface
     * Warning : order matters
     * @param EcritureComptableInterface $ecritureComptable
     * @throw A5sys\FecBundle\Exception\FecValidationException
     * @return array
     */
    public function toArray(EcritureComptableInterface $ecritureComptable)
    {
        $this->validator->validate($ecritureComptable);

        $data = array();

        $data['JournalCode'] = $ecritureComptable->getJournalCode();
        $data['JournalLib'] = $ecritureComptable->getJournalLib();
        $data['EcritureNum'] = $ecritureComptable->getEcritureNum();
        $data['EcritureDate'] = $ecritureComptable->getEcritureDate();
        $data['CompteNum'] = $ecritureComptable->getCompteNum();
        $data['CompteLib'] = $ecritureComptable->getCompteLib();
        $data['CompAuxNum'] = $ecritureComptable->getCompAuxNum();
        $data['CompAuxLib'] = $ecritureComptable->getCompAuxLib();
        $data['PieceRef'] = $ecritureComptable->getPieceRef();
        $data['PieceDate'] = $ecritureComptable->getPieceDate();
        $data['EcritureLib'] = $ecritureComptable->getEcritureLib();
        $data['EcritureLet'] = $ecritureComptable->getEcritureLet();
        $data['DateLet'] = $ecritureComptable->getDateLet();
        $data['ValidDate'] = $ecritureComptable->getValidDate();
        $data['Montantdevise'] = $ecritureComptable->getMontantdevise();
        $data['Idevise'] = $ecritureComptable->getIdevise();

        return $data;
    }

    /**
     * Sets the standard properties on the EcritureComptableInterface instance
     * Thos properties are set for all kind of EcritureComptableInterface implementing classes
     * @param EcritureComptableInterface $ecritureComptable
     * @param array $data
     */
    protected function setStandardProperties(EcritureComptableInterface $ecritureComptable, $data)
    {
        $ecritureComptable->setJournalCode($data['JournalCode']);
        $ecritureComptable->setJournalLib($data['JournalLib']);
        $ecritureComptable->setEcritureNum($data['EcritureNum']);
        $ecritureComptable->setEcritureDate($data['EcritureDate']);
        $ecritureComptable->setCompteNum($data['CompteNum']);
        $ecritureComptable->setCompteLib($data['CompteLib']);
        $ecritureComptable->setCompAuxNum($data['CompAuxNum']);
        $ecritureComptable->setCompAuxLib($data['CompAuxLib']);
        $ecritureComptable->setPieceRef($data['PieceRef']);
        $ecritureComptable->setPieceDate($data['PieceDate']);
        $ecritureComptable->setEcritureLib($data['EcritureLib']);
        $ecritureComptable->setEcritureLet($data['EcritureLet']);
        $ecritureComptable->setDateLet($data['DateLet']);
        $ecritureComptable->setValidDate($data['ValidDate']);
        $ecritureComptable->setMontantdevise($data['Montantdevise']);
        $ecritureComptable->setIdevise($data['Idevise']);
    }

    /**
     * Validate the object
     * @param EcritureComptableInterface $ecritureComptable
     *
     * @throw FecValidationException
     */
    public function validateValueObject(EcritureComptableInterface $ecritureComptable)
    {
        $this->validator->validate($ecritureComptable);
    }
}
