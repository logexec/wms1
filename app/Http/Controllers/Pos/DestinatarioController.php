<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Destinatario;
use App\Models\Solicitante;

use Auth;   
use Illuminate\Support\Carbon;

class DestinatarioController extends Controller
{
    public function DestinatarioAll(){
        
        //$allData = Bodega::orderBy('created_at',f'desc')->orderBy('updated_at','asc')->get();               
        $allData = Destinatario::join('cuentas', 'cuentas.id', '=', 'destinatarios.account_id')->join('solicitantes', 'solicitantes.id', '=', 'destinatarios.solicitante_id')              		
              		->get(['destinatarios.*', 'cuentas.name as namecuenta','solicitantes.company_name as namesolicitante']);
        return view('backend.destinatario.destinatario_all', compact('allData'));
    }

    public function DestinatarioAdd(){
        
        $destinatario = Destinatario::orderBy('name','asc')->get();                
        $cuenta = Cuenta::orderBy('name','asc')->get();                 
        $solicitante = Solicitante::orderBy('name','asc')->get();
        return view('backend.destinatario.destinatario_add',compact('destinatario','cuenta','solicitante'));
    }

    public function DestinatarioStore(Request $request){
        Destinatario::insert([
            'account_id' => $request->account_id,
            'solicitante_id' => $request->solicitante_id,
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
            'message' => 'Destinatario agregado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('destinatario.all')->with($notification); 
    }

    public function DestinatarioEdit($id){
        $cuenta = Cuenta::orderBy('name','asc')->get();
        $destinatario = Destinatario::findOrFail($id);
        $solicitante = Solicitante::where('account_id',$destinatario->account_id)->orderBy('name','asc')->get();
        return view('backend.destinatario.destinatario_edit',compact('destinatario','cuenta','solicitante'));
    }

    public function DestinatarioUpdate(Request $request){

        $destinatario_id = $request->id;

        Destinatario::findOrFail($destinatario_id)->update([
            'account_id' => $request->account_id,
            'solicitante_id' => $request->solicitante_id,
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
            'message' => 'Destinatario actualizado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('destinatario.all')->with($notification); 
    }    

    public function DestinatarioDelete($id){
        Destinatario::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Destinatario eliminado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function GetDestinatarios ($id)
    {
        $destinatario = Destinatario::where('solicitante_id',$id)->orderBy('name','asc')->get(); 
        return response()->json($destinatario);    
    } 


}
