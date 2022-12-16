<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Document;

class Contact extends Model
{
    protected $guarded = [];
    use HasFactory;
    use SoftDeletes;

    public function getUser(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function getDoc()
    {
        return $this->hasOne(Document::class, 'id', 'document_id');
    }
}
