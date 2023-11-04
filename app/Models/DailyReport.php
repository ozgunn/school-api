<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $student_id
 * @property integer $school_id
 * @property integer $class_id
 * @property string $selected_notes
 * @property string $note
 * @property \DateTime $data
 * @property \DateTime $read_at
 * @property \DateTime $confirmed_at
 * @property \DateTime $created_at
 */
class DailyReport extends Model
{
    use HasFactory, Timestamp;

    protected $table = 'daily_reports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'school_id',
        'class_id',
        'selected_notes',
        'note',
        'read_at',
        'confirmed_at',
        'date',
        'user_id',
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

    public function student() {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function school() {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    public function schoolClass() {
        return $this->belongsTo(SchoolClass::class, 'class_id', 'id');
    }

}
