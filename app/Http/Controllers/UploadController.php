<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function __construct()
    {
        \Cloudinary::config(array(
            "cloud_name" => "fargan109",
            "api_key" => "151858227954724",
            "api_secret" => "_n_rCJyPhelObT5mKrvDqtjrCbI"
        ));
    }

    public function index()
    {
        return view('upload');
    }

    public function create(Request $request)
    {
        $file = $request->file('myfile');
        $fileName = $file->getClientOriginalName();
        $fileEkstension = $file->getClientOriginalExtension();
        $fileRealPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $fileMime = $file->getMimeType();
        $tujuan_upload = 'uploads';
        $file->move($tujuan_upload,$fileName);
        \Cloudinary\Uploader::upload($tujuan_upload."/".$fileName);
        Cloudinary::Uploader.upload($tujuan_upload."/".$fileName, 
            :public_id => "brown_sheep",
            :eager => { :quality => "jpegmini", :crop => "fill", 
            :width => 200, :height => 150 });
        return redirect('upload');
    }

    public function cloud()
    {

    }
}
