<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'bib',
        'first_name',
        'last_name',
        'email',
        'phone',
        'category_entered',
        'dob',
        'gender',
    ];
}
