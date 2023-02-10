<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Bodega;
use App\Models\Ubicacion;

use Auth;   
use Illuminate\Support\Carbon;



class UbicacionController extends Controller
{
    public function UbicacionAll(){
        
        //$allData = Bodega::orderBy('created_at','desc')->orderBy('updated_at','asc')->get();               
        $allData = Ubicacion::join('cuentas', 'cuentas.id', '=', 'ubicacions.account_id')              		
                    ->join('bodegas', 'bodegas.id', '=', 'ubicacions.warehouse_id')->orderBy('account_id','asc')->orderBy('warehouse_id','asc')->orderBy('name','asc')              		
              		->get(['ubicacions.*', 'cuentas.name as namecuenta','bodegas.name as namebodega']);
        return view('backend.ubicacion.ubicacion_all', compact('allData'));
    }

    public function UbicacionAdd(){
        $cuenta = Cuenta::orderBy('name','asc')->get();        
        $bodega = Bodega::orderBy('name','asc')->get();        
        return view('backend.ubicacion.ubicacion_add',compact('bodega','cuenta'));
    }

    public function UbicacionStore(Request $request){
        Ubicacion::insert([
            'name' => $request->name,
            'account_id' => $request->account_id,            
            'warehouse_id' => $request->warehouse_id,
            'width' => $request->width,
            'high' => $request->high,
            'long' => $request->long,
            'sku' => $request->sku,
            'ranking' => $request->ranking,
            'status' => $request->status,
            'total_pallets' => $request->total_pallets,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Ubicación agregada exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('ubicacion.all')->with($notification); 
    }

    public function UbicacionEdit($id){
        
        $ubicacion = Ubicacion::findOrFail($id);
        $cuenta = Cuenta::orderBy('name','asc')->get();
        $bodega = Bodega::orderBy('name','asc')->where('account_id',$ubicacion->account_id)->get();
        
        return view('backend.ubicacion.ubicacion_edit',compact('bodega','cuenta','ubicacion'));
    }

    public function UbicacionUpdate(Request $request){

        $ubicacion_id = $request->id;

        Ubicacion::findOrFail($ubicacion_id)->update([
            'name' => $request->name,
            'account_id' => $request->account_id,            
            'warehouse_id' => $request->warehouse_id,
            'width' => $request->width,
            'high' => $request->high,
            'long' => $request->long,
            'sku' => $request->sku,
            'ranking' => $request->ranking,
            'status' => $request->status,
            'total_pallets' => $request->total_pallets,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Ubicación actualizada exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('ubicacion.all')->with($notification); 
    }    

    public function UbicacionDelete($id){
        Ubicacion::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Ubicación eliminada exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function UbicacionGetbodegas ($id)
    {
        $bodega = Bodega::where('account_id',$id)->orderBy('name','asc')->get(); 
        return response()->json($bodega);    
    }    

    public function GetUbicaciones ($id)
    {
        $bodega = Ubicacion::where('account_id',$id)->orderBy('name','asc')->get(); 
        return response()->json($bodega);    
    }    
}
