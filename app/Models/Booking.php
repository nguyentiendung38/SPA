<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking'; // Chỉ định tên bảng là 'booking'

    protected $fillable = [
        'user_id',
        'service_id',
        'package_id',
        'message',
        'appointment_datetime',
        'status',
    ];

    /**
     * Định nghĩa mối quan hệ với model Service.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Định nghĩa mối quan hệ với model User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);

    } 
    public function package() // Thêm phương thức này
    {
        return $this->belongsTo(Package::class); // Giả sử 'package_id' là khóa ngoại trong bảng bookings
    }
    
}
