<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Activity;

class Method extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = ['name', 'is_default', 'description'];

    public function activity(){
        return $this->hasMany(Activity::class, 'activity_id', 'id');
    }

}
