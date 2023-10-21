<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $school_id
 * @property integer $class_id
 * @property integer $student_id
 * @property integer $teacher_id
 * @property integer $sender_id
 * @property integer $target
 * @property DateTime $created_at
 */
class Announcement extends Model
{
    use HasFactory, Timestamp, SoftDeletes;

    const TARGET_STUDENT = 1;
    const TARGET_TEACHER = 2;

    protected $table = 'announcements';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'group_id',
        'class_id',
        'teacher_id',
        'student_id',
        'sender_id',
        'target',
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

    public function sender() {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function teacher() {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function student() {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function contents() {
        return $this->hasMany(AnnouncementContent::class, 'announcement_id');
    }

    public function recipients() {
        return $this->hasMany(AnnouncementRecipient::class, 'announcement_id');
    }

}
