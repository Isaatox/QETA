<?php

namespace App\Models;

use App\Models\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vote_Response extends Model
{

    protected $table = "vote_response";
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'topic_id',
        'response_id',
    ];
    public function voteResponse()
    {
        return $this->belongsTo(Response::class);
    }
}
