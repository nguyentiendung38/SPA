<?php

// App\Models\Service.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'service'; // Chỉ định tên bảng là 'service'

    protected $fillable = ['service_name', 'description', 'price','image'];
    public function packages() {
        return $this->hasMany(Package::class, 'service_id');
    }
    
}
