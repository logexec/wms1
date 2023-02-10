<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Saldo;

use Auth;   
use Illuminate\Support\Carbon;

class SaldoController extends Controller
{
    public function SaldoAll(){
        
        //$allData = Bodega::orderBy('created_at',f'desc')->orderBy('updated_at','asc')->get();               
        $allData = Saldo::join('cuentas', 'cuentas.id', '=', 'saldos.account_id')              		
                        ->join('bodegas', 'bodegas.id', '=', 'saldos.warehouse_id')              		
                        ->join('ubicacions', 'ubicacions.id', '=', 'saldos.ubic_id')              		
                        ->join('productos', 'productos.id', '=', 'saldos.prod_id')              		
              		->get(['saldos.*', 'cuentas.name as namecuenta', 'productos.name as nameproducto', 'bodegas.name as namebodega', 'ubicacions.name as nameubicacion']);
        return view('backend.saldo.saldo_all', compact('allData'));
    }
}
