<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apiProductModel extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'hide',
        'img',
        'dacbiet',
        'view',
        'iddm',
        'bestseller',
        
    ];
    public function apiCategoriesModel(){
        return $this->belongsTo(apiCategoriesModel::class);
    }

}
