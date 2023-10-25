<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $bus_id
 * @property integer $user_id
 * @property integer $status
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 */
class BusAction extends Model
{
    use HasFactory, Timestamp;

    const STATUS_STARTED = 1;
    const STATUS_ARRIVED = 2;

    protected $table = 'bus_action';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bus_id',
        'user_id',
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

    public function bus() {
        return $this->belongsTo(Bus::class, 'bus_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
