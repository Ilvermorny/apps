<?php

namespace App\Bank;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    public function vault()
    {
        return $this->belongsTo('App\Bank\Vault');
    }

}
