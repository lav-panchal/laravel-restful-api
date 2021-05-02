<?php

namespace App\Http\Controllers;
use App\Models\CountryModel;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function filedownload(){
        return response()->download(public_path('file.png'),'Demo');
    }
    public function fileupload(Request $req){
        $filename="demo.jpg";
        $path=$req->file('photo')->move(public_path("uploadfiles/"),$filename);
        $photourl=url('/'.$filename);
        return response()->json(['url'=>$photourl],200);
    }
}
