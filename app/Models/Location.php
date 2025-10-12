<?php

namespace App\Models;

class Location extends BaseModel
{
    protected $fillable = ['uuid', 'name', 'slug', 'description', 'is_active'];
}
