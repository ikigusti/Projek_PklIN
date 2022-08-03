<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;
    public $fillable = ['nama_game', 'keterangan', 'pengertian', 'gambar'];
    public $timestamps = true;

    public function image()
    {
        if ($this->gambar && file_exists(public_path('images/informasi/' . $this->gambar))) {
            return asset('images/informasi/' . $this->gambar);
        } else {
            return asset('images/no_image.jpg');
        }
    }
    public function deleteImage()
    {
        if ($this->gambar && file_exists(public_path('images/informasi/' . $this->gambar))) {
            return unlink(public_path('images/informasi/' . $this->gambar));
        }
    }
}
