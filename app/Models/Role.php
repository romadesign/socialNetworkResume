<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    //Relation table User.php / Model
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
