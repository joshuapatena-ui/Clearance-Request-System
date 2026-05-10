<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'slug'];

    public function clearanceRequests()
    {
        return $this->hasMany(ClearanceRequest::class);
    }
}
