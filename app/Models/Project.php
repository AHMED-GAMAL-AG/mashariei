<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id' , 'status'];

    public function user()
    {
        // Project belongsTo a User
        return $this->belongsTo(User::class);
    }
}
