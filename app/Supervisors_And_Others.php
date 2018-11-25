<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisors_And_Others extends Model
{
    //특정 실험 참여 연구원용
    protected $table='supervisors_and_others';
    protected $fillable=['experiment_id', 'tester_id'];
    public $timestamps= true;
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function testers(){
        return $this->belongsTo(Testers::class);
    }
    public function experiment_details(){
        return $this->belongsTo(Experiment_Details::class);
    }
}
