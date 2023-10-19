<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = 
        [
            'id', 
            'categorie', 
            'chapitre', 
            'codeserv', 
            'libelleservice', 
            'fk_sous_service_id', 
            'fk_user_id', 
            // 'fk_mairie_id', 
        ];

    public function service_mere()
    {
        return $this->belongsTo(Service::class, 'fk_sous_service_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user_id', 'id');
    }

    // public function mairie()
    // {
    //     return $this->belongsTo(Mairie::class, 'fk_mairie_id', 'id');
    // }
}
