<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['num', 'date', 'amount','user_id','name','city','address','tel'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderproducts(){
        return $this->hasMany(Orderproduct::class);
    }
}
