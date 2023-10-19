<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        "libellemarque",
        "fk_user_id"
    ];
   
    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user_id', 'id');
    }
   
    // public function Lot (){ 
    //     return $this ->hasMany(Lot::class);
    // }

}
