<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;


    protected $fillable = 
        [
            'id', 
            "file",
            "fileduc",
            "filemine",
            "fileimpot",
            'type', 
            'puissances', 
            'essence', 
            'numerocartegrise', 
            'douane', 
            'duc', 
            'mine', 
            'impot', 
            'fk_marque_id', 
            'fk_modele_id', 
            'fk_user_id', 
            'fk_client_id', 
            'fk_up_id', 
        ];


    public function marque()
    {
        return $this->belongsTo(Marque::class, 'fk_marque_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'fk_client_id', 'id');
    }

    public function modele()
    {
        return $this->belongsTo(Modele::class, 'fk_modele_id', 'id');
    }

    public function userins()
    {
        return $this->belongsTo(User::class, 'fk_user_id', 'id');
    }

    public function userup()
    {
        return $this->belongsTo(User::class, 'fk_user_id', 'id');
    }
}
