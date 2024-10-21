<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workspace_member extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
'workspace_id'
    ];
}
