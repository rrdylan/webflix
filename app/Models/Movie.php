<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    use HasFactory;

    protected $casts = [
        'released_at' => 'date',
    ];

    protected $guarded = [];

    public function duration(): Attribute
    {
        return Attribute::make(
            get: function($value) {
                $hours = floor($value / 60);
                $minutes = $value % 60;
                $zero = ( $minutes < 10) ? '0':'';
                
                return $hours.'h'.$zero.$minutes;
            },
            set: function($value){
                $time = explode('h', $value);

                if( count($time) === 2){
                    return $time[0] *60 + (int) $time[1];
                }

                return $time[0];
            }
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class, 'actors_movies');
    }
}
