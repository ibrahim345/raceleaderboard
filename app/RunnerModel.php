<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RunnerModel extends Model
{
     protected $table = 'runners';
  	 protected $fillable = array('id','firstname','lastname', 'email',  'dob' , 'created_at', 'updated_at');
}
