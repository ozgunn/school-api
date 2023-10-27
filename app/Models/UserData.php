<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 */

class UserData extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'users_data';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
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

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
