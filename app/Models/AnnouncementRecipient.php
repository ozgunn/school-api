<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $announcement_id
 * @property integer $student_id
 * @property integer $teacher_id
 * @property \DateTime $read_at
 */
class AnnouncementRecipient extends Model
{
    use HasFactory, Timestamp;

    protected $table = 'announcement_recipients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'announcement_id',
        'student_id',
        'teacher_id',
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

    public function announcement() {
        return $this->belongsTo(Announcement::class, 'announcement_id', 'id');
    }

    public function student() {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function teacher() {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }
}
