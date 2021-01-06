<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    public $fillable = ['organization_name', 'name', 'thumbnail', 'title', 'location', 'time', 'event_file'];
}
