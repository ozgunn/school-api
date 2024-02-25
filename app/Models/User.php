<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Log as Log;

/**
 * @property string $name
 * @property string $email
 * @property string $phone_country_code
 * @property string $phone_number
 * @property string $language
 * @property string $role
 * @property string $password
 * @property integer $status
 * @property string $image
 */

class User extends Authenticatable implements JWTSubject, CanResetPassword
{
    use HasFactory, Notifiable, SoftDeletes, HasApiTokens;

    const PATH = '/images/user/';
    const IMAGE_DEFAULT_USER = 'default-user.png';
    const IMAGE_DEFAULT_TEACHER = 'default-teacher.png';

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
        'status',
        'image',
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

    public function allSchools()
    {
        return $this->belongsToMany(School::class, 'school_user');
    }

    public function schools()
    {
        return $this->belongsToMany(School::class, 'school_user')
            ->select('schools.*')
            ->where('role', '<=', $this->role)
            ->withPivot('role')
            ;
    }

    public function getCompany()
    {
        return $this->getSchool()->parent;
    }

    public function getSchools()
    {
        return $this->schools()->whereNotNull('parent_id')->get();
    }

    public function getSchool()
    {
        return $this->schools()->whereNotNull('parent_id')->first();
    }

    public function getParentsStudents()
    {
        return Student::where(['parent_id' => $this->id]);
    }

    public function getParentsStudent()
    {
        return $this->getParentsStudents()->first();
    }

    public function teachersClass()
    {
        return $this->hasOne(SchoolClass::class, 'teacher_id');
    }

    public function buses()
    {
        return $this->hasMany(Bus::class, 'teacher_id', 'id');
    }

    public function devices()
    {
        return $this->hasMany(UserDevice::class, 'user_id', 'id');
    }

    public function getFullName()
    {
        return $this->name ?? $this->userData?->getFullName();
    }

    public function getProfileImageUrl()
    {
        $prefix = config('app.url');
        if ($this->image) {
            $fileUrl = $prefix . self::PATH . $this->image;
        } else {
            $defaultImage = ($this->role == User::ROLE_TEACHER) ? self::IMAGE_DEFAULT_TEACHER : self::IMAGE_DEFAULT_USER;
            $fileUrl = $prefix . self::PATH . $defaultImage;
        }
        return $fileUrl;
    }

    public function sendPushNotification($title, $body, $page = null)
    {
        $data = [
            'page' => config('app.app_prefix') . $page,
        ];

        $notification = Firebase::messaging();

        /** @var UserDevice $userDevice */
        foreach ($this->devices as $userDevice) {
            if ($userDevice->status == UserDevice::STATUS_OPEN) {
                $message = CloudMessage::fromArray([
                    'token' => $userDevice->token,
                    'notification' => [
                        'title' => $title,
                        'body' => $body,
                    ],
                    'data' => $data,
                ]);

                $result = $notification->send($message);

                if(isset($result['name'])) {
                    Log::info('push notification sent', ['user' => $this->id, 'title' => $title, 'result' => $result['name']]);
                } else {
                    Log::error('push notification sent failed', ['user' => $this->id, 'title' => $title, 'result' => $result]);
                }
            }
        }
    }

}
