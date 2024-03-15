<?php

namespace App\Models;

use App\Jobs\SendFirebaseNotification;
use Carbon\Traits\Date;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $school_id
 * @property integer $class_id
 * @property integer $parent_id
 * @property string $name
 * @property string $image
 * @property Date $birth_date
 */
class Student extends Model
{
    use HasFactory, Timestamp, SoftDeletes;

    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'class_id',
        'parent_id',
        'name',
        'birth_date',
        'image',
        'morning_bus_id',
        'evening_bus_id',
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

    public function class() {
        return $this->belongsTo(SchoolClass::class, 'class_id', 'id');
    }

    public function parent() {
        return $this->belongsTo(User::class, 'parent_id', 'id');
    }

    public function morningBus()
    {
        return $this->belongsTo(Bus::class, 'morning_bus_id', 'id');
    }

    public function eveningBus()
    {
        return $this->belongsTo(Bus::class, 'evening_bus_id', 'id');
    }

    public function getBuses()
    {
        return [
            $this->morningBus->first(),
            $this->eveningBus->first(),
        ];
    }

    public function sendNotification($from, $title, $body, $page)
    {
        $n = new UserNotification();
        $n->sender_id = $from->id;
        $n->user_id = $this->parent_id;
        $n->title = $title;
        $n->description = $body;
        $n->page = $page;
        $n->save();

        dispatch(new SendFirebaseNotification($n));
    }
}
