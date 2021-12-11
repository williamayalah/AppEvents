<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'language'
    ];

   public function event(){
       return $this->belongsTo(Event::class);
   }
}
