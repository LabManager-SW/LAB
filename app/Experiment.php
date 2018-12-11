<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiment extends Model
{
    //실험 세부 정보 및 결과
    protected $table='experiment';
    protected $fillable=['name', 'poa', 'background', 'tester_id'];
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
    public function experiment_details(){
        return $this->hasMany(Experiment_Details::class);
    }
}
