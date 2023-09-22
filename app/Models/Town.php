<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\County
 *
 * @property int $id
 * @property int $city
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Town extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'def_towns';

    protected $fillable = ['name','city'];

    protected $guarded = ['id'];
}
