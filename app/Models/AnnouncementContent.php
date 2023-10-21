<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $announcement_id
 * @property string $lang
 * @property string $content
 * @property \DateTime $created_at
 */
class AnnouncementContent extends Model
{
    use HasFactory, Timestamp;

    const LANG_TR = 'tr';
    const LANG_EN = 'en';

    protected $table = 'announcement_content';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'announcement_id',
        'lang',
        'content',
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

}
