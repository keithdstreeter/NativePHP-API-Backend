<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'date_sent',
        'message',
        'first_name',
        'last_name',
        'bib',
        'ride_short_name',
    ];

   
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date_sent' => 'datetime',
        ];
    }
}
