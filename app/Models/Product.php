<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_category_id', 'name', 'description', 'price', 'stock'];

    

    /**
     * Scope a query to only include name.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param string $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByName($query, $value)
    {
        return $query->where("{$this->getTable()}.name", "like", "%$value%");
    }
}
