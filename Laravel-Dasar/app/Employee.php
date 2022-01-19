<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'company',
        'email',
  ];

  public function companies()
{
    return $this->belongsTo('App\Company', 'company');
}
}
