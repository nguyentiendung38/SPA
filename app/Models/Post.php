<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasFactory;

    protected $fillable = ['title', 'content', 'image', 'category_blogs_id', 'views'];

    public function category()
    {
        return $this->belongsTo(Category_blog::class, 'category_blogs_id'); // Sử dụng 'category_id' nếu đây là tên của khóa ngoại
    }
    
}
