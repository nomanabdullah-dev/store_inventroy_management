<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['size'];

    protected $appends = ['text'];

    public function getTextAttribute()
    {
        return $this->name;
    }
}
