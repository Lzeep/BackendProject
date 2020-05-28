<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function financial()
    {
        return $this->hasOne(Financial::class);
    }
}
