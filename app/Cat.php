<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = ['name', 'pic_id', 'uuid'];
    protected $appends = ['pic'];

    public function getPicAttribute()
    {
        return sprintf('images/%s.jpg', $this->attributes['pic_id']);
    }
}
