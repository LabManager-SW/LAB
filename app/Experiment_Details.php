<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiment_Details extends Model
{
    //실험 세부 정보 및 결과
    protected $table='experiment_details';
    protected $fillable=['name', 'poa', 'background', 'tester_name','exp_id', 'location', 'end_recruit_date','objective', 'time_taken', 'payment', 'method_desc', 'health_condition', 'required_applicant', 'applicant','datetime'];
    public $timestamps= true;
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function experiment(){
        return $this->belongsTo(Experiment::class);
    }
    public function participants(){
        return $this->hasMany(Participants::class);
    }
}
