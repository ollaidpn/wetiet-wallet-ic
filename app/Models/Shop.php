<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'shop_name',
        'description',
        'logo',
        'telephone',
        'email',
    ];

    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function refuelings()
    {
        return $this->hasMany(Refueling::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
