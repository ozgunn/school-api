<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\City
 *
 * @property int $id
 * @property int $country
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'def_cities';

    protected $fillable = ['name','country'];

    protected $guarded = ['id'];
}
