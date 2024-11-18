<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\Factories\HasFactory;



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Form extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function fields()
    {
        return $this->hasMany(Field::class);
    }
}
