<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'slug',
        'category_id',
        'capacity'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function eventDescriptions()
    {
        return $this->hasMany(EventDescription::class);
    }

    public function eventAssistants()
    {
        return $this->hasMany(EventAssistant::class);
    }
}
