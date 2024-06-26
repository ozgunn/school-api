<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $school_id
 * @property integer $group_id
 * @property integer $teacher_id
 * @property string $name
 */
class SchoolClass extends Model
{
    use HasFactory, Timestamp, SoftDeletes;

    protected $table = 'classes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'group_id',
        'teacher_id',
        'name',
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

    public function teacher() {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id', 'id');
    }
}
