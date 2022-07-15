<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function library()
    {
        return $this->hasMany(Library::class);
    }

    public function pet()
    {
        return $this->hasMany(Pet::class);
    }
}
