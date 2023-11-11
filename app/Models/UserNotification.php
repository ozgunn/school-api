<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $description
 * @property string $page
 * @property DateTime $read_at
 * @property DateTime $sent_at
 * @property DateTime $created_at
 */
class UserNotification extends Model
{
    use HasFactory, Timestamp;

    const TYPE_ALL = "all";
    const TYPE_UNREAD = "unread";
    const TYPES = [
        self::TYPE_ALL, self::TYPE_UNREAD,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'page',
        'description',
        'read_at',
        'sent_at',
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
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
