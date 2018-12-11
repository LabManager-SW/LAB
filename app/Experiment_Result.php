<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiment_Result extends Model
{
    //실험 세부 정보 및 결과
    protected $table='experiment_result';
    protected $fillable=['experiment_id', 'file','participant_id', 'remark','datetime'];
    public $timestamps= true;
    public function participants(){
        return $this->belongsTo(Participants::class);
    }
    public function experiment(){
        return $this->belongsTo(Experiment::class);
    }
}
