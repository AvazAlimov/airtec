<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;
    protected $fillable = [
        'name', 'phone', 'number'
    ];
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
