<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BenifitSalary extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $fillable = [
    'gross_salary_id',
    'benifit_id_add',
    'benifit_id_deduct',
    'benifit_add_value',
    'benifit_add_deduct',
  ];
}
