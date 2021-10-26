<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\Searchable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use HasFactory;
    use Searchable;
    use HasApiTokens;

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'telephone',
        'balance',
        'password',
        'avatarf',
        'currency',
        'cni_face',
        'cni_back',
        'selfie_cni',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function favorises()
    {
        return $this->hasMany(Favorite::class);
    }

    public function tokenizer()
    {
        return $this->hasOne(Tokenizer::class);
    }

    public function shop()
    {
        return $this->hasOne(Shop::class);
    }

    public function refuelings()
    {
        return $this->hasMany(Refueling::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function transferts()
    {
        return $this->hasMany(Transfert::class);
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('super-admin');
    }
}
