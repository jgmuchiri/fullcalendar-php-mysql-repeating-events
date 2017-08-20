<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable=['title','repeats','freq','freq_term','start_date','end_date','allDay','status','notes'];
}
