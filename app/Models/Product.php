<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'type_id', 'weight', 'status', 'description'
    ];


    public function typeCow()
    {
        return $this->hasOne(Type::class, 'id', 'type_id');
    }

    public function photo()
    {
        return $this->hasMany(ProductPhoto::class, 'product_id');
    }
}
