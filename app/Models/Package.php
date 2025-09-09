<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $table = 'packages';

    protected $fillable = ['service_id', 'package_name', 'description', 'price'];

    /**
     * Định nghĩa mối quan hệ với model Service.
     */
    public function service() {
        return $this->belongsTo(Service::class, 'service_id');
    }
    
    
}
