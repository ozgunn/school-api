<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

/**
 * @property string $name
 * @property string $email
 * @property string $phone_country_code
 * @property string $phone_number
 * @property string $language
 * @property string $role
 * @property string $password
 * @property integer $status
 */

class User extends Authenticatable implements JWTSubject, CanResetPassword
{
    use HasFactory, Notifiable, SoftDeletes;

    const STATUS_PASSIVE = 0;
    const STATUS_ACTIVE = 10;
    const STATUSES = [self::STATUS_PASSIVE, self::STATUS_ACTIVE];

    const ROLE_SUPERADMIN = 101;
    const ROLE_ADMIN = 100;
    const ROLE_MANAGER = 50;
    const ROLE_TEACHER = 20;
    const ROLE_PARENT = 10;
    const ROLES = [
        self::ROLE_SUPERADMIN => 'admin',
        self::ROLE_ADMIN => 'admin',
        self::ROLE_MANAGER => 'manager',
        self::ROLE_TEACHER => 'teacher',
        self::ROLE_PARENT => 'parent'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_country_code',
        'phone_number',
        'language',
        'role',
        'status'
    ];

    protected $guarded = ['id'];

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

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function userData()
    {
        return $this->hasOne(UserData::class, 'user_id');
    }

    public function schools()
    {
        return $this->belongsToMany(School::class, 'school_user')
            ->withPivot('role');
    }
}
