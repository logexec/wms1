<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Planificador;
use App\Models\Ruta;
use App\Models\Doccab;

use Auth;   
use Illuminate\Support\Carbon;



class PlanificadorController extends Controller
{
    public function PlanificadorAll(){
        $rutaConfirmada = $this->GetRoutesConfLoadToday();
        $rutaPendiente = $this->GetRoutesPendLoadToday();
        $documentoPendiente = $this->GetDocsPend();
       
        return view('backend.planificador.planificador_all',compact('rutaConfirmada','rutaPendiente','documentoPendiente'));
 
    }

    public function GetRoutesConfLoadToday(){

      $data =  Ruta::join('vehiculos', 'vehiculos.id', '=', 'rutas.vehiculo_id')              		
        ->join('transportistas', 'transportistas.id', '=', 'rutas.transportista_id')
        ->join('cuentas', 'cuentas.id', '=', 'rutas.account_id')
        ->join('bodegas', 'bodegas.id', '=', 'rutas.warehouse_id')
        ->join('destinos as des', 'des.id', '=', 'rutas.destino_id')
        ->join('destinos as ori', 'ori.id', '=', 'rutas.origen_id')
        ->where('rutas.status','=','Confirmado')
        ->where('rutas.upload_date','=', Carbon::today())
        ->orderBy('account_id','asc')->orderBy('warehouse_id','asc')->orderBy('name','asc')              		
          ->get(['rutas.*', 'cuentas.name as namecuenta','transportistas.company_name as nametransportista','bodegas.name as namebodega','ori.name as oriname','des.name as desname','vehiculos.name as namevehiculo']);

        return $data;
    }

    public function GetRoutesPendLoadToday(){      
      $data =  Ruta::join('vehiculos', 'vehiculos.id', '=', 'rutas.vehiculo_id')              		
        ->join('transportistas', 'transportistas.id', '=', 'rutas.transportista_id')
        ->join('cuentas', 'cuentas.id', '=', 'rutas.account_id')
        ->join('bodegas', 'bodegas.id', '=', 'rutas.warehouse_id')
        ->join('destinos as des', 'des.id', '=', 'rutas.destino_id')
        ->join('destinos as ori', 'ori.id', '=', 'rutas.origen_id')
        ->where('rutas.status','=','Pendiente')
        ->where('rutas.upload_date','=', Carbon::today())
        ->orderBy('account_id','asc')->orderBy('warehouse_id','asc')->orderBy('name','asc')              		
          ->get(['rutas.*', 'cuentas.name as namecuenta','transportistas.company_name as nametransportista','bodegas.name as namebodega','ori.name as oriname','des.name as desname','vehiculos.name as namevehiculo']);

        return $data;
    }   

    public function GetTotalesRoute($route_id){
        
      $total_route = Doccab::where('doccabs.route_id', '=', $route_id)->get(['total_qty','total_weight','total_volume','doccabs.name']);
            
      return $total_route;
  }
    
    public function GetDocsPend(){

      $data =   Doccab::join('solicitantes', 'solicitantes.id', '=', 'doccabs.solicitante_id')              		
      ->join('destinatarios', 'destinatarios.id', '=', 'doccabs.destinatario_id')
      ->join('cuentas', 'cuentas.id', '=', 'doccabs.account_id')
      ->where('doccabs.status','=','pendiente')
      ->orderBy('account_id','asc')->orderBy('solicitante_id','asc')->orderBy('name','asc')              		
    ->get(['doccabs.*', 'cuentas.name as namecuenta','solicitantes.name as namesolicitante','destinatarios.name as namedestinatario','solicitantes.company_name as companynamesolicitante','destinatarios.company_name as companynamedestinatarios']);

        return $data;
    }
    public function PlanificadorConfirmar($id){
      Ruta::findOrFail($id)->update([        
        'status' => 'Confirmado', 
      ]);
      $notification = array(
        'message' => 'Ruta Confirmada Exitosamente', 
        'alert-type' => 'success'
      );

      return redirect()->route('planificador.all')->with($notification);
    }

    public function PlanificadorAsignar(Request $request){
    
      $pedido = $request->pedido;
      $ruta = $request->ruta;

      Doccab::findOrFail($pedido)->update([
        'route_id' => $ruta, 
        'status' => 'Asignado', 
      
    ]);
      
      $total_route =  $this->GetTotalesRoute($request->ruta);

   
      Ruta::findOrFail($request->ruta)->update([        
        
        
        'total_qty' => $total_route->sum('total_qty'), 
        'total_weight' => $total_route->sum('total_weight'), 
        'total_volume' => $total_route->sum('total_volume'), 
        'total_docs' => $total_route->count('name'),      
      ]);

       $notification = array(
          'message' => 'Entrega '.$pedido.' asignada a la ruta '.$ruta.' Exitosamente', 
          'alert-type' => 'success'
      );

      return redirect()->route('planificador.all')->with($notification);

    }// End Method 

    public function PlanificadorDelete($id) {

    
      Doccab::where('route_id',$id)->update([                        
        'route_id' => '0', 
        'status' => 'Pendiente',         
      ]);

      Ruta::findOrFail($id)->delete();
      $notification = array(
          'message' => 'Ruta Eliminada Exitosamente', 
          'alert-type' => 'success'
      );

      return redirect()->back()->with($notification);

   } // End Method 


       


}
