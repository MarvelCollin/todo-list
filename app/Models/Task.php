<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function user(){
        // Tasks merupakan kepunyaan si user
        return $this->belongsTo(User::class);
    }
}
