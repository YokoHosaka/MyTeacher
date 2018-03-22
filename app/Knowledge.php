<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    protected $table = 'knowledges'; 
    //英文法上Knowledgeは複数形をつくらないので、knowledesはLaravelでknowledgeと認識されるため、tableで扱うのはknowledgeではなくknowledgesであると指定する必要がある
    protected $fillable = ['field', 'catchcopy','description', 'user_id']; 
    
    public function user()
    {
        return $this->belongsTo(User::class);    
    }
}
