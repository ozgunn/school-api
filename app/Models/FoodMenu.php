<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $parent_id
 * @property integer $school_id
 * @property string $lang
 * @property string $first_meal
 * @property string $second_meal
 * @property string $third_meal
 * @property \DateTime $date
 * @property \DateTime $created_at
 */
class FoodMenu extends Model
{
    use HasFactory, Timestamp;

    const LANG_TR = 'tr';
    const LANG_EN = 'en';

    protected $table = 'food_menu';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'school_id',
        'lang',
        'date',
        'first_meal',
        'second_meal',
        'third_meal',
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
        return $this->belongsTo(FoodMenu::class, 'parent_id', 'id');
    }

    public function school() {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

}
