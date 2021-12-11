<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'language'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

   
}
