<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab_Scheduler extends Model
{
    //실험관리-실험일정에 사용됨
    protected $table='lab_scheduler';
    protected $fillable=['user_name', 'experiment_name', 'datetime'];
    public $timestamps= true;
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function experiment_details(){
        return $this->hasOne(Experiment_Details::class);
    }
    public function participants(){
        return $this->hasMany(Participants::class);
    }
}
