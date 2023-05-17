<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Bpuig\Subby\Traits\HasSubscriptions;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravolt\Avatar\Avatar;
use Spatie\Permission\Traits\HasRoles;

/**
 * @method static paginate()
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    use HasSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: fn() => (new Avatar)->create($this->name)->toBase64(),
        );
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->first_name . ' ' . $this->last_name;
            }
        );
    }

    public function properties()
    {
        return $this->hasMany(Property::class,'user_id','id');
    }
}
