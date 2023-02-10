<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Transportista;

use Auth;   
use Illuminate\Support\Carbon;

class TransportistaController extends Controller
{
    public function TransportistaAll(){
        
        //$allData = Bodega::orderBy('created_at',f'desc')->orderBy('updated_at','asc')->get();               
        $allData = Transportista::join('cuentas', 'cuentas.id', '=', 'transportistas.account_id')              		
              		->get(['transportistas.*', 'cuentas.name as namecuenta']);
        return view('backend.transportista.transportista_all', compact('allData'));
    }

    public function TransportistaAdd(){
        $cuenta = Cuenta::orderBy('name','asc')->get(); 
        $transportista = Transportista::orderBy('name','asc')->get();        
        return view('backend.transportista.transportista_add',compact('transportista','cuenta'));
    }

    public function TransportistaStore(Request $request){
        Transportista::insert([
            'account_id' => $request->account_id,
            'name' => $request->name,
            'company_name' => $request->company_name,
            'identification' => $request->identification,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zip' => $request->zip,
            'address' => $request->address,            
            'phone' => $request->phone,
            'email' => $request->email,                                 
            'status' => $request->status,   
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Transportista agregado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('transportista.all')->with($notification); 
    }

    public function TransportistaEdit($id){
        $cuenta = Cuenta::orderBy('name','asc')->get();
        $transportista = Transportista::findOrFail($id);
        return view('backend.transportista.transportista_edit',compact('transportista','cuenta'));
    }

    public function TransportistaUpdate(Request $request){

        $transportista_id = $request->id;

        Transportista::findOrFail($transportista_id)->update([
            'account_id' => $request->account_id,
            'name' => $request->name,
            'company_name' => $request->company_name,
            'identification' => $request->identification,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zip' => $request->zip,
            'address' => $request->address,            
            'phone' => $request->phone,
            'email' => $request->email,     
            'status' => $request->status,                            
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Transportista actualizado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('transportista.all')->with($notification); 
    }    

    public function TransportistaDelete($id){
        Transportista::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Transportista eliminado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function GetTransportistas ($id)
    {
        $data = Transportista::where('account_id',$id)->orderBy('name','asc')->get(); 
        return response()->json($data);    
    }    
}
