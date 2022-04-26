<?php

namespace App\Models;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vote_Topic extends Model
{

    protected $table = "vote_topic";

    use HasFactory;
    protected $fillable = [
        'user_id',
        'topic_id',
    ];
    public function voteTopic()
    {
        return $this->belongsTo(Topic::class);
    }
}
