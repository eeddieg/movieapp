<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Movie extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function find($id)
    {
        return DB::select('select * from movies where movie_id = ?', [$id]);

    }
}
