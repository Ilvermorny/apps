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
    public function getName()
    {
        $api = new \OtherCode\Rest\Rest();
        $api->configuration->url = "https://ilvermorny.xyz/";//
        if ($this->type == 'user') {
            $response = $api->get("misc.php?page=api&user=$this->id");
            $response = json_decode($response->body, true);
            $response = $response['username'];
        } else if ($this->type == 'family') {
            $response = $api->get("misc.php?page=api&family=$this->id");
            $response = json_decode($response->body, true);
            $response = $response['subject'];
        }
        return $response;
    }
}
