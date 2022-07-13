<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'title',
        'price',
        'coverImage',
        'unit',
        'description',
        'slug',
        'user_id',
        'category_id',
        'stock',
        'discountAmount',
        'discountType',
        'discountStatus',
        ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

}
