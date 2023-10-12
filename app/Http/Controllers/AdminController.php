<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Artikel;
use App\Service\ImageService;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view("admin.dashboard");
    }

    public function store(StoreArticleRequest $request){
        try{
            // upload image
            $uploadThumbnail = ImageService::upload($request->file("thumbnail_artikel"), "thumbnail", "thumbnail_");

            // create slug
            $rand = fake()->randomNumber();
            $slug = Str::of($request->judul_artikel . ' ' . $rand)->slug();

            $data = [
                "judul_artikel" => $request->judul_artikel,
                "slug" => $slug,
                "isi_artikel" => $request->isi_artikel,
                "thumbnail_artikel" => $uploadThumbnail['filename'],
                "tag_artikel" => $request->tag_artikel,
                "kategori_artikel" => $request->kategori_artikel,
            ];

            Artikel::create($data);

            return response()->json([
                "message" => "Artikel Berhasil Dibuat",
                "success" => true,
            ], 201);
        }
        catch(Exception $e){
            Log::error($e->getMessage(), $e->getTrace());

            return response()->json([
                "success" => false,
                "message" => $e->getMessage()
            ], 500);
        }
    }

    public function getDataTableData(){
        $model = Artikel::select(['id', 'judul_artikel', 'tag_artikel', 'kategori_artikel']);

        return DataTables::eloquent($model)
           ->make();
    }

    public function destroy(Request $request){
        try{
            $artikel = Artikel::find($request->input('id'));

            ImageService::delete(join("/", ["thumbnail", $artikel->thumbnail_artikel]));

            $artikel->delete();

            return response()->json([
                "message" => "Artikel Berhasil dihapus",
                "success" => true,
            ], 200);
        }
        catch(Exception $e){
            Log::error($e->getMessage(), $e->getTrace());

            return response()->json([
                "success" => false,
                "message" => $e->getMessage()
            ], 500);
        }
    }

    public function show(Request $request){
        $id = $request->input("id");

        $artikel = Artikel::find($id);

        if(!$artikel){
            return response()->json([
                "message" => "Artikel tidak ditemukan",
                "success" => false,
            ], 404);
        }

        return response()->json([
            "success" => true,
            "data" => $artikel
        ], 200);
    }

    public function update(Request $request){
        try{
            $artikel = Artikel::find($request->_id);

            if(!$artikel){
                return response()->json([
                    "message" => "Artikel Tidak ditemukan",
                    "sucess" => false,
                ], 404);
            }

            // create slug
            $rand = fake()->randomNumber();
            $slug = Str::of($request->judul_artikel . ' ' . $rand)->slug();

            $artikel->judul_artikel = $request->judul_artikel;
            $artikel->slug = $slug;
            $artikel->isi_artikel = $request->isi_artikel;
            $artikel->tag_artikel = $request->tag_artikel;
            $artikel->kategori_artikel = $request->kategori_artikel;

            if($request->hasFile('thumbnail_artikel')){
                // upload image
                $uploadThumbnail = ImageService::upload($request->file("thumbnail_artikel"), "thumbnail", "thumbnail_");

                if($artikel->thumbnail_artikel){
                    ImageService::delete((join("/", ["thumbnail", $artikel->thumbnail_artikel])));
                }

                $artikel->thumbnail_artikel = $uploadThumbnail['filename'];
            }

            $artikel->save();


            return response()->json([
                "message" => "Artikel berhasil diubah",
                "success" => true,
            ], 200);
        }
        catch(Exception $e){
            Log::error($e->getMessage(), $e->getTrace());

            return response()->json([
                "success" => false,
                "message" => $e->getMessage()
            ], 500);
        }
    }
}
