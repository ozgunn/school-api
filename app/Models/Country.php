<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $phone_code
 * @property string $region
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'def_countries';

    protected $fillable = ['name','code','phone_code','region'];

    protected $guarded = ['id'];

    public static function getCountriesByIdAsArray()
    {
        return Country::orderBy('id')->get()->pluck('id')->toArray();
    }
}
