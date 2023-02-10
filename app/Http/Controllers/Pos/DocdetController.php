<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doccab;
use App\Models\Cuenta;
use App\Models\Bodega;
use App\Models\Docdet;
use App\Models\Producto;
use Auth;
use Illuminate\Support\Carbon;


class DocdetController extends Controller
{
    public function DocdetAll(){

        //$allData = Doccab::latest()->get();so
        $allData = Docdet::join('doccabs', 'doccabs.id', '=', 'docdets.doccab_id')              		
                    ->join('solicitantes', 'doccabs.solicitante_id', '=', 'solicitantes.id')
                    ->join('bodegas', 'bodegas.id', '=', 'docdets.warehouse_id')
                    ->join('cuentas', 'cuentas.id', '=', 'docdets.account_id')
                    ->orderBy('account_id','asc')->orderBy('doccab_id','asc')->orderBy('name','asc')              		
              		->get(['doccabs.name as namedoccabs', 'cuentas.name as namecuenta','bodegas.name as namebodega','doccabs.name as namedoccab','docdets.*','solicitantes.company_name as namesolicitante']);
        return view('backend.docdet.docdet_all',compact('allData'));

    } // End Mehtod 

    public function DocdetAdd(){
    
        $doccab = Doccab::orderBy('name','asc')->get();                
        $cuenta = Cuenta::orderBy('name','asc')->get();                         
        $bodega = Bodega::orderBy('name','asc')->get();

        return view('backend.docdet.docdet_add',compact('cuenta','doccab','bodega'));
        
    } // End Mehtod 



    public function DocdetStore(Request $request){

        $prod = Producto::findOrFail($request->prod_id);
        $total_req_weight = $prod->weight * $request->total_req;
        $um_total_req_weight = $prod->um_weight;
        $total_req_volume = $prod->volume * $request->total_req;;
        $um_total_req_volume = $prod->um_volume;

       
        Docdet::insert([
            'name' => $request->name, 
            'account_id' => $request->account_id, 
            'doccab_id' => $request->doccab_id, 
            'warehouse_id' => $request->warehouse_id, 
            'prod_id' => $request->prod_id, 
            'material_code' => $request->material_code, 
            'material_det' => $request->material_det, 
            'batch' => $request->batch, 
            'barcode' => $request->name, 
            'total_req' => $request->total_req, 
            'um_total_req' => $request->um_total_req, 
            'total_pre' => $request->total_pre, 
            'total_con' => $request->total_con, 
            'comments' => $request->comments,   

            'total_req_weight' => $total_req_weight,   
            'um_total_req_weight' => $um_total_req_weight,   
            'total_req_volume' => $total_req_volume,   
            'um_total_req_volume' => $um_total_req_volume,       
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 

        ]);

        $this->UpdTotalesDoccab($request->doccab_id);

         $notification = array(
            'message' => 'Ítem Agregado Exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('docdet.all')->with($notification);

    } // End Method 
    
    public function UpdTotalesDoccab($doccab_id){
        
        $totales = Docdet::where('docdets.doccab_id', '=', $doccab_id)->get(['total_req','total_req_weight','total_req_volume']);

        $totreq = $totales->sum('total_req');
        $totwei = $totales->sum('total_req_weight');
        $totvol = $totales->sum('total_req_volume');
    

        Doccab::findOrFail($doccab_id)->update([
            'total_qty' => $totreq, 
            'total_weight' => $totwei, 
            'total_volume' => $totvol,                                  
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),  
        ]);
        
    }
    public function DocdetEdit($id){
       
         $docdet = Docdet::findOrFail($id);
        $cuenta = Cuenta::orderBy('name','asc')->get();                         
        $doccab = Doccab::where('account_id',$docdet->account_id)->get();        
        $bodega = Bodega::where('account_id',$docdet->account_id)->orderBy('name','asc')->get();
        $producto = Doccab::where('account_id',$docdet->account_id)->get();      
                    
        
        return view('backend.docdet.docdet_edit',compact('docdet','doccab','cuenta','bodega','producto'));

        

    }// End Method 


     public function DocdetUpdate(Request $request){

        $docdet_id = $request->id;

        Docdet::findOrFail($docdet_id)->update([
            'name' => $request->name, 
            'account_id' => $request->account_id, 
            'doccab_id' => $request->doccab_id, 
            'warehouse_id' => $request->warehouse_id, 
            'prod_id' => $request->prod_id, 
            'material_code' => $request->material_code, 
            'material_det' => $request->material_det, 
            'batch' => $request->batch, 
            'barcode' => $request->name, 
            'total_req' => $request->total_req, 
            'um_total_req' => $request->um_total_req, 
            'total_pre' => $request->total_pre, 
            'total_con' => $request->total_con, 
            'comments' => $request->comments,                       
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),  

        ]);

        $this->UpdTotalesDoccab($request->doccab_id);

         $notification = array(
            'message' => 'Ítem Actualizado Exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('docdet.all')->with($notification);

    }// End Method 


    public function DocdetDelete($id){
        $docdet = Docdet::findOrFail($id);

        Docdet::findOrFail($id)->delete();
      
       $notification = array(
            'message' => 'Ítem Eliminado Exitosamente', 
            'alert-type' => 'success'
        );

        $this->UpdTotalesDoccab($docdet->doccab_id);


        return redirect()->back()->with($notification);

    } // End Method 
    
    public function DocdetDetail($id){
        $docdet = Doccab::findOrFail($id);
        $cuenta = Cuenta::orderBy('name','asc')->get();                         
        $doccab = Doccab::where('account_id',$docdet->account_id);        
        $bodega = Bodega::where('account_id',$docdet->account_id)->orderBy('name','asc')->get();
                    
        
        return view('backend.docdet.docdet_detail',compact('docdet','doccab','cuenta','bodega'));

    }


}
 