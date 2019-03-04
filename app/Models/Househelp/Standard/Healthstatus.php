<?php

namespace App\Models\Househelp\Standard;

use App\Models\Househelp\Househelp;
use Illuminate\Database\Eloquent\Model;

class Healthstatus extends Model
{
    protected $fillable = [
        'househelp_id',
        'status',
        'specify',
    ];

    public function househelp()
    {
        return $this->belongsTo(Househelp::class);
    }
}
