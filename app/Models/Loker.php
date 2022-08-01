<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    use HasFactory;
    public $fillable = ['lowongan', 'keterangan', 'nama_game', 'role', 'gambar'];
    public $timestamps = true;

    public function image()
    {
        if ($this->gambar && file_exists(public_path('images/loker/' . $this->gambar))) {
            return asset('images/loker/' . $this->gambar);
        } else {
            return asset('images/no_image.jpg');
        }
    }
    public function deleteImage()
    {
        if ($this->gambar && file_exists(public_path('images/loker/' . $this->gambar))) {
            return unlink(public_path('images/loker/' . $this->gambar));
        }
    }
}
