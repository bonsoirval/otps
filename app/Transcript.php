<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transcript extends Model
{
    /*
    *Get the transcript_application with the transcript
    */
    public function transcript_application()
    {
      return $this->hasOne('App\Transcript_application');
    }
}
