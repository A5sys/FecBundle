<?php

namespace A5sys\FecBundle\Normalizer;

use A5sys\FecBundle\Input\EcritureComptableInterface;
use A5sys\FecBundle\Validator\ValidatorInterface;

/**
 * Normalize standard input to an assoc array
 */
class StandardNormalizer implements NormalizerInterface
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
    public function normalize(EcritureComptableInterface $ecritureComptable)
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
}
