<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = array('name', 'parent_id');

    public $timestamps = false;
    
    public function children()
    {
        return $this->hasMany(Field::class, 'parent_id', 'id');
    }
    
    public function parent()
    {
        return $this->belongTo(Field::class, 'parent_id');
    }
    
    public function users()
    {
        return $this->belongToMany(User::class, 'knowledges', 'field_id', 'user_id');
    }
}
