<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class bills extends Model
{
    protected $table = "bills";
    public function custommer(){
        return $this->belongsTo("App\custommers", "id_customer", "id");
    }
    public function bill_detail(){
        return $this->hasCast("bill_detail", "id_bill", "id");
    }

    public function getDateAttribute($date){

        return Carbon::createFromFormat('Y-m-d', $date)->toDateTimeString();

    }
}
