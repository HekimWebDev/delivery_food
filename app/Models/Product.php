<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $int)
 */
class Product extends Model
{
    use HasFactory;

    protected $table='products';


    protected $fillable = [
        'name', 'category_id', 'price', 'amount', 'description'
    ];

    protected $guarded = [];

    public function getUnitPriceAttribute($value)
    {
        return number_format($value, 2);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
