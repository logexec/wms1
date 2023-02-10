<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Solicitante;

use Auth;   
use Illuminate\Support\Carbon;

class SolicitanteController extends Controller
{
    public function SolicitanteAll(){
        
        //$allData = Bodega::orderBy('created_at',f'desc')->orderBy('updated_at','asc')->get();               
        $allData = Solicitante::join('cuentas', 'cuentas.id', '=', 'solicitantes.account_id')              		
              		->get(['solicitantes.*', 'cuentas.name as namecuenta']);
        return view('backend.solicitante.solicitante_all', compact('allData'));
    }

    public function SolicitanteAdd(){
        $cuenta = Cuenta::orderBy('name','asc')->get(); 
        $solicitante = Solicitante::orderBy('name','asc')->get();        
        return view('backend.solicitante.solicitante_add',compact('solicitante','cuenta'));
    }

    public function SolicitanteStore(Request $request){
        Solicitante::insert([
            'account_id' => $request->account_id,
            'name' => $request->name,
            'company_name' => $request->company_name,
            'fiscal_identification' => $request->fiscal_identification,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zip' => $request->zip,
            'address' => $request->address,
            'lat' => $request->lat,
            'lon' => $request->lon,
            'phone' => $request->phone,
            'email' => $request->email,                                 
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Solicitante agregado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('solicitante.all')->with($notification); 
    }

    public function SolicitanteEdit($id){
        $cuenta = Cuenta::orderBy('name','asc')->get();
        $solicitante = Solicitante::findOrFail($id);
        return view('backend.solicitante.solicitante_edit',compact('solicitante','cuenta'));
    }

    public function SolicitanteUpdate(Request $request){

        $solicitante_id = $request->id;

        Solicitante::findOrFail($solicitante_id)->update([
            'account_id' => $request->account_id,
            'name' => $request->name,
            'company_name' => $request->company_name,
            'fiscal_identification' => $request->fiscal_identification,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zip' => $request->zip,
            'address' => $request->address,
            'lat' => $request->lat,
            'lon' => $request->lon,
            'phone' => $request->phone,
            'email' => $request->email,                                 
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Solicitante actualizado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('solicitante.all')->with($notification); 
    }    

    public function SolicitanteDelete($id){
        Solicitante::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Solicitante eliminado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }
    public function GetSolicitantes ($id)
    {
        $solicitante = Solicitante::where('account_id',$id)->orderBy('name','asc')->get(); 
        return response()->json($solicitante);    
    } 
}
