<?php

namespace App\Models\Househelp\Standard;

use App\Models\Househelp\Househelp;
use Illuminate\Database\Eloquent\Model;

class Idstatus extends Model
{
    protected $fillable = [
        'name',
        'id_number',
        'ref_number',
        'househelp_id',
    ];

    public function househelps()
    {
        return $this->hasMany(Househelp::class);
    }
}
