<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $fillable = [
		'currency_name',
		'exchange_code',
	];

    public function pairFrom(){
        return $this->hasMany(Pair::class,'currency_id_from');
    }
    public function pairTo(){
        return $this->hasMany(Pair::class,'currency_id_to');
    }
}
