<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['product_id', 'user_id', 'content'];

    // Thiết lập quan hệ với Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Thiết lập quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
