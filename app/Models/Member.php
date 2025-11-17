<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'foto','name','position','sector','business','product','domicile','phone'
    ];
}