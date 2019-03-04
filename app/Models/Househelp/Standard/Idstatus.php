<?php

namespace App\Models\Househelp\Standard;

use App\Models\Househelp\Househelp;
use Illuminate\Database\Eloquent\Model;

class Idstatus extends Model
{
    protected $fillable = [
        'status',
        'id_number',
        'ref_number',
        'id_photo_front',
        'id_photo_back',
        'househelp_id',
    ];

    public function househelps()
    {
        return $this->hasMany(Househelp::class);
    }
}
