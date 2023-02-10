<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Vehiculo;

use Auth;   
use Illuminate\Support\Carbon;

class VehiculoController extends Controller
{
    public function VehiculoAll(){
        
        //$allData = Bodega::orderBy('created_at',f'desc')->orderBy('updated_at','asc')->get();               
        $allData = Vehiculo::join('cuentas', 'cuentas.id', '=', 'vehiculos.account_id')              		
              		->get(['vehiculos.*', 'cuentas.name as namecuenta']);
        return view('backend.vehiculo.vehiculo_all', compact('allData'));
    }

    public function VehiculoAdd(){
        $cuenta = Cuenta::orderBy('name','asc')->get(); 
        $vehiculo = Vehiculo::orderBy('name','asc')->get();        
        return view('backend.vehiculo.vehiculo_add',compact('vehiculo','cuenta'));
    }

    public function VehiculoStore(Request $request){
        Vehiculo::insert([
            'account_id' => $request->account_id,
            'name' => $request->name,            
            'weight' => $request->weight,
            'um_weight' => $request->um_weight,
            'volume' => $request->volume,
            'um_volume' => $request->um_volume,                        
            'pallets' => $request->pallets,            
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Vehículo agregado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('vehiculo.all')->with($notification); 
    }

    public function VehiculoEdit($id){
        $cuenta = Cuenta::orderBy('name','asc')->get();
        $vehiculo = Vehiculo::findOrFail($id);
        return view('backend.vehiculo.vehiculo_edit',compact('vehiculo','cuenta'));
    }

    public function VehiculoUpdate(Request $request){

        $vehiculo_id = $request->id;

        Vehiculo::findOrFail($vehiculo_id)->update([
            'account_id' => $request->account_id,
            'name' => $request->name,            
            'weight' => $request->weight,
            'um_weight' => $request->um_weight,
            'volume' => $request->volume,
            'um_volume' => $request->um_volume,                        
            'pallets' => $request->pallets,            
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Vehículo actualizado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('vehiculo.all')->with($notification); 
    }    

    public function VehiculoDelete($id){
        Vehiculo::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Vehiculo eliminado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }

    public function GetVehiculos ($id)
    {
        $data = Vehiculo::where('account_id',$id)->orderBy('name','asc')->get(); 
        return response()->json($data);    
    }    
}
