<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporting extends Model
{
    use HasFactory;

    protected $table = "reporting";

    protected $fillable = [
        'topic_id',
        'response_id',
        'user_id',
        'type',
        'title',
        'description',
    ];
}
