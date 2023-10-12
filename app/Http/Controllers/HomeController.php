<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
 public function home(){
    $artikel = Artikel::orderBy('created_at', 'desc')->limit(6)->get();
    $artikelTrend = Artikel::orderBy("id", "asc")->limit(10)->get();

    return view("home", ["artikel" => $artikel, "trending" => $artikelTrend]);
 }

 public function getArtikel($slug) {
    $artikel = Artikel::where('slug', $slug)->first();
    $artikelTrend = Artikel::orderBy("id", "asc")->limit(10)->get();
    $newArticle = Artikel::orderBy('created_at', 'desc')->limit(2)->get();

    return view("artikel", [
        "artikel" => $artikel,
        "trending" => $artikelTrend,
        "newArticles" => $newArticle
    ]);
 }
}
