<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Questionair extends Model
{
    protected $table = 'questionairs';

    public function questions()
    {
        return $this->hasMany(Questions::class,'questionair_id');
    }
    public function scopeUser()
    {
        return $this->where('created_by',Auth::user()->id);
    }
}
