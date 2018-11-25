<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testers extends Model
{
    //연구원들 리스트용
    protected $table='testers';
    protected $fillable=['name', 'univ', 'dept', 'email'];
    public $timestamps= true;
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function soa(){
        return $this->hasMany(Supervisors_And_Others::class);
    }
    public function univ(){
        return $this->hasMany(Univ::class);
    }
    public function dept(){
        return $this->hasMany(Dept::class);
    }
}
