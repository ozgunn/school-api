<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

class UserData extends Model
{
    use HasFactory;

    protected $table = 'users_data';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
