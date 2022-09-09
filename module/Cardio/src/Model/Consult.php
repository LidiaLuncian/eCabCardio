<?php
namespace Cardio\Model;

class Consult{

    public $id;
    public $date;
    public $idPatient;
    public $personalPhysiologicalAntecedents;
    public $personalPathologicalAntecedents;
    public $heredoCollateralAntecedents;
    public $environmentConditions;
    public $presentState;
    public $circulatorySystem;
    public $localComplementaryExaminations;
    public $personalAntecedents;
    public $consultReasons;
    public $observations;
    public $diagnostic;
    public $recommendations;
    public $treatment;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->date = !empty($data['date']) ? $data['date'] : null;
        $this->idPatient  = !empty($data['idPatient']) ? $data['idPatient'] : null;
        $this->personalPhysiologicalAntecedents  = !empty($data['personalPhysiologicalAntecedents']) ? $data['personalPhysiologicalAntecedents'] : null;
        $this->personalPathologicalAntecedents  = !empty($data['personalPathologicalAntecedents']) ? $data['personalPathologicalAntecedents'] : null;
        $this->heredoCollateralAntecedents  = !empty($data['heredoCollateralAntecedents']) ? $data['heredoCollateralAntecedents'] : null;
        $this->environmentConditions  = !empty($data['environmentConditions']) ? $data['environmentConditions'] : null;
        $this->presentState  = !empty($data['presentState']) ? $data['presentState'] : null;
        $this->circulatorySystem  = !empty($data['circulatorySystem']) ? $data['circulatorySystem'] : null;
        $this->localComplementaryExaminations  = !empty($data['localComplementaryExaminations']) ? $data['localComplementaryExaminations'] : null;
        $this->personalAntecedents  = !empty($data['personalAntecedents']) ? $data['personalAntecedents'] : null;
        $this->consultReasons  = !empty($data['consultReasons']) ? $data['consultReasons'] : null;
        $this->observations  = !empty($data['observations']) ? $data['observations'] : null;
        $this->diagnostic  = !empty($data['diagnostic']) ? $data['diagnostic'] : null;
        $this->recommendations  = !empty($data['recommendations']) ? $data['recommendations'] : null;
        $this->treatment  = !empty($data['treatment']) ? $data['treatment'] : null;
    }

}