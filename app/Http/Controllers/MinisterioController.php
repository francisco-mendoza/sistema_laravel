<?php

namespace crm\Http\Controllers;

use Illuminate\Http\Request;

use crm\Http\Requests;
use crm\Http\Controllers\Controller;

use crm\Ministerio;

class MinisterioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function listing()
    {
        $ministerios = Ministerio::all();

        return response()->json(
                $ministerios->toArray()
            );
    }

    public function index()
    {
        return view('ministerio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ministerio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            \crm\Ministerio::create($request->all());
            return response()->json([
                    "mensaje"=>"creado"
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ministerio = Ministerio::find($id);

        return response()->json(
                $ministerio->toArray()
            );
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
         $ministerio = Ministerio::find($id);
         $ministerio->fill($request->all());
         $ministerio->save();

         return response()->json([
            "mensaje"=> "listo"
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
