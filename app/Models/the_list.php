<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\card;

class the_list extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'boarde_id',];
        public function cards()
        {return $this->belongsTo(card::class);
        }
}
