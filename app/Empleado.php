<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Empleado extends Model
{
  protected $table = 'empleados';

  protected $fillable = ['name', 'email', 'birthdate'];

  public function domicilios(){
      return $this->hasMany('App\Domicilio');
  }

  public function getBirthdateAttribute($value){
    return date('d/m/Y', strtotime($value));
  }

  public function setBirthdateAttribute($value){
    $this->attributes['birthdate'] = \DateTime::createFromFormat('d/m/Y', $value)->format('Y-m-d');
  }
}
