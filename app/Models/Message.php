<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $school_id
 * @property integer $student_id
 * @property integer $teacher_id
 * @property integer $type
 * @property string $message
 * @property string $ip
 * @property \DateTime $read_at
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 */
class Message extends Model
{
    use HasFactory, Timestamp;

    const TYPE_SCHOOL = 1;
    const TYPE_TEACHER = 2;
    const TYPES = [
        'school' => self::TYPE_SCHOOL,
        'teacher' => self::TYPE_TEACHER,
    ];
    const ROLE_SENDER = 'sender';
    const ROLE_RECIPIENT = 'recipient';

    protected $table = 'messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'user_id',
        'student_id',
        'teacher_id',
        'message',
        'type',
        'ip',
        'read_at',
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
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function school() {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    public function teacher() {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

    public function student() {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

}
