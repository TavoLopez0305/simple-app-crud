<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    public function rooms()
{
    return $this->hasMany(Room::class);
}

public function services()
{
    return $this->belongsToMany(Service::class, 'branch_services')
                ->withPivot('precio', 'duracion', 'disponible')
                ->withTimestamps();
}
}
