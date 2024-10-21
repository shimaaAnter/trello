<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\the_list;


class card extends Model
{
    use HasFactory;
    protected $fillable = [

    'text',
'description',
'description_photo',
'photo',
'color',
'position',
'start_time',
'end_time',
'completed',
'user_id',
'lest_id',
];

}
