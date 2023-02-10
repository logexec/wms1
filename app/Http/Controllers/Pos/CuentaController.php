<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuenta;
use Auth;   
use Illuminate\Support\Carbon;



class CuentaController extends Controller
{
    public function CuentaAll(){
        //$cuentas = Cuenta::all();
        //->where('status','1')
        $allData = Cuenta::orderBy('created_at','desc')->orderBy('updated_at','asc')->get();
        //return view('backend.invoice.invoice_all',compact('allData'));
        //$cuentas = Cuenta::latest()->get();
        return view('backend.cuenta.cuenta_all', compact('allData'));
    }

    public function CuentaAdd(){
        return view('backend.cuenta.cuenta_add');
    }

    public function CuentaStore(Request $request){
        Cuenta::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'responsible' => $request->responsible,
            'plan' => $request->plan,
            'status' => $request->status,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Cuenta agregada exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('cuenta.all')->with($notification); 
    }

    public function CuentaEdit($id){
        $cuenta = Cuenta::findOrFail($id);
        return view('backend.cuenta.cuenta_edit',compact('cuenta'));
    }

    public function CuentaUpdate(Request $request){

        $cuenta_id = $request->id;

        Cuenta::findOrFail($cuenta_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'responsible' => $request->responsible,
            'plan' => $request->plan,
            'status' => $request->status,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Cuenta actualizada exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('cuenta.all')->with($notification); 
    }    

    public function CuentaDelete($id){
        Cuenta::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Cuenta eliminada exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }
}
