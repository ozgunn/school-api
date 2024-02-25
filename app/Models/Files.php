<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $user_from
 * @property integer $user_to
 * @property integer $school_id
 * @property integer $group_id
 * @property integer $class_id
 * @property integer $student_id
 * @property integer $type
 * @property string $file
 * @property string $description
 * @property integer $publish_year
 * @property integer $publish_month
 * @property boolean $is_url
 * @property string $ip
 * @property DateTime $created_at
 */
class Files extends Model
{
    use HasFactory, Timestamp, SoftDeletes;

    const PATH = "/files/";
    const TYPE_PDF_PARENTS = '1';
    const TYPE_PDF_GROUPS = '2';

    const TYPES = [
        self::TYPE_PDF_PARENTS,
        self::TYPE_PDF_GROUPS,
    ];

    protected $table = 'files';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'group_id',
        'class_id',
        'student_id',
        'user_from',
        'user_to',
        'type',
        'file',
        'is_url',
        'description',
        'ip',
        'publish_year',
        'publish_month',
        'lang',
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
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    public function group() {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function schoolClass() {
        return $this->belongsTo(SchoolClass::class, 'class_id', 'id');
    }

    public function userFrom() {
        return $this->belongsTo(User::class, 'user_from', 'id');
    }

    public function userTo() {
        return $this->belongsTo(User::class, 'user_to', 'id');
    }

    public function student() {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

}
