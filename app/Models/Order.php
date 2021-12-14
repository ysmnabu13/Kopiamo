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
        'orderStatus',
        'orderName',
        'orderPrice',
        'paymentType',
        'totalPrice',
        'paymentStatus',
        'fullName',
        'ccNumber',

    ];

    public function menu() : BelongsToMany{
        return $this->belongsToMany(Menu::class);
    }
}
