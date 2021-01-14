<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bills extends Model
{
    protected $table = "bills";
    public function custommer(){
        return $this->belongsTo("App\custommers", "id_customer", "id");
    }
    public function bill_detail(){
        return $this->hasCast("App\bill_detail", "id_bill", "id");
    }
}
