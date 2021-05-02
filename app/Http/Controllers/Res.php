<?php

namespace App\Http\Controllers;
use App\Models\CountryModel;
use Validator;
use Illuminate\Http\Request;

class Res extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=CountryModel::paginate(10);
        return response()->json($data,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name'=>'required|min:3',
            'iso'=>'required|min:2|max:2',
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $con=CountryModel::create($request->all());
        return response()->json($con,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $con=CountryModel::find($id);
        if(is_null($con)){
            return response()->json(["message"=>"Record not found !"],404);
        }
        return response()->json($con,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $con=CountryModel::find($id);
        if(is_null($con)){
            return response()->json(["message"=>"Record not found !"],404);
        }
        $con->update($request->all());
        return response()->json($con,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $con = CountryModel::find($id);
        if(is_null($con)){
            return response()->json(["message"=>"Record not found !"],404);
        }
          $con->delete();
        return response()->json($con,204);
    }
}
