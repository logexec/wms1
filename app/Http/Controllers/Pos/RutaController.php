<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruta;
use App\Models\Destino;
use App\Models\Cuenta;
use App\Models\Bodega;
use App\Models\Vehiculo;
use App\Models\Transportista;
use App\Models\Doccab;

use Auth;
use Illuminate\Support\Carbon;


class RutaController extends Controller
{
    public function RutaAll(){

        //$allData = Doccab::latest()->get();so
        $allData = Ruta::join('vehiculos', 'vehiculos.id', '=', 'rutas.vehiculo_id')              		
                    ->join('transportistas', 'transportistas.id', '=', 'rutas.transportista_id')
                    ->join('cuentas', 'cuentas.id', '=', 'rutas.account_id')
                    ->join('bodegas', 'bodegas.id', '=', 'rutas.warehouse_id')
                    ->join('destinos as des', 'des.id', '=', 'rutas.destino_id')
                    ->join('destinos as ori', 'ori.id', '=', 'rutas.origen_id')
                    ->orderBy('account_id','asc')->orderBy('warehouse_id','asc')->orderBy('name','asc')              		
              		->get(['rutas.*', 'cuentas.name as namecuenta','transportistas.company_name as nametransportista','bodegas.name as namebodega','ori.name as oriname','des.name as desname','vehiculos.name as namevehiculo']);
        return view('backend.ruta.ruta_all',compact('allData')); 

    } // End Mehtod 

    public function RutaAdd(){
    
        $cuenta = Cuenta::orderBy('name','asc')->get();                         
        $bodega = Bodega::orderBy('name','asc')->get();
        
        $destino = Destino::orderBy('name','asc')->get();                 
        $origen = Destino::orderBy('name','asc')->get();                 
        $vehiculo = Vehiculo::orderBy('name','asc')->get();                 
        $transportista = Transportista::orderBy('name','asc')->get();                 

        return view('backend.ruta.ruta_add',compact('cuenta','bodega','destino','origen','vehiculo','transportista'));
    } // End Mehtod 


    public function RutaStore(Request $request){


        $name = Ruta::max('name') + 1;        
        $upload_date = substr($request->upload_date_hour,0,10);
                
        Ruta::insert([

            'name' => $name, 
            'account_id' => $request->account_id, 
            'warehouse_id' => $request->warehouse_id, 
            'origen_id' => $request->origen_id, 
            'destino_id' => $request->destino_id, 
            'vehiculo_id' => $request->vehiculo_id, 
            'transportista_id' => $request->transportista_id, 
            'status' => $request->status, 
            'upload_date' => $upload_date, 
            'upload_date_hour' => $request->upload_date_hour, 
            'order_upload' => $request->order_upload, 
            'start_route' => $request->start_route, 
            'finish_route' => $request->finish_route, 
            'comments' => $request->comments,             
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 
        ]);

         $notification = array(
            'message' => 'Ruta Agregada Exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('planificador.all')->with($notification);

    } // End Method 

     public function RutaEdit($id){

        $ruta = Ruta::findOrFail($id);
        $cuenta = Cuenta::orderBy('name','asc')->get();                                                  
        $bodega = Bodega::where('account_id',$ruta->account_id)->orderBy('name','asc')->get();
        
        $destino = Destino::where('account_id',$ruta->account_id)->orderBy('name','asc')->get();                 
        $origen = Destino::where('account_id',$ruta->account_id)->orderBy('name','asc')->get();                 
        $vehiculo = Vehiculo::where('account_id',$ruta->account_id)->orderBy('name','asc')->get();                 
        $transportista = Transportista::where('account_id',$ruta->account_id)->orderBy('name','asc')->get();    
        
        return view('backend.ruta.ruta_edit',compact('ruta','cuenta','bodega','destino','vehiculo','transportista','origen'));

    }// End Method 


     public function RutaUpdate(Request $request){

        $ruta = $request->id;
        $upload_date = substr($request->upload_date_hour,0,10);

        Ruta::findOrFail($ruta)->update([
            'name' => $request->name, 
            'account_id' => $request->account_id, 
            'warehouse_id' => $request->warehouse_id, 
            'origen_id' => $request->origen_id, 
            'destino_id' => $request->destino_id, 
            'vehiculo_id' => $request->vehiculo_id, 
            'transportista_id' => $request->transportista_id, 
            'status' => $request->status, 
            'upload_date' => $upload_date, 
            'upload_date_hour' => $request->upload_date_hour, 
            'order_upload' => $request->order_upload, 
            'start_route' => $request->start_route, 
            'finish_route' => $request->finish_route, 
            'comments' => $request->comments,                   
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),  

        ]);

         $notification = array(
            'message' => 'Ruta Actualizada Exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('ruta.all')->with($notification);

    }// End Method 


    public function RutaDelete($id){

        Ruta::findOrFail($id)->delete();
      
       $notification = array(
            'message' => 'Ruta Eliminada Exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method 
    
    public function RutaDetail($id){
       $route = Ruta::findOrFail($id);

        $data = Ruta::join('vehiculos', 'vehiculos.id', '=', 'rutas.vehiculo_id')              		
                    ->join('transportistas', 'transportistas.id', '=', 'rutas.transportista_id')
                    ->join('cuentas', 'cuentas.id', '=', 'rutas.account_id')
                    ->join('bodegas', 'bodegas.id', '=', 'rutas.warehouse_id')
                    ->join('destinos as des', 'des.id', '=', 'rutas.destino_id')
                    ->join('destinos as ori', 'ori.id', '=', 'rutas.origen_id')
                    ->where('rutas.id',$id)
                    ->orderBy('account_id','asc')->orderBy('warehouse_id','asc')->orderBy('name','asc')              		
              		->get(['rutas.*', 'cuentas.name as namecuenta','transportistas.company_name as nametransportista','bodegas.name as namebodega','ori.name as oriname','des.name as desname','vehiculos.name as namevehiculo']);
        $docs = $this->GetDocumentos($route->account_id);
        
        return view('backend.ruta.ruta_detail',compact('data','docs'));
    }

    public function GetDocumentos ($id)
    {
        $documento = Doccab::join('solicitantes', 'solicitantes.id', '=', 'doccabs.solicitante_id')->where('doccabs.account_id',$id)->where('doccabs.status','Pendiente')->orderBy('name','asc')->get(['doccabs.*', 'solicitantes.name as namesolicitante','solicitantes.company_name as companynamesolicitante']); 
        return $documento;    
    }    

    public function GetRutas ($id)
    {
        $allData = Ruta::join('vehiculos', 'vehiculos.id', '=', 'rutas.vehiculo_id')              		
                    ->join('transportistas', 'transportistas.id', '=', 'rutas.transportista_id')
                    ->join('cuentas', 'cuentas.id', '=', 'rutas.account_id')
                    ->join('bodegas', 'bodegas.id', '=', 'rutas.warehouse_id')
                    ->join('destinos as des', 'des.id', '=', 'rutas.destino_id')
                    ->join('destinos as ori', 'ori.id', '=', 'rutas.origen_id')
                    ->where('rutas.account_id',$id)
                    ->orderBy('account_id','asc')->orderBy('warehouse_id','asc')->orderBy('name','asc')              		
              		->get(['rutas.*', 'cuentas.name as namecuenta','transportistas.company_name as nametransportista','bodegas.name as namebodega','ori.name as oriname','des.name as desname']);
        return response()->json($allData);    
    }     


}
 