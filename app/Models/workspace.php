<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\boarde;
use App\Models\User;

class workspace extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    'id',];
    public function users()
    {
        return $this->belongsToMany(User::class,'workspace_members','workspace_id','user_id');
    }
    public function boardes()
        {return $this->hasMany(boarde::class);
        }
}
