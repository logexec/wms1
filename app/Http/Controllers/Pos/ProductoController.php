<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Producto;

use Auth;   
use Illuminate\Support\Carbon;

class ProductoController extends Controller
{
    public function ProductoAll(){
        
        //$allData = Bodega::orderBy('created_at',f'desc')->orderBy('updated_at','asc')->get();               
        $allData = Producto::join('cuentas', 'cuentas.id', '=', 'productos.account_id')              		
              		->get(['productos.*', 'cuentas.name as namecuenta']);
        return view('backend.producto.producto_all', compact('allData'));
    }

    public function ProductoAdd(){
        $cuenta = Cuenta::orderBy('name','asc')->get(); 
        $producto = Producto::orderBy('name','asc')->get();        
        return view('backend.producto.producto_add',compact('producto','cuenta'));
    }

    public function ProductoStore(Request $request){
        Producto::insert([
            'account_id' => $request->account_id,
            'name' => $request->name,
            'barcode' => $request->barcode,
            'type_barcode' => $request->type_barcode,
            'sdescription' => $request->sdescription,
            'description' => $request->description,
            'um_default' => $request->um_default,
            'specifications' => $request->specifications,
            'weight' => $request->weight,
            'um_weight' => $request->um_weight,
            'volume' => $request->volume,
            'um_volume' => $request->um_volume,
            'width' => $request->width,
            'um_width' => $request->um_width,
            'high' => $request->high,
            'um_high' => $request->um_high,
            'long' => $request->long,
            'um_long' => $request->um_long,
            'category' => $request->category,
            'subcategory' => $request->subcategory,
            'sref1' => $request->sref1,
            'sref2' => $request->sref2,
            'sref3' => $request->sref3,
            'nref1' => $request->nref1,
            'nref2' => $request->nref2,
            'nref3' => $request->nref3,
            'units_box' => $request->units_box,
            'units_pallet' => $request->units_pallet,
            'inventory_days' => $request->inventory_days,         
            'serial' => $request->serial,
            'batch' => $request->batch,
            'status' => $request->status,               
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Producto agregado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('producto.all')->with($notification); 
    }

    public function ProductoEdit($id){
        $cuenta = Cuenta::orderBy('name','asc')->get();
        $producto = Producto::findOrFail($id);
        return view('backend.producto.producto_edit',compact('producto','cuenta'));
    }

    public function ProductoUpdate(Request $request){

        $producto_id = $request->id;

        Producto::findOrFail($producto_id)->update([
            'name' => $request->name,
            'barcode' => $request->barcode,
            'type_barcode' => $request->type_barcode,
            'sdescription' => $request->sdescription,
            'description' => $request->description,
            'um_default' => $request->um_default,
            'specifications' => $request->specifications,
            'weight' => $request->weight,
            'um_weight' => $request->um_weight,
            'volume' => $request->volume,
            'um_volume' => $request->um_volume,
            'width' => $request->width,
            'um_width' => $request->um_width,
            'high' => $request->high,
            'um_high' => $request->um_high,
            'long' => $request->long,
            'um_long' => $request->um_long,
            'category' => $request->category,
            'subcategory' => $request->subcategory,
            'sref1' => $request->sref1,
            'sref2' => $request->sref2,
            'sref3' => $request->sref3,
            'nref1' => $request->nref1,
            'nref2' => $request->nref2,
            'nref3' => $request->nref3,
            'units_box' => $request->units_box,
            'units_pallet' => $request->units_pallet,
            'inventory_days' => $request->inventory_days,                        
            'status' => $request->status,
            'serial' => $request->serial,
            'batch' => $request->batch,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Producto actualizado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('producto.all')->with($notification); 
    }    

    public function ProductoDelete($id){
        Producto::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Producto eliminado exitosamente', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function GetProductos ($id)
    {
        $producto = Producto::where('productos.account_id',$id)->orderBy('name','asc')->get(); 
        
        
        return response()->json($producto);    
        
    }    

    public function GetProducto ($id)
    {
        $producto = Producto::findOrFail($id);        
        return response()->json($producto);    
    }    
}
