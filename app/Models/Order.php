<?php

namespace App\Models;

use App\Models\OrderItem;
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
        'fullname',
        'email',
        'phone',
        'notes',
        'orderStatus',
        'totalPrice',
        'paymentType',
        'paymentStatus',
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

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
