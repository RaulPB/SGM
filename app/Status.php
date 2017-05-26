<?php

namespace Ifiix;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
      protected $table = "statuses";
  protected $fillable = ['status'];

      public function serv()
    {
        return $this->hasOne('Ifiix\Serv');
    }
}
