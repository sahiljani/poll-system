<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $fillable = [
        'question',
        'image_url',
        'unique_identifier',
        'Is_IP_validate',
        'Is_browser_validate',
        'share_message',
    ];
    public function pollOptions()
    {
        return $this->hasMany(PollOption::class);

    }
    public function options()
    {
        return $this->hasMany(PollOption::class, 'poll_id', 'id');
    }
}
