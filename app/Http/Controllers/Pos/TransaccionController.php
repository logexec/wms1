<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Bodega;
use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Doccab;
use App\Models\Tipotransaccion;
use App\Models\Transaccion;
use App\Models\Producto;
use App\Models\Ubicacion;
use App\Models\Saldo;

use Auth;
use Hamcrest\Type\IsNumeric;
use Illuminate\Support\Carbon;

use function PHPUnit\Framework\isNan;

class TransaccionController extends Controller
{
    public function TransaccionAll(){
        
        //$allData = Bodega::orderBy('created_at',f'desc')->orderBy('updated_at','asc')->get(); 
        
         
        $allData = Transaccion::join('cuentas', 'cuentas.id', '=', 'transaccions.account_id')          
                    ->join('tipotransaccions', 'tipotransaccions.id', '=', 'transaccions.tcode_id')          
                    ->join('productos', 'productos.id', '=', 'transaccions.prod_id')          
                    ->join('bodegas', 'bodegas.id', '=', 'transaccions.warehouse_id')          
                    ->join('ubicacions as ori', 'ori.id', '=', 'transaccions.ubic_ori_id')          
                    ->join('ubicacions as des', 'des.id', '=', 'transaccions.ubic_des_id')          
                    ->join('doccabs', 'doccabs.id', '=', 'transaccions.doc_id')                                  		
              		->get(['transaccions.*', 'cuentas.name as namecuenta'
                      , 'tipotransaccions.alphacode as nametipotransaccions'
                      , 'productos.name as nameproductos'
                      , 'bodegas.name as namebodegas'
                      , 'ori.name as nameubicacionsori'
                      , 'des.name as nameubicacionsdes'
                      , 'doccabs.name as namedoccabs',                      
                
                ]);
        return view('backend.transaccion.transaccion_all', compact('allData'));
    }

    public function TransaccionAdd(){
        $tipos = Tipotransaccion::where('account_id', '=', '8')->get();       
        $cuenta = Cuenta::orderBy('name','asc')->get(); 
        
        return view('backend.transaccion.transaccion_add',compact('cuenta','tipos'));
    }

    public function TransaccionStore(Request $request){

        
        $derror = '';
        $terror = 0;

        //VALIDACIONES
        $tcode = explode('-',$request->tcode_id);
        $producto = Producto::findOrFail($request->prod_id);
        $documento = Doccab::findOrFail($request->doc_id);
        $bodega = Bodega::findOrFail($request->warehouse_id);                        
        
        //VALIDA FORMULARIO

            //VALIDACION : INGRESOS
            if( $tcode[0] == '1000' || $tcode[0] == '1001' || $tcode[0] == '1002' ){            
                $ubic_ori_id = $request->ubic_des_id;            
                $ubic_des = Ubicacion::findOrFail($request->ubic_des_id);              
            }else{
                $ubic_des = Ubicacion::findOrFail($request->ubic_des_id);              
                $ubic_ori = Ubicacion::findOrFail($request->ubic_ori_id); 
            }    

            //VALIDACION : LOTE                       
            if( $producto->batch == 'NO' ){
                $batch = '0';
            }else{
                $batch = $request->batch;
                if( trim($batch) == '' || strlen( $batch ) == 0){
                    $terror = 1;
                    $derror .= "Debe indicar el lote del producto";
                }
            }

            //VALIDACION : SERIal                       
            if( $producto->serial == 'NO' ){
                $serial = '0';
            }else{
                $serial = $request->serial;
                if( trim($batch) == '' || strlen( $batch ) == 0){
                    $terror = 1;
                    $derror .= "Debe indicar el serial del producto";
                }
            }        

            //VALIDACION : CANTIDAD                       
            if( $request->qty * 1 == 0 || trim( $request->qty ) == ''  ){
                $terror = 1;
                $derror .= "Debe indicar la cantidad del producto";
            }
        //FIN VALIDA FORMULARIO
        

        //VALIDO STOCK DE ORIGEN PARA SALIDAS, PREPARACIONES O UBICACIONES
        if( $tcode[0] != '1000' && $tcode[0] != '1001' && $tcode[0] != '1002' ){
            
        }

        //VALIDO STOCK DE DESTINO
        if( $tcode[0] == '1000' || $tcode[0] == '1001' || $tcode[0] == '1002'  || $tcode[0] == '1003' ){
           
            $saldo = Saldo::
            where('account_id',$request->account_id)
            ->where('warehouse_id',$request->warehouse_id)
            ->where('prod_id',$request->prod_id)
            ->where('ubic_id',$request->ubic_des_id)
            ->where('batch',$batch)
            ->get(['saldos.id as saldo_id']);   


        }

        //FIN VALIDO TABLA SALDOS

        if($terror == 1){
            $notification = array(
                'message' => $derror, 
                'alert-type' => 'error'
            );
            return redirect()->route('transaccion.add')->with($notification); 
        
        }else{

            Transaccion::insert([
                'account_id' => $request->account_id,            
                'tcode_id' => $tcode[2],
                'prod_id' => $request->prod_id,
                'warehouse_id' => $request->warehouse_id,
                'ubic_ori_id' => $ubic_ori_id,
                'ubic_des_id' => $request->ubic_des_id,
                'doc_id' => $request->doc_id,
                'batch' => $batch,            
                'um' => $request->um,
                'serial' => $serial,                                 
                'qty' => $request->qty,               
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
            
            $notification = array(
                'message' => 'Transacción agregada exitosamente', 
                'alert-type' => 'success'
            );
            //echo "saldo = ". $saldo[0]->saldo_id;
            //var_dump($saldo);
            
            if($saldo->count()==0){
                Saldo::insert([
                    'account_id' => $request->account_id,                                
                    'prod_id' => $request->prod_id,
                    'warehouse_id' => $request->warehouse_id,                    
                    'ubic_id' => $request->ubic_des_id,                    
                    'batch' => $batch,            
                    'um' => $request->um,                                                     
                    'qty' => $request->qty,               
                    'created_by' => Auth::user()->id,
                    'created_at' => Carbon::now(),
                ]);
            }else{
               /* Saldo::findOrFail($saldo[0]->saldo_id)->update([
                                                               
                    'qty' => ' qty + '. $request->qty,               

                ]);*/

                Saldo::find($saldo[0]->saldo_id)->increment('qty',$request->qty);
            }
            return redirect()->route('transaccion.all')->with($notification); 
        }
           
           
       
       
    }


    public function GetTransacciones ($id)
    {
        $data = Transaccion::where('account_id',$id)->orderBy('name','asc')->get(); 
        return response()->json($data);    
    }    
}
