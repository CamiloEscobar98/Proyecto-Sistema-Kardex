<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KardexMovement extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'kardex_movement_type_id',
        'affected_units',
        'stock_before',
        'stock_after',
        'movement_at'
    ];

    /**
     * Get the kardex movement type
     *
     * @param  string  $value
     * @return string
     */
    public function getKardexMovementTypeAttribute($value)
    {
        $type = null;
        switch ($value) {
            case '1':
                $type = __('models/kardex_movement.enum_data.entry');
                break;
            case '2':
                $type = __('models/kardex_movement.enum_data.output');
                break;
        }
        return $type;
    }

    /**
     * Get Product
     * 
     * @return BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
