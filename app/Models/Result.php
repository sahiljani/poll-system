<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['vote_count'];

    public function pollOption()
    {
        return $this->belongsTo(PollOption::class);
    }
}
