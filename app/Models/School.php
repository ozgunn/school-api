<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $parent_id
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 */
class School extends Model
{
    use HasFactory, Timestamp, SoftDeletes;

    const STATUS_ACTIVE = 1;
    const STATUS_PASSIVE = 0;
    const STATUSES = [
        self::STATUS_PASSIVE,
        self::STATUS_ACTIVE
    ];
    const TYPE_COMPANY = 'company';
    const TYPE_SCHOOL = 'school';

    protected $table = 'schools';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'name',
        'logo',
        'status',
        'phone',
        'email',
        'country',
        'city',
        'town',
        'address',
    ];

    protected $guarded = ['id', 'user_id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    public function parent() {
        return $this->belongsTo(School::class, 'parent_id', 'id');
    }

    // Okula manager eklemek
    //$school->managers()->attach($user, ['role' => \App\Models\User::ROLE_MANAGER]);

    // Okulun manager'larını düzenlemek
    //$school->managers()->syncWithPivotValues([$user1->id, $user2->id], ['role' => 50]);

    // Get all users
    public function users()
    {
        return $this->belongsToMany(User::class, 'school_user')
            ->withPivot('role');
    }

    public function admins()
    {
        return $this->belongsToMany(User::class, 'school_user')
            ->wherePivot('role', User::ROLE_ADMIN);
    }

    public function managers()
    {
        return $this->belongsToMany(User::class, 'school_user')
            ->wherePivot('role', User::ROLE_MANAGER);
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'school_user')
            ->wherePivot('role', User::ROLE_TEACHER);
    }

    public function parents()
    {
        return $this->belongsToMany(User::class, 'school_user')
            ->wherePivot('role', User::ROLE_PARENT);
    }
}
