<?php

namespace crm\Http\Controllers;

use Illuminate\Http\Request;

use crm\Http\Requests\ClienteCreateRequest;
use crm\Http\Requests\ClienteUpdateRequest;

use crm\Http\Requests;
use crm\Http\Controllers\Controller;

use Redirect;

use crm\Cliente;
use crm\Ministerio;

use crm\Actividad;
use crm\Contacto;
use crm\EstadoActividad;
use crm\ResultadoActividad;
use Session;
use DB;

use Response;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function index()
    {
        /*if ($request->ajax()) {
            $clientes = Cliente::Clientes();
            return response()->json($clientes);
        }*/


        $clientes = Cliente::Clientes();
        return view('cliente.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ministerios  = \DB::table('ministerios')->lists('nombre','id');
        $regions      = \DB::table('regions')->lists('region_nombre','id');
        $tipoClientes = \DB::table('tipo_clientes')->lists('nombre','id');

        return view('cliente.create')->with('tipoClientes',$tipoClientes)
        ->with('ministerios',$ministerios)->with('regions',$regions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteCreateRequest $request)
    {
      
          Cliente::create([
                  'idMinisterio'       => $request['idMinisterio'],
                  'nombre'             => $request['nombre'],
                  'rut'                => $request['rut'],
                  'codigo'             => $request['codigo'],
                  'sigla'              => $request['sigla'],
                  'idRegion'           => $request['idRegion'],
                  'direccion'          => $request['direccion'],
                  'numeroTrabajadores' => $request['numeroTrabajadores'],
                  'email'              => $request['email'],
                  'direccionWeb'       => $request['direccionWeb'],
                  'fono'               => $request['fono'],
                  'fonoContacto'       => $request['fonoContacto'],
                  'fonoJefeDirecto'    => $request['fonoJefeDirecto'],
                  'fonoSecretaria'     => $request['fonoSecretaria'],
                  'skype'              => $request['skype'],
                  'idTipoCliente'      => $request['idTipoCliente'],
                  'logo'               => $request['logo'],
                  'presupuesto'        => $request['presupuesto'],
              ]);

          return redirect('/cliente')->with('message','Cliente Creado Correctamente');
        
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
        $cliente = Cliente::find($id);
        $ministerios  = \DB::table('ministerios')->lists('nombre','id');
        $regions      = \DB::table('regions')->lists('region_nombre','id');
        $tipoClientes = \DB::table('tipo_clientes')->lists('nombre','id');

        return view('cliente.editar',compact('cliente','ministerios','regions','tipoClientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, ClienteUpdateRequest $request)
    {
        $cliente = Cliente::find($id);
        $cliente->fill($request->all());
        $cliente->save();

        Session::flash('message','Cliente Modificado Correctamente');
        return Redirect::to('/cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::destroy($id);
        Session::flash('message','Cliente Eliminado Correctamente');
        return Redirect::to('/cliente');
    }


    private static $idClienteActual;

    public function detalle()
    {
        session_start();

        $id = $_GET['cliente'];
        //$idContactoActual = $_GET['contacto'];

        $idClienteActual= $_GET['cliente'];

        $_SESSION["clienteActual"]=$idClienteActual;

        $consultaJerarquia = DB::table('actividads')->max('id');
        $jer = $consultaJerarquia+1;

        //$idClienteActual = $this->idClient;
        
        
        $actividads = Actividad::Actividades($id);

        $contactos = DB::table('contactos')
            ->join('clientes','clientes.id','=','contactos.idCliente')
            ->join('cargo_contactos','cargo_contactos.id','=','contactos.idCargo')
            ->join('area_contactos','area_contactos.id','=','contactos.idArea')
            ->join('regions','regions.id','=','contactos.idRegion')
            ->join('estado_contactos','estado_contactos.id','=','contactos.idEstado')
            ->where('clientes.id','=',$id)
            ->select('contactos.*','clientes.nombre as cliente','cargo_contactos.nombre as cargo'
                        ,'area_contactos.nombre as area','regions.region_nombre as region','estado_contactos.nombre as estado')
            ->get();

        //*****  ACTIVIDADES ****************************** ///
        $llamadas = DB::table('actividads')
            ->join('clientes','clientes.id','=','actividads.idCliente')
            ->join('contactos','contactos.id','=','actividads.idContacto')
            ->join('tipo_actividads','actividads.idTipoActividad','=','tipo_actividads.id')
            ->whereNull('actividads.actPadre')
            ->where('clientes.id', '=', $id)
            ->where('actividads.idTipoActividad', '=', '2')
            
            ->select('actividads.comentario as comentario','clientes.nombre as cliente','contactos.nombre as contacto','tipo_actividads.nombre as tipo','tipo_actividads.icono as icono')
            ->orderBy('actividads.id', 'desc')
            ->get();

        $reuniones = DB::table('actividads')
            ->join('clientes','clientes.id','=','actividads.idCliente')
            ->join('contactos','contactos.id','=','actividads.idContacto')
            ->join('tipo_actividads','actividads.idTipoActividad','=','tipo_actividads.id')
            ->where('clientes.id', '=', $id)
            ->where('actividads.idTipoActividad', '=', '1')
            ->whereNull('actividads.actPadre')
            ->select('actividads.comentario as comentario','clientes.nombre as cliente','contactos.nombre as contacto','tipo_actividads.nombre as tipo','tipo_actividads.icono as icono')
            ->orderBy('actividads.id', 'desc')
            ->get();

        $correos = DB::table('actividads')
            ->join('clientes','clientes.id','=','actividads.idCliente')
            ->join('contactos','contactos.id','=','actividads.idContacto')
            ->join('tipo_actividads','actividads.idTipoActividad','=','tipo_actividads.id')
            ->where('clientes.id', '=', $id)
            ->where('actividads.idTipoActividad', '=', '3')
            ->whereNull('actividads.actPadre')
            ->select('actividads.comentario as comentario','clientes.nombre as cliente','contactos.nombre as contacto','tipo_actividads.nombre as tipo','tipo_actividads.icono as icono')
            ->orderBy('actividads.id', 'desc')
            ->get();

        $cotizaciones = DB::table('actividads')
            ->join('clientes','clientes.id','=','actividads.idCliente')
            ->join('contactos','contactos.id','=','actividads.idContacto')
            ->join('tipo_actividads','actividads.idTipoActividad','=','tipo_actividads.id')
            ->where('clientes.id', '=', $id)
            ->where('actividads.idTipoActividad', '=', '4')
            ->whereNull('actividads.actPadre')
            ->select('actividads.comentario as comentario','clientes.nombre as cliente','contactos.nombre as contacto','tipo_actividads.nombre as tipo','tipo_actividads.icono as icono')
            ->orderBy('actividads.id', 'desc')
            ->get(); 

        $informacionClientes = DB::table('clientes')
            ->join('ministerios','ministerios.id','=','clientes.idMinisterio')
            ->join('regions','regions.id','=','clientes.idRegion')
            ->join('tipo_clientes','tipo_clientes.id','=','clientes.idTipoCliente')
            
            ->where('clientes.id', '=', $id)
            ->select('clientes.*', 'ministerios.nombre as nombreMinisterio', 'regions.region_nombre as region','tipo_clientes.nombre as tipoCliente')
            ->orderBy('id', 'asc')
            ->get();   



        $selClientes        = \DB::table('clientes')->lists('nombre','id');
        $selContactos       = \DB::table('contactos')->lists('nombre','id');
        $cargos             = \DB::table('cargo_contactos')->lists('nombre','id');
        $areas              = \DB::table('area_contactos')->lists('nombre','id');
        $regions            = \DB::table('regions')->lists('region_nombre','id');
        $estados            = \DB::table('estado_contactos')->lists('nombre','id');
       
        $selResultadoActividades = \DB::table('resultado_actividads')->lists('nombre','id'); 
        $selUsuario              = \DB::table('usuarios')->lists('nombreUsuario','id');     


        $selTipoActividades   = \DB::table('tipo_actividads')->lists('nombre','id');    
        $selEstadoActividades = \DB::table('estado_actividads')->lists('nombre','id');  



        return view('cliente.detalle',compact('actividads','contactos','llamadas','reuniones','correos','cotizaciones','jer',
                                                'informacionClientes','selClientes','selContactos','selTipoActividades'
                                                ,'selEstadoActividades','selResultadoActividades','selUsuario','idClienteActual'
                                                ,'idContactoActual','cargos','areas','regions','estados'));
    }

    public function getEstados(Request $request, $id)
    {
        if($request->ajax()){
            $estados = EstadoActividad::estados($id);
            return response()->json($estados);
        }
    }

    public function getResultados(Request $request, $id)
    {
        if($request->ajax()){
            $resultados = ResultadoActividad::resultados($id);
            return response()->json($resultados);
        }
    }




    public function llamadasList()
    {

        //$idCliente = $_GET['cliente'];
       /* $llamadas = Actividad::all();*/
       //$idCliente = $idClienteActual;
       session_start();
       $idClienteActual = $_SESSION["clienteActual"];
        //$idClienteActual = 2;
      //$idCliente = $detalle->idClienteActual;


         $llamadas = DB::table('actividads')
            ->join('clientes','clientes.id','=','actividads.idCliente')
            ->join('contactos','contactos.id','=','actividads.idContacto')
            ->join('tipo_actividads','actividads.idTipoActividad','=','tipo_actividads.id')
            ->join('usuarios','usuarios.id','=','actividads.usuario')
            ->where('clientes.id', '=', $idClienteActual)
            ->where('actividads.idTipoActividad', '=', '2')
            ->whereNull('actividads.actPadre')
            ->select('usuarios.apellidoUsuario as apellidoUsuario','usuarios.nombreUsuario as nombreUsuario','actividads.fecha as fecha','actividads.comentario as comentario','actividads.id as idActividad','clientes.nombre as cliente','clientes.id as idCliente','contactos.nombre as contacto','contactos.id as idContacto','tipo_actividads.nombre as tipo','tipo_actividads.icono as icono')
            ->orderBy('actividads.id', 'desc')
            ->get();

            //$listaLlamadas = compact('llamadas');

            return Response::json($llamadas);

        /*return response()->json(
                $listaLlamadas->toArray()
            );*/
    }

    public function reunionesList()
    {

        //$idCliente = $_GET['cliente'];
       /* $llamadas = Actividad::all();*/
       //$idCliente = $idClienteActual;
       session_start();
       $idClienteActual = $_SESSION["clienteActual"];
        //$idClienteActual = 2;
      //$idCliente = $detalle->idClienteActual;


         $reuniones = DB::table('actividads')
            ->join('clientes','clientes.id','=','actividads.idCliente')
            ->join('contactos','contactos.id','=','actividads.idContacto')
            ->join('tipo_actividads','actividads.idTipoActividad','=','tipo_actividads.id')
             ->join('usuarios','usuarios.id','=','actividads.usuario')
            ->where('clientes.id', '=', $idClienteActual)
            ->where('actividads.idTipoActividad', '=', '1')
            ->whereNull('actividads.actPadre')
            ->select('usuarios.apellidoUsuario as apellidoUsuario','usuarios.nombreUsuario as nombreUsuario','actividads.fechaHora as fechaReunion','actividads.comentario as comentario','actividads.id as idActividad','clientes.nombre as cliente','clientes.id as idCliente','contactos.nombre as contacto','contactos.id as idContacto','tipo_actividads.nombre as tipo','tipo_actividads.icono as icono')
            ->orderBy('actividads.id', 'desc')
            ->get();

            //$listaLlamadas = compact('llamadas');

            return Response::json($reuniones);

        /*return response()->json(
                $listaLlamadas->toArray()
            );*/
    }

    public function emailsList()
    {

        //$idCliente = $_GET['cliente'];
       /* $llamadas = Actividad::all();*/
       //$idCliente = $idClienteActual;
       session_start();
       $idClienteActual = $_SESSION["clienteActual"];
        //$idClienteActual = 2;
      //$idCliente = $detalle->idClienteActual;


         $emails = DB::table('actividads')
            ->join('clientes','clientes.id','=','actividads.idCliente')
            ->join('contactos','contactos.id','=','actividads.idContacto')
            ->join('tipo_actividads','actividads.idTipoActividad','=','tipo_actividads.id')
             ->join('usuarios','usuarios.id','=','actividads.usuario')
            ->where('clientes.id', '=', $idClienteActual)
            ->where('actividads.idTipoActividad', '=', '3')
            ->whereNull('actividads.actPadre')
            ->select('usuarios.apellidoUsuario as apellidoUsuario','usuarios.nombreUsuario as nombreUsuario','actividads.fecha as fecha','actividads.comentario as comentario','actividads.id as idActividad','clientes.nombre as cliente','clientes.id as idCliente','contactos.nombre as contacto','contactos.id as idContacto','tipo_actividads.nombre as tipo','tipo_actividads.icono as icono')
            ->orderBy('actividads.id', 'desc')
            ->get();

            //$listaLlamadas = compact('llamadas');

            return Response::json($emails);

     
    }

    public function cotizacionesList()
    {

        //$idCliente = $_GET['cliente'];
       /* $llamadas = Actividad::all();*/
       //$idCliente = $idClienteActual;
       session_start();
       $idClienteActual = $_SESSION["clienteActual"];
        //$idClienteActual = 2;
      //$idCliente = $detalle->idClienteActual;


         $cotizaciones = DB::table('actividads')
            ->join('clientes','clientes.id','=','actividads.idCliente')
            ->join('contactos','contactos.id','=','actividads.idContacto')
            ->join('tipo_actividads','actividads.idTipoActividad','=','tipo_actividads.id')
             ->join('usuarios','usuarios.id','=','actividads.usuario')
            ->where('clientes.id', '=', $idClienteActual)
            ->where('actividads.idTipoActividad', '=', '4')
            ->whereNull('actividads.actPadre')
            ->select('actividads.presupuesto as presupuesto','usuarios.apellidoUsuario as apellidoUsuario','usuarios.nombreUsuario as nombreUsuario','actividads.fecha as fecha','actividads.comentario as comentario','actividads.id as idActividad','clientes.nombre as cliente','clientes.id as idCliente','contactos.nombre as contacto','contactos.id as idContacto','tipo_actividads.nombre as tipo','tipo_actividads.icono as icono')
            ->orderBy('actividads.id', 'desc')
            ->get();

            //$listaLlamadas = compact('llamadas');

            return Response::json($cotizaciones);

     
    }


    
}
