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
        // \Cloudinary\Uploader::upload($tujuan_upload."/".$fileName, 
        //     array("public_id" => $fileName));
        
            
        $image = cl_image_tag($fileName.".jpg", 
            array(
                "sign_url" => true, 
                "height"=>150, 
                "quality"=>"jpegmini", 
                "width"=>200, 
                "crop"=>"fill"));

        $doc = new \DOMDocument();
        $doc->loadHTML($image);
        $xpath = new \DOMXPath($doc);
        $source = $xpath->evaluate("string(//img/@src)");
        $file_name = basename($source); 
        if(file_put_contents("cloudinary/".$file_name,file_get_contents($source))) { 
            return redirect()->back()->with('success', 'Konvert Berhasil');
        } 
        else { 
            return redirect()->back()->with('failed', 'Konvert Gagal');
        } 
    }
}
