<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    //특정 실험 참가 피실험자용
    protected $table='participants';
    protected $fillable=['experiment_id', 'user_id', 'name'];
    public $timestamps= true;
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function experiment_details(){
        return $this->belongsTo(Experiment_Details::class);
    }
    public function lab_scheduler(){
        return $this->belongsTo(Lab_Scheduler::class);
    }
}
