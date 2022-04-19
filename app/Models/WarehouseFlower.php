<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseFlower extends Model
{
    use HasFactory;

    protected $table = 'warehouse_flowers';

    public function flower()
    {
        return $this->belongsTo(Flower::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
