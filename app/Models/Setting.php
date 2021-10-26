<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'email',
        'telephone',
        'logo_color',
        'logo_white',
        'fav_icon',
    ];

    protected $searchableFields = ['*'];
}
