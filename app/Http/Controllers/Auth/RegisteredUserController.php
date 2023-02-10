<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Cuenta;
use App\Models\Bodega;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $cuenta = Cuenta::orderBy('name')->get();
        //$bodega = Bodega::orderBy('name')->get();
        $bodega = Bodega::join('cuentas', 'bodegas.account_id', '=', 'cuentas.id')              		        
        ->orderBy('bodegas.account_id','asc')->orderBy('bodegas.name','asc')
        ->get(['bodegas.id', 'bodegas.name as namebodega','cuentas.name as namecuenta']);

        return view('auth.register', compact('cuenta','bodega'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string','max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'account_id' => json_encode($request->account_id),
            'warehouse_id' => json_encode($request->warehouse_id),
            'rol' => json_encode($request->rol),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
