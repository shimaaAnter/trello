<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\the_list;

class boarde extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'photo',
        'workspace_id',];


        // public function workspace()
        // {return $this->belongsTo(workspace::class);
        // }

        public function lists()
        {return $this->hasMany(the_list::class);
        }
}
