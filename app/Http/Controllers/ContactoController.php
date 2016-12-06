<?php

namespace crm\Http\Controllers;

use Illuminate\Http\Request;

use crm\Http\Requests;
use crm\Http\Requests\ContactoCreateRequest;
use crm\Http\Controllers\Controller;
use DB;
use crm\Contacto;
use Session;
use Redirect;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $contactos = DB::table('contactos')
            ->join('clientes','clientes.id','=','contactos.idCliente')
            ->join('cargo_contactos','cargo_contactos.id','=','contactos.idCargo')
            ->join('area_contactos','area_contactos.id','=','contactos.idArea')
            ->join('regions','regions.id','=','contactos.idRegion')
            ->join('estado_contactos','estado_contactos.id','=','contactos.idEstado')
            ->select('contactos.*','clientes.nombre as cliente','cargo_contactos.nombre as cargo'
                        ,'area_contactos.nombre as area','regions.region_nombre as region','estado_contactos.nombre as estado')
            ->get();

        return view('contacto.index',compact('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes  = \DB::table('clientes')->lists('nombre','id');
        $cargos    = \DB::table('cargo_contactos')->lists('nombre','id');
        $areas     = \DB::table('area_contactos')->lists('nombre','id');
        $regions   = \DB::table('regions')->lists('region_nombre','id');
        $estados   = \DB::table('estado_contactos')->lists('nombre','id');

        return view('contacto.create')->with('clientes',$clientes)->with('cargos',$cargos)->with('areas',$areas)
                                        ->with('regions',$regions)->with('estados',$estados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactoCreateRequest $request)
    {
         if($request->ajax())
        {
            Contacto::create([
                'nombre'           =>$request['nombre'],
                'apellido'         =>$request['apellido'],
                'idCliente'        =>$request['idCliente'],
                'idCargo'          =>$request['idCargo'],
                'email'            =>$request['email'],
                'email_secretaria' =>$request['email_secretaria'],
                'fono'             =>$request['fono'],
                'movil'            =>$request['movil'],
                'idArea'           =>$request['idArea'],
                'idRegion'         =>$request['idRegion'],
                'direccionPostal'  =>$request['direccionPostal'],
                'skype'            =>$request['skype'],
                'cumpleaños'       =>$request['cumpleaños'],
                'hobbies'          =>$request['hobbies'],
                'facebook'         =>$request['facebook'],
                'linkedin'         =>$request['linkedin'],
                'idEstado'         =>$request['idEstado'],
            ]);
            Session::flash('message','Contacto Modificado Correctamente');
            return response()->json(["mensaje"=>"creado"]);
        }
        else
        {
        
        \crm\Contacto::create([
                'nombre'           =>$request['nombre'],
                'apellido'         =>$request['apellido'],
                'idCliente'        =>$request['idCliente'],
                'idCargo'          =>$request['idCargo'],
                'email'            =>$request['email'],
                'email_secretaria' =>$request['email_secretaria'],
                'fono'             =>$request['fono'],
                'movil'            =>$request['movil'],
                'idArea'           =>$request['idArea'],
                'idRegion'         =>$request['idRegion'],
                'direccionPostal'  =>$request['direccionPostal'],
                'skype'            =>$request['skype'],
                'cumpleaños'       =>$request['cumpleaños'],
                'hobbies'          =>$request['hobbies'],
                'facebook'         =>$request['facebook'],
                'linkedin'         =>$request['linkedin'],
                'idEstado'         =>$request['idEstado'],
            ]);

            Session::flash('message','Contacto Modificado Correctamente');

        return redirect('/contacto')->with('message','Contacto Creado Correctamente');

         }
    }

    public function creaContactoDetalle(Request $request)
    {
       
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
        $contacto = Contacto::find($id);
        $clientes  = \DB::table('clientes')->lists('nombre','id');
        $cargos    = \DB::table('cargo_contactos')->lists('nombre','id');
        $areas     = \DB::table('area_contactos')->lists('nombre','id');
        $regions   = \DB::table('regions')->lists('region_nombre','id');
        $estados   = \DB::table('estado_contactos')->lists('nombre','id');

        return view('contacto.editar',compact('contacto','clientes','cargos','areas','regions','estados'));
    }

    /**
     * Modificar Contacto
     */
    public function update(Request $request, $id)
    {
        $contacto = Contacto::find($id);
        $contacto->fill($request->all());
        $contacto->save();

        Session::flash('message','Contacto Modificado Correctamente');
        return Redirect::to('/contacto');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contacto::destroy($id);
        Session::flash('message','Contacto Eliminado Correctamente');
        return Redirect::to('/contacto');
    }

    public function detalle()
    {
        
    }
}
