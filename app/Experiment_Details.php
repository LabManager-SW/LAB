<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiment_Details extends Model
{
    //실험 세부 정보 및 결과
    protected $table='experiment_details';
    protected $fillable=['name', 'location', 'time_taken', 'payment', 'method_desc', 'poa', 'background', 'health_condition','tester_id','required_applicant', 'applicant'];
    public $timestamps= true;
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function participants(){
        return $this->hasMany(Participants::class);
    }
    public function experiment_result(){
        return $this->hasMany(Experiment_Result::class);
    }
}
