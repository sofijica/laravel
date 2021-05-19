<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departman extends Model
{
    use HasFactory;

    protected $fillable=['naziv'];

    public function radnici(){
        return $this->hasMany(Radnik::class);
    }
}
