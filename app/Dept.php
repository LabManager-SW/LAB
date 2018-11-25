<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dept extends Model
{
    protected $table='Dept';
    protected $fillable=['name','univ_id'];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function Univ(){
        return $this->belongsTo(Univ::class);
    }
    public function testers(){
        return $this->belongsTo(Testers::class);
    }
}
