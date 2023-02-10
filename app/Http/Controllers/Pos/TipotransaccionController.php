<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Tipotransaccion;

use Auth;   
use Illuminate\Support\Carbon;

class TipotransaccionController extends Controller
{
    public function TipotransaccionAll(){
        
        //$allData = Bodega::orderBy('created_at',f'desc')->orderBy('updated_at','asc')->get();               
        $allData = Tipotransaccion::join('cuentas', 'cuentas.id', '=', 'tipotransaccions.account_id')              		
                    ->orderBy('name','asc') 
              		->get(['tipotransaccions.*', 'cuentas.name as namecuenta']);
        return view('backend.tipotransaccion.tipotransaccion_all', compact('allData'));
    }

    public function TipotransaccionAdd(){
        $cuenta = Cuenta::orderBy('name','asc')->get(); 
        $tipotransaccion = Tipotransaccion::orderBy('name','asc')->get();        
        return view('backend.tipotransaccion.tipotransaccion_add',compact('tipotransaccion','cuenta'));
    }

    public function TipotransaccionStore(Request $request){
        Tipotransaccion::insert([
            'account_id' => $request->account_id,
            'name' => $request->name,            
            'alphacode' => $request->alphacode,            
            'description' => $request->description,
            'type' => $request->type,                             
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Tipo Transacción agregado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('tipotransaccion.all')->with($notification); 
    }

    public function TipotransaccionEdit($id){
        $cuenta = Cuenta::orderBy('name','asc')->get();
        $tipotransaccion = Tipotransaccion::findOrFail($id);
        return view('backend.tipotransaccion.tipotransaccion_edit',compact('tipotransaccion','cuenta'));
    }

    public function TipotransaccionUpdate(Request $request){

        $tipotransaccion_id = $request->id;

        Tipotransaccion::findOrFail($tipotransaccion_id)->update([
            'account_id' => $request->account_id,
            'name' => $request->name,            
            'alphacode' => $request->alphacode,            
            'description' => $request->description,
            'type' => $request->type,                             
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Tipo Transacción actualizado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('tipotransaccion.all')->with($notification); 
    }    

    public function TipotransaccionDelete($id){
        Tipotransaccion::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Tipo Transacción eliminado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function GetTipotransaccions ($id)
    {
        $ttransaccion = Tipotransaccion::where('account_id',$id)->orderBy('name','asc')->get(); 
        return response()->json($ttransaccion);    
    }    
}
