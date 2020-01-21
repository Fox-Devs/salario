<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrossSalary extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $fillable = [
    'gross_salary',
    'employee_id',
  ];


  public function relatonBetweenEmployee()
  {
    return $this->hasOne('App\Employee','id','employee_id');
  }




}
