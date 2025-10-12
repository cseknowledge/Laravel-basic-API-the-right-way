<?php

namespace App\Models;

use App\Traits\FindByIdentifier;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class BaseModel extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasUuid, FindByIdentifier, HasFactory, SoftDeletes;
}

