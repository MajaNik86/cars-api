<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'cars';
    protected $fillable = [
        'brand',
        'model',
        'year',
        'maxSpeed',
        'isAutomatic',
        'engine',
        'number_of_doors'
    ];

    public function scopeSearchByBrand($query, $term)
    {
        return $query->where('brand', 'LIKE', '%' . $term . '%');
        //    select all from cars where like % bilo gde da se nalazi $term
    }

    public  function scopeSearchByModel($query, $model)
    {
        return $query->where('model', 'LIKE', '%' . $model . '%');
    }
}