<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'color_id');
    }
}
