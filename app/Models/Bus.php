<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $teacher_id
 * @property integer $school_id
 * @property double $lat
 * @property double $long
 * @property string $license_plate
 * @property Carbon $start_time
 * @property Carbon $end_time
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 */
class Bus extends Model
{
    use HasFactory, Timestamp;

    const STATUS_ACTIVE = 1;
    const STATUS_PASSIVE = 0;
    const STATUS_CANCELED = 2;

    protected $table = 'bus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'teacher_id',
        'license_plate',
        'lat',
        'long',
        'start_date',
        'end_date',
        'status',
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

    public function teacher() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function school() {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

}
