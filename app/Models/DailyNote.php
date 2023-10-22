<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $parent_id
 * @property string $type
 * @property string $title
 * @property string $option
 * @property \DateTime $created_at
 */
class DailyNote extends Model
{
    use HasFactory, Timestamp;

    const TYPE_MOOD = 'mood';
    const TYPE_ACTIVITY = 'activity';
    const TYPE_FOOD = 'food';

    protected $table = 'daily_notes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'type',
        'title',
        'option',
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

    public function parent() {
        return $this->belongsTo(DailyNote::class, 'parent_id', 'id');
    }

}
