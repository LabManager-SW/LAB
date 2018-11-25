<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiment_Details extends Model
{
    //실험 세부 정보 및 결과
    protected $table='experiment_details';
    protected $fillable=['name','objective', 'location', 'time_taken', 'payment', 'method_desc', 'poa', 'background', 'datetime', 'result', 'remark'];
    public $timestamps= true;
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function participants(){
        return $this->hasMany(Participants::class);
    }
    public function soa(){
        return $this->hasMany(Supervisors_And_Others::class);
    }
    public function lab_scheduler(){
        return $this->belongsTo(Lab_Scheduler::class);
    }
}
