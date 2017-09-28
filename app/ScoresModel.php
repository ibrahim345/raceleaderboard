<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoresModel extends Model
{
     protected $table = 'scores';
  	 protected $fillable = array('id','runner_id','time', 'created_at', 'updated_at');
}
