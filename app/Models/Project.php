<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        "name", "type_id", "short_description", "description", "image", "slug"
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }
}
