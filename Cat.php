<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cat extends Model
{
 use HasFactory;

 protected $primaryKey = 'cat_id';
 protected $fillable = ['name','date_of_birth'];
 protected $appends = ['age'];
 public $timestamps = false;

 public function setDateOfBirthAttribute($value)
 {

    $this->attributes['date_of_birth'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
 }
 public function getDateOfBirthAttribute($value)
 {
    return Carbon::createFromFormat('Y-m-d', $this->attributes['date_of_birth'])->format('m/d/Y');

 }
 public function getAge()
{
    return Carbon::parse($this->attributes['date_of_birth'])->age;
}

} 