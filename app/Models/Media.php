<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $school_id
 * @property integer $group_id
 * @property integer $class_id
 * @property integer $type
 * @property string $file
 * @property string $description
 * @property integer $publish_date
 * @property DateTime $created_at
 */
class Media extends Model
{
    use HasFactory, Timestamp, SoftDeletes;

    const PATH = "/images/media/";
    const TYPE_PHOTO = '1';
    const TYPE_VIDEO = '2';

    const TYPES = [
        self::TYPE_PHOTO => 'photo',
        self::TYPE_VIDEO => 'video',
    ];

    protected $table = 'media';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'group_id',
        'class_id',
        'user_id',
        'type',
        'file',
        'description',
        'publish_date',
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

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function group() {
        return $this->belongsTo(Group::class);
    }

    public function schoolClass() {
        return $this->belongsTo(SchoolClass::class, 'class_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
