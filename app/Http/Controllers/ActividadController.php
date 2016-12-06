<?php

namespace crm\Http\Controllers;

use Illuminate\Http\Request;

use crm\Http\Requests\ActividadCreateRequest;

use Session;

use crm\Actividad;
use crm\EstadoActividad;
use crm\ResultadoActividad;

use crm\Http\Requests;
use crm\Http\Controllers\Controller;
use DB;

use Response;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$actividads = Actividad::All();
        $selClientes              = \DB::table('clientes')->lists('nombre','id');
        $selContactos             = \DB::table('contactos')->lists('nombre','id');
        $selTipoActividades       = \DB::table('tipo_actividads')->lists('nombre','id');    
        $selEstadoActividades     = \DB::table('estado_actividads')->lists('nombre','id');  
        $selResultadoActividades  = \DB::table('resultado_actividads')->lists('nombre','id'); 
        $selUsuario               = \DB::table('usuarios')->lists('nombreUsuario','id');

        $consultaJerarquia = DB::table('actividads')->max('id');
        $jer = $consultaJerarquia+1;


        $actividades = DB::table('actividads')
            ->join('clientes','clientes.id','=','actividads.idCliente')
            ->join('contactos','contactos.id','=','actividads.idContacto')
            ->join('tipo_actividads','actividads.idTipoActividad','=','tipo_actividads.id')
            ->join('usuarios','actividads.usuario','=','usuarios.id')
            //->where('actividads.idTipoActividad', '=', '2')
            //->whereNull('actividads.actPadre')
            ->select('actividads.id as id','actividads.comentario as comentario','clientes.nombre as cliente','clientes.id as idCliente'
                ,'contactos.nombre as contacto','contactos.id as idContacto','tipo_actividads.nombre as tipo','tipo_actividads.icono as icono'
                ,'actividads.fecha as fecha','actividads.fechaHora as fechaReunion','usuarios.nombreUsuario as nombreUsuario','usuarios.apellidoUsuario as apellidoUsuario','actividads.actPadre as padre')
            ->orderBy('actividads.jerarquia', 'asc')
            ->get();

        return view('actividad.index',compact('actividades','selClientes','selContactos','selTipoActividades','selEstadoActividades','selResultadoActividades','selUsuario','jer'));
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes        = \DB::table('clientes')->lists('nombre','id');
        $contactos       = \DB::table('contactos')->lists('nombre','id');
        $tipoActividades = \DB::table('tipo_actividads')->lists('nombre','id');

        return view('actividad.create')->with('clientes',$clientes)
        ->with('contactos',$contactos)->with('tipoActividades',$tipoActividades);
    }

    /**
     *
     */
    public function store(ActividadCreateRequest $request)
    {
       /* Actividad::create([
            'idCliente'           => $request['idCliente'],
            'idContacto'          => $request['idContacto'],
            'idTipoActividad'     => $request['idTipoActividad'],
            'comentario'          => $request['comentario'],
            'actPadre'            => $request['actPadre'],
            'estado'              => $request['estado'],
            'jerarquia'           => $request['jerarquia'],
            'orden'               => $request['orden'],
            'resultado'           => $request['resultado'],
            'usuario'             => $request['usuario'],
            'fecha'               => $request['fecha'],
        ]);
        return redirect('/actividad')->with('message','store');*/

        if($request->ajax())
        {
            Actividad::create([
                'idCliente'           => $request['idCliente'],
                'idContacto'          => $request['idContacto'],
                'idTipoActividad'     => $request['idTipoActividad'],
                'comentario'          => $request['comentario'],
                'actPadre'            => $request['actPadre'],
                'estado'              => $request['estado'],
                'jerarquia'           => $request['jerarquia'],
                'orden'               => $request['orden'],
                'resultado'           => $request['resultado'],
                'usuario'             => $request['usuario'],
                'fecha'               => $request['fecha'],
                'fechaHora'           => $request['fechaHora'],
                'presupuesto'         => $request['presupuesto'],
            ]);

            Session::flash('message','Actividad ingresada correctamente');
            //return redirect('/actividad')->with('message','Actividad ingresada correctamente');



            return response()->json(["mensaje"=>"creado"]);
        }

       /* return redirect('/actividad')->with('message','store');*/
    }

    /**
     * asd
     */
    public function show($id)
    {
        //
    }

    /**
     *
     */
    public function edit($id)
    {

        $actividad = Actividad::find($id);
        $selClientes              = \DB::table('clientes')->lists('nombre','id');
        $selContactos             = \DB::table('contactos')->lists('nombre','id');
        $selTipoActividades       = \DB::table('tipo_actividads')->lists('nombre','id');

        $consultaJerarquia = DB::table('actividads')->max('id');
        $jer = $consultaJerarquia+1;

        return view('actividad.edit',compact('jer','actividad','selClientes','selContactos','selTipoActividades'));
    }

    /**
     *
     */
    public function update(Request $request, $id)
    {
        $actividad = Actividad::find($id);
        $actividad->fill($request->all());
        $actividad->save();
    }

    /**
     *
     */
    public function destroy($id)
    {
        //
    }

    public function detalle()
    {
        $idAccion = $_GET['accion'];

        /*$idClienteActual = DB::table('actividads')
            ->where('actividads.id','=',''.$idAccion.'')
            ->get();*/

        $idClienteActual = $_GET['cliente'];
        $idContactoActual = $_GET['contacto'];

        $padre = $_GET['padre'];


        //$jerarquia = DB::select('select max(id)+1 as nuevoId from actividads');

        // ------  TOODO PARA ARMAR JERARQUIA ------------------------- //

        $JerarquiaActual = DB::table('actividads')
                    ->where('actividads.id','=',$idAccion)
                    ->select('actividads.jerarquia')
                    ->get();
        //$JerarquiaActual = $sqlJerarquiaActual[0];

        //$jerarquia = DB::select('select max(id)+1 as nuevoId from actividads');
        $consultaJerarquia = DB::table('actividads')->max('id');
        $sqlJerarquia      = $consultaJerarquia+1;
        $jerarquia         = $idAccion.".".$sqlJerarquia+1;
        // -------------------------------------------------------------- //


        //------ SELECCIONA ACTIVIDADES O ACCIONES DE LOS HIJOS ( RECURSIVO) -----//

        if($padre == 'true')
        {
            //Es padre
           // 'call crmdb. sp_actividadesPadres('.$idAccion.')';  

            $actividadDetalle = DB::select("
                    SELECT a.id as idActividad,a.comentario as comentario, c.nombre as cliente, con.nombre as contacto,
                    t.nombre as tipo,t.icono as icono,a.actPadre as padre, a.jerarquia as jerarquia, e.nombre as estado, 
                    r.nombre as resultado, u.nombreUsuario as nombreUsuario,u.apellidoUsuario as apellidoUsuario
                    FROM actividads a 
                    INNER JOIN clientes c on a.idCliente = c.id
                    INNER JOIN contactos con on a.idContacto = con.id
                    INNER JOIN tipo_actividads t on a.idTipoActividad = t.id 
                    INNER JOIN estado_actividads e on a.estado = e.id
                    INNER JOIN resultado_actividads r on a.resultado = r.id
                    INNER JOIN usuarios u on a.usuario = u.id
                    WHERE a.jerarquia LIKE CONCAT('%',".$idAccion.",'.','%')
                    ORDER BY a.jerarquia;
                ");
                
        }
        else
        {   //Es hijo
            $actividadDetalle = DB::select("
                    SELECT a.id as idActividad, a.comentario as comentario, c.nombre as cliente, con.nombre as contacto, t.nombre as tipo,t.icono as icono,
                    a.actPadre as padre, a.jerarquia as jerarquia, e.nombre as estado, r.nombre as resultado, 
                    u.nombreUsuario as nombreUsuario,u.apellidoUsuario as apellidoUsuario
                    FROM actividads a 
                    INNER JOIN clientes c on a.idCliente = c.id
                    INNER JOIN contactos con on a.idContacto = con.id
                    INNER JOIN tipo_actividads t on a.idTipoActividad = t.id 
                    INNER JOIN estado_actividads e on a.estado = e.id
                    INNER JOIN resultado_actividads r on a.resultado = r.id
                    INNER JOIN usuarios u on a.usuario = u.id
                    WHERE a.jerarquia LIKE CONCAT('%','.',".$idAccion.",'.','%');
                ");
        }


       // $ = DB::select($sp_actividades);
        // ----------------------------------------------------------------------//

        $actividadActual = DB::table('actividads')
            ->join('clientes','clientes.id','=','actividads.idCliente')
            ->join('contactos','contactos.id','=','actividads.idContacto')
            ->join('tipo_actividads','actividads.idTipoActividad','=','tipo_actividads.id')
            ->where('actividads.id', '=', $idAccion)
            ->select('actividads.comentario as comentario','clientes.nombre as cliente','contactos.nombre as contacto','tipo_actividads.nombre as tipo','tipo_actividads.icono as icono')
            ->orderBy('actividads.id', 'desc')
            ->get();

        /* $actividadHijo = DB::table('actividads')
            ->join('clientes','clientes.id','=','actividads.idCliente')
            ->join('contactos','contactos.id','=','actividads.idContacto')
            ->join('tipo_actividads','actividads.idTipoActividad','=','tipo_actividads.id')
            ->join('estado_actividads','estado_actividads.id','=','actividads.estado')
            ->where('actividads.actPadre', '=', $idAccion)
            ->select('actividads.comentario as comentario','clientes.nombre as cliente','contactos.nombre as contacto','tipo_actividads.nombre as tipo','estado_actividads.nombre as estado','tipo_actividads.icono as icono')
            ->orderBy('actividads.id', 'desc')
            ->get();*/

        $selClientes        = \DB::table('clientes')->lists('nombre','id');
        $selContactos       = \DB::table('contactos')->lists('nombre','id');
        $selTipoActividades = \DB::table('tipo_actividads')->lists('nombre','id');  
        $selEstadoActividades = \DB::table('estado_actividads')->lists('nombre','id');  
        $selResultadoActividades = \DB::table('resultado_actividads')->lists('nombre','id'); 
        $selUsuario = \DB::table('usuarios')->lists('nombreUsuario','id'); 

        return view('actividad.detalle', compact('actividadHijo','actividadActual','actividadDetalle','selClientes','selContactos','selTipoActividades','selEstadoActividades','selResultadoActividades','idClienteActual','idContactoActual','jerarquia','idAccion','padre','sqlJerarquia','JerarquiaActual','selUsuario'));
    }




    public function llamadasLista()
    {
        $llamadas = array();

         $llamadas = DB::table('actividads')
            ->join('clientes','clientes.id','=','actividads.idCliente')
            ->join('contactos','contactos.id','=','actividads.idContacto')
            ->join('tipo_actividads','actividads.idTipoActividad','=','tipo_actividads.id')
            ->join('usuarios','actividads.usuario','=','usuarios.id')
            //->where('actividads.idTipoActividad', '=', '2')
            //->whereNull('actividads.actPadre')
            ->select('actividads.id as id','actividads.comentario as comentario','clientes.nombre as cliente','clientes.id as idCliente'
                        ,'contactos.nombre as contacto','contactos.id as idContacto','tipo_actividads.nombre as tipo','tipo_actividads.icono as icono'
                        ,'actividads.fecha as fecha','usuarios.nombreUsuario as usuario','actividads.actPadre as padre')
            ->orderBy('actividads.jerarquia', 'asc')
            ->get();

            //$listaLlamadas = compact('llamadas');

           //**return Response::json($llamadas);










        //return view('actividad.index',compact('llamadas'));

        /*return response()->json(
                $listaLlamadas->toArray()
            );*/
    }

    public function reunionesList()
    {

         $reuniones = DB::table('actividads')
            ->join('clientes','clientes.id','=','actividads.idCliente')
            ->join('contactos','contactos.id','=','actividads.idContacto')
            ->join('tipo_actividads','actividads.idTipoActividad','=','tipo_actividads.id')
            ->join('usuarios','actividads.usuario','=','usuarios.id')
            ->where('actividads.idTipoActividad', '=', '1')
            ->whereNull('actividads.actPadre')
            ->select('actividads.comentario as comentario','actividads.id as idActividad','clientes.nombre as cliente'
                ,'clientes.id as idCliente','contactos.nombre as contacto','contactos.id as idContacto'
                ,'tipo_actividads.nombre as tipo','tipo_actividads.icono as icono','actividads.fecha as fecha','usuarios.nombreUsuario as usuario')
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

         $emails = DB::table('actividads')
            ->join('clientes','clientes.id','=','actividads.idCliente')
            ->join('contactos','contactos.id','=','actividads.idContacto')
            ->join('tipo_actividads','actividads.idTipoActividad','=','tipo_actividads.id')
            ->join('usuarios','actividads.usuario','=','usuarios.id')
            ->where('actividads.idTipoActividad', '=', '3')
            ->whereNull('actividads.actPadre')
            ->select('actividads.comentario as comentario','actividads.id as idActividad','clientes.nombre as cliente'
                ,'clientes.id as idCliente','contactos.nombre as contacto','contactos.id as idContacto'
                ,'tipo_actividads.nombre as tipo','tipo_actividads.icono as icono','actividads.fecha as fecha','usuarios.nombreUsuario as usuario')
            ->orderBy('actividads.id', 'desc')
            ->get();

            //$listaLlamadas = compact('llamadas');

            return Response::json($emails);

     
    }

    public function cotizacionesList()
    {

         $cotizaciones = DB::table('actividads')
            ->join('clientes','clientes.id','=','actividads.idCliente')
            ->join('contactos','contactos.id','=','actividads.idContacto')
            ->join('tipo_actividads','actividads.idTipoActividad','=','tipo_actividads.id')
            ->join('usuarios','actividads.usuario','=','usuarios.id')
            ->where('actividads.idTipoActividad', '=', '4')
            ->whereNull('actividads.actPadre')
            ->select('actividads.comentario as comentario','actividads.id as idActividad','clientes.nombre as cliente'
                ,'clientes.id as idCliente','contactos.nombre as contacto','contactos.id as idContacto'
                ,'tipo_actividads.nombre as tipo','tipo_actividads.icono as icono','actividads.fecha as fecha','usuarios.nombreUsuario as usuario')
            ->orderBy('actividads.id', 'desc')
            ->get();

            //$listaLlamadas = compact('llamadas');

            return Response::json($cotizaciones);

     
    }







   
}
