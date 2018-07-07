<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Proveedor;

class ProveedorController extends Controller
{

  /**
   * Mi proveedor validator
   *
   */

    private function validation_rules($request) {
      $this->validate($request, [
        'direccion' => 'required',
        'fecha_alta' => 'required',
      ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $proveedores = Proveedor::all();
        return view('welcome', [ 'proveedores' => $proveedores ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $proveedor = new Proveedor();
        return view('forms.proveedorForm', [ 'proveedor' => $proveedor] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validation_rules($request);
        Proveedor::create( $request->all() );
        return redirect( route('proveedores') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $proveedor = Proveedor::where('id', $id)->first();
        return view('forms.proveedorForm', [ 'proveedor' => $proveedor ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validation_rules($request);
        Proveedor::where('id', $id)->update($request->except('id', '_token', '_method'));
        return redirect( route('proveedores') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Proveedor::where('id', $id)->delete();
        return redirect( route('proveedores') );
    }
}
