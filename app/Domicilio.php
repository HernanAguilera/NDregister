<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
  protected $table = 'domicilios';

  protected $fillable = ['alias', 'description', 'lat', 'lon', 'empleado'];

  public function empleado(){
      return $this->belongsTo('App\Empleado');
  }
}
