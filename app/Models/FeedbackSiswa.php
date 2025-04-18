<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackSiswa extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'pengajar_id', 'masukan'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Siswa adalah user
    }

    public function pengajar()
    {
        return $this->belongsTo(Pengajar::class, 'pengajar_id'); // Pengajar juga dari user
    }
}
