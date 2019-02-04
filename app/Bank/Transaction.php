<?php

namespace App\Bank;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['reason', 'request', 'amount', 'responsible', 'vault_id', 'deposit_date'];
    public function vault()
    {
        return $this->belongsTo('App\Bank\Vault');
    }

}
