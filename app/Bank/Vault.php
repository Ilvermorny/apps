<?php

namespace App\Bank;

use Illuminate\Database\Eloquent\Model;


class Vault extends Model
{
    protected $fillable = ['forum', 'type'];

    public function transactions()
    {
        return $this->hasMany('App\Bank\Transaction');
    }
    public function getTitleAttribute()
    {
        $api = new \OtherCode\Rest\Rest();
        $api->configuration->url = "https://ilvermorny.xyz/";//
        if ($this->type == 'user') {
            $response = $api->get("misc.php?page=api&user=$this->forum");
            $response = json_decode($response->body, true);
            $response = $response['username'];
        } else if ($this->type == 'family') {
            $response = $api->get("misc.php?page=api&family=$this->forum");
            $response = json_decode($response->body, true);
            $response = $response['subject'];
        }
        return $response;
    }
    //transactions_paginated
    public function getTransactionsPaginatedAttribute()
    {
        return $this->transactions()->orderBy('deposit_date', 'asc')->paginate(10);
    }
    public function getUrlAttribute()
    {
        return route('vaults.show', [$this->id, $this->slug]);
        //return route('vaults.show', $this);

    }
    public function getTotalAttribute()
    {
        return $this->transactions->sum('amount');
    }
    public function getNumberAttribute()
    {
        return $this->transactions()->count();
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}

