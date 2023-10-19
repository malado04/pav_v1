<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Declaration extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        "id",
        "file"
        "fk_veh_id"
        "fk_user_id"
        "fk_up_id"
    ];
   
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'fk_veh_id', 'id');
    } 

    public function userins()
    {
        return $this->belongsTo(User::class, 'fk_user_id', 'id');
    } 

    public function userup()
    {
        return $this->belongsTo(User::class, 'fk_up_id', 'id');
    } 

}
