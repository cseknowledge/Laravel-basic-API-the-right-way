<?php

namespace App\Models;

class Category extends BaseModel
{
    protected $table = 'categories';

    protected $fillable = ['uuid', 'name', 'slug', 'description', 'is_active'];
}
