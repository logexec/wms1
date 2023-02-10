<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doccab;
use App\Models\Destinatario;
use App\Models\Solicitante;
use App\Models\Cuenta;
use App\Models\Bodega;
use App\Models\Docdet;
use Auth;
use Illuminate\Support\Carbon;


class DoccabController extends Controller
{
    public function DoccabAll(){

        //$allData = Doccab::latest()->get();so
        $allData = Doccab::join('solicitantes', 'solicitantes.id', '=', 'doccabs.solicitante_id')              		
                    ->join('destinatarios', 'destinatarios.id', '=', 'doccabs.destinatario_id')
                    ->join('cuentas', 'cuentas.id', '=', 'doccabs.account_id')
                    ->orderBy('account_id','asc')->orderBy('solicitante_id','asc')->orderBy('name','asc')              		
              		->get(['doccabs.*', 'cuentas.name as namecuenta','solicitantes.name as namesolicitante','destinatarios.name as namedestinatario','solicitantes.company_name as companynamesolicitante','destinatarios.company_name as companynamedestinatarios']);
        return view('backend.doccab.doccab_all',compact('allData'));

    } // End Mehtod 

    public function DoccabAdd(){
    
        $destinatario = Destinatario::orderBy('name','asc')->get();                
        $cuenta = Cuenta::orderBy('name','asc')->get();                 
        $solicitante = Solicitante::orderBy('name','asc')->get();
        $bodega = Bodega::orderBy('name','asc')->get();
        return view('backend.doccab.doccab_add',compact('destinatario','cuenta','solicitante','bodega'));
    } // End Mehtod 


    public function DoccabStore(Request $request){

        Doccab::insert([
            'name' => $request->name, 
            'type' => $request->type, 
            'account_id' => $request->account_id, 
            'solicitante_id' => $request->solicitante_id, 
            'destinatario_id' => $request->destinatario_id, 
            'warehouse_id' => $request->warehouse_id, 
            'route_id' => '0', 
            'status' => $request->status, 
            'order_creator_user' => $request->order_creator_user, 
            'doc_creator_user' => $request->doc_creator_user, 
            'order_date' => $request->order_daterecord_date, 
            'record_date' => $request->record_date, 
            'start_doc_date' => $request->start_doc_date, 
            'start_doc_date_hour' => $request->start_doc_date_hour, 
            'finish_doc_date' => $request->finish_doc_date, 
            'finish_doc_date_hour' => $request->finish_doc_date_hour, 
            'point_sale' => $request->point_sale, 
            'sales_channel' => $request->sales_channel, 
            'total_qty' => $request->total_qty, 
            'total_weight' => $request->total_weight, 
            'total_volume' => $request->total_volume, 
            'order_number' => $request->order_number, 
            'purchase_number' => $request->purchase_number, 
            'comments' => $request->comments, 
            'invoice_number' => $request->invoice_number, 
            'invoice_auth_number' => $request->invoice_auth_number, 
            'invoice_print_date' => $request->invoice_print_date, 
            'erp_invoice_number' => $request->erp_invoice_number,             
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Documento Agregado Exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('doccab.all')->with($notification);

    } // End Method 

     public function DoccabEdit($id){

        $doccab = Doccab::findOrFail($id);
        $cuenta = Cuenta::orderBy('name','asc')->get();                 
        $bodega = Bodega::where('account_id',$doccab->account_id)->orderBy('name','asc')->get();

        $solicitante = Solicitante::where('account_id',$doccab->account_id)->orderBy('name','asc')->get();        
        $destinatario = Destinatario::where('account_id',$doccab->account_id)->orderBy('name','asc')->get();                
        
        return view('backend.doccab.doccab_edit',compact('doccab','cuenta','bodega','solicitante','destinatario'));

    }// End Method 


     public function DoccabUpdate(Request $request){

        $doccab_id = $request->id;

        Doccab::findOrFail($doccab_id)->update([
            'name' => $request->name, 
            'type' => $request->type, 
            'account_id' => $request->account_id, 
            'solicitante_id' => $request->solicitante_id, 
            'destinatario_id' => $request->destinatario_id, 
            'warehouse_id' => $request->warehouse_id, 
            'status' => $request->status, 
            'order_creator_user' => $request->order_creator_user, 
            'doc_creator_user' => $request->doc_creator_user, 
            'order_date' => $request->order_daterecord_date, 
            'record_date' => $request->record_date, 
            'start_doc_date' => $request->start_doc_date, 
            'start_doc_date_hour' => $request->start_doc_date_hour, 
            'finish_doc_date' => $request->finish_doc_date, 
            'finish_doc_date_hour' => $request->finish_doc_date_hour, 
            'point_sale' => $request->point_sale, 
            'sales_channel' => $request->sales_channel, 
            'total_qty' => $request->total_qty, 
            'total_weight' => $request->total_weight, 
            'total_volume' => $request->total_volume, 
            'order_number' => $request->order_number, 
            'purchase_number' => $request->purchase_number, 
            'comments' => $request->comments, 
            'invoice_number' => $request->invoice_number, 
            'invoice_auth_number' => $request->invoice_auth_number, 
            'invoice_print_date' => $request->invoice_print_date, 
            'erp_invoice_number' => $request->erp_invoice_number,             
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),  

        ]);

         $notification = array(
            'message' => 'Documento Actualizado Exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('doccab.all')->with($notification);

    }// End Method 


    public function DoccabDelete($id){

        Doccab::findOrFail($id)->delete();
      
       $notification = array(
            'message' => 'Documento Eliminado Exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method 
    
    public function DoccabDetail($id){
        $doccab = Doccab::findOrFail($id);
        $cuenta = Cuenta::orderBy('name','asc')->get();                 
        $bodega = Bodega::where('account_id',$doccab->account_id)->orderBy('name','asc')->get();

        $solicitante = Solicitante::where('account_id',$doccab->account_id)->orderBy('name','asc')->get();        
        $destinatario = Destinatario::where('account_id',$doccab->account_id)->orderBy('name','asc')->get();                
        
        return view('backend.doccab.doccab_detail',compact('doccab','cuenta','bodega','solicitante','destinatario'));
    }

    public function GetDocumentos ($id)
    {
        $documento = Doccab::join('solicitantes', 'solicitantes.id', '=', 'doccabs.solicitante_id')->where('doccabs.account_id',$id)->orderBy('name','asc')->get(['doccabs.*', 'solicitantes.name as namesolicitante','solicitantes.company_name as companynamesolicitante']); 
        return response()->json($documento);    
    }  
    
    public function GetDocumentosType ($type,$account_id)
    {
  
        $documento = Doccab::join('solicitantes', 'solicitantes.id', '=', 'doccabs.solicitante_id')->where('doccabs.account_id',$account_id)->where('doccabs.type',$type)->orderBy('name','asc')->get(['doccabs.*', 'solicitantes.name as namesolicitante','solicitantes.company_name as companynamesolicitante']); 

        
        return response()->json($documento);    
    }      

    public function GetItemsDoc ($doccab_id,$account_id)
    {
  
        $documento = Docdet::join('productos', 'productos.id', '=', 'docdets.prod_id')->where('productos.account_id',$account_id)->where('doccab_id',$doccab_id)->orderBy('docdets.material_code','asc')->get(); 
  
        return response()->json($documento);    
    }  

    public function GetItemDoc ($prod_id,$account_id)
    {
  
        $documento = Docdet::join('productos', 'productos.id', '=', 'docdets.prod_id')->where('productos.account_id',$account_id)->where('productos.id',$prod_id)->orderBy('docdets.material_code','asc')->get(); 
  
        return response()->json($documento);    
    }  
    


}
 