<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /**
     * Relationship: Has Many Users
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
