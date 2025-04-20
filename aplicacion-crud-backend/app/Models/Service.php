<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function branches()
{
    return $this->belongsToMany(Branch::class, 'branch_services')
                ->withPivot('precio', 'duracion', 'disponible')
                ->withTimestamps();
}
}
