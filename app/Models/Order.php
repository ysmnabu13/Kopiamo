<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'notes',
        'orderStatus',
        'orderName',
        'orderPrice',
        'totalPrice',
        'paymentType',
        'paymentStatus',
        'fullName',
        'ccNumber',
    ];

    public function menu() : BelongsToMany{
        return $this->belongsToMany(Menu::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id' , 'id');
    }
    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }
}
