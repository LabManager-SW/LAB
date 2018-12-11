<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Univ extends Model
{
    protected $table='univ';
    protected $fillable=['name'];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
    public function dept(){
        return $this->hasMany(Dept::class);
    }
}
