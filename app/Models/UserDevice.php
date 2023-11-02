<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $model
 * @property string $token
 * @property integer $status
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 */
class UserDevice extends Model
{
    use HasFactory, Timestamp;

    const STATUS_OPEN = 1;
    const STATUS_CLOSE = 0;

    protected $table = 'user_devices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'token',
        'status',
        'name',
        'model',
    ];

    protected $guarded = ['id'];

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

    public function user() {
        return $this->belongsTo(User::class);
    }

}
