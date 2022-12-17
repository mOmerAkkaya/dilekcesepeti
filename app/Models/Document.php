<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;

class Document extends Model
{
    protected $guarded = [];
    use SoftDeletes;
    use HasFactory;

    public function get_doc_type(){
        return $this->hasOne('\App\Models\Values','id', 'doc_type');
    }
    public function get_sub_doc_type()
    {
        return $this->hasOne('\App\Models\Values', 'id', 'sub_doc_type');
    }
    public function get_type()
    {
        return $this->hasOne('\App\Models\Values', 'id', 'type');
    }
    public function get_cat()
    {
        return $this->hasOne('\App\Models\Values', 'id', 'cat');
    }
    public function get_sub_cat()
    {
        return $this->hasOne('\App\Models\Values', 'id', 'sub_cat');
    }

    public function comments()
    {
        return $this->hasMany('\App\Models\Comments', 'document_id', 'id');
    }
   
}
