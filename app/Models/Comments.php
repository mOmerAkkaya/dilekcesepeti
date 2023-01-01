<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->hasMany('\App\Models\User', 'id', 'user_id');
    }

    public function document()
    {
        return $this->hasMany('\App\Models\Document', 'id', 'document_id');
    }
}
