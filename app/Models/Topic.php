<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory;
    
    protected $table = "topic";

    protected $fillable = [
        'user_id',
        'type',
        'tag',
        'title',
        'description',
        'image',
        'setting',
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
