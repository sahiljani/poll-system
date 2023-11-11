<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpRecord extends Model {
    use HasFactory;
    protected $table = 'ip_records';

    protected $fillable = ['poll_id', 'ip_address'];


    public function poll() {
        return $this->belongsTo(Poll::class);
    }
}
