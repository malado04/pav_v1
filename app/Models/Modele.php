<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;
    public $table = "modeles";
    protected $fillable = 
    [
        "libellemodele",
        "fk_user_id"
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user_id', 'id');
    }
}
