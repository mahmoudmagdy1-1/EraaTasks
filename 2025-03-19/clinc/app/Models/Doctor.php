<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'major_id',
    ];
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
