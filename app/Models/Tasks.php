<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tasks extends Model
{

    use HasFactory,SoftDeletes;
    protected $table='tasks';
    protected $fillable = ['checklist_id', 'name', 'description', 'position'];

}
