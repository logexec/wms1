<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Destino;

use Auth;   
use Illuminate\Support\Carbon;



class DestinoController extends Controller
{
    public function DestinoAll(){
        
        //$allData = Bodega::orderBy('created_at',f'desc')->orderBy('updated_at','asc')->get();               
        $allData = Destino::join('cuentas', 'cuentas.id', '=', 'destinos.account_id')              		
              		->get(['destinos.*', 'cuentas.name as namecuenta']);
        return view('backend.destino.destino_all', compact('allData'));
    }

    public function DestinoAdd(){
        $cuenta = Cuenta::orderBy('name','asc')->get();        
        return view('backend.destino.destino_add',compact('cuenta'));
    }

    public function DestinoStore(Request $request){
        Destino::insert([
            'name' => $request->name,
            'account_id' => $request->account_id,            
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Destino agregado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('destino.all')->with($notification); 
    }

    public function DestinoEdit($id){
        $cuenta = Cuenta::orderBy('name','asc')->get();
        $destino = Destino::findOrFail($id);
        return view('backend.destino.destino_edit',compact('destino','cuenta'));
    }

    public function DestinoUpdate(Request $request){

        $destino_id = $request->id;

        Destino::findOrFail($destino_id)->update([
            'name' => $request->name,
            'account_id' => $request->account_id,            
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Destino actualizado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('destino.all')->with($notification); 
    }    

    public function DestinoDelete($id){
        Destino::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Destino eliminado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }

    public function GetDestinos ($id)
    {
        $data = Destino::where('account_id',$id)->orderBy('name','asc')->get(); 
        return response()->json($data);    
    }    
}
