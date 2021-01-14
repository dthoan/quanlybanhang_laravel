<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table = "customer";

    public function bills(){
        return $this->hasCast("App\bills", "id_customer", "id");
    }
}
