<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Artikel extends Model
{
    use HasFactory;
    protected $table = "artikel";

    protected $fillable = [
        "judul_artikel",
        "slug",
        "isi_artikel",
        "thumbnail_artikel",
        "tag_artikel",
        "kategori_artikel"
    ];

    public function getTitleAttribute(){
        return Str::limit($this->judul_artikel, 30, "...");
    }

    public function getDescAttribute(){
        return Str::limit($this->isi_artikel, 70, "...");
    }
}
