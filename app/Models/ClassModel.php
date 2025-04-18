<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClassModel;


class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'ngajidek'; // Sesuaikan dengan nama tabel di database
}

