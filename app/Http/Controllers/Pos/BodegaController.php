<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Bodega;

use Auth;   
use Illuminate\Support\Carbon;



class BodegaController extends Controller
{
    public function BodegaAll(){
        
        //$allData = Bodega::orderBy('created_at',f'desc')->orderBy('updated_at','asc')->get();               
        $allData = Bodega::join('cuentas', 'cuentas.id', '=', 'bodegas.account_id')              		
              		->get(['bodegas.*', 'cuentas.name as namecuenta']);
        return view('backend.bodega.bodega_all', compact('allData'));
    }

    public function BodegaAdd(){
        $cuenta = Cuenta::orderBy('name','asc')->get();        
        return view('backend.bodega.bodega_add',compact('cuenta'));
    }

    public function BodegaStore(Request $request){
        Bodega::insert([
            'name' => $request->name,
            'account_id' => $request->account_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'responsible' => $request->responsible,
            'status' => $request->status,
            'm3' => $request->m3,
            'm2' => $request->m2,
            'pallet_capacity' => $request->pallet_capacity,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Bodega agregada exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('bodega.all')->with($notification); 
    }

    public function BodegaEdit($id){
        $cuenta = Cuenta::orderBy('name','asc')->get();
        $bodega = Bodega::findOrFail($id);
        return view('backend.bodega.bodega_edit',compact('bodega','cuenta'));
    }

    public function BodegaUpdate(Request $request){

        $bodega_id = $request->id;

        Bodega::findOrFail($bodega_id)->update([
            'name' => $request->name,
            'account_id' => $request->account_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'responsible' => $request->responsible,
            'status' => $request->status,
            'm3' => $request->m3,
            'm2' => $request->m2,
            'pallet_capacity' => $request->pallet_capacity,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Bodega actualizada exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('bodega.all')->with($notification); 
    }    

    public function BodegaDelete($id){
        Bodega::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Bodega eliminada exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }
}
