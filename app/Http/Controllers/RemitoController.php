<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Remito;
use App\Proveedor;

class RemitoController extends Controller
{
  /**
   * Mi remito validator
   *
   */

    private function validation_rules($request) {
      $this->validate($request, [
        'monto_total' => 'numeric|required',
        'fecha_emision' => 'required',
        'proveedor_id' => 'required',
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $remito = new Remito();
        $proveedores = Proveedor::select('id')->get();
        return view('forms.remitoForm', [ 'remito'=>$remito, 'proveedores'=>$proveedores ] );
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

        Remito::create( $request->all() );
        return $this->show($request->proveedor_id);
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
        $remitos = Remito::where( 'proveedor_id', $id )->get();
        return view('remitos', [ 'remitos'=>$remitos ]);
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
        $remito = Remito::where('id', $id)->first();
        $proveedores = Proveedor::select('id')->get();
        return view('forms.remitoForm', [ 'remito'=>$remito, 'proveedores'=>$proveedores ]);
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
        Remito::where('id', $id)->update($request->except('id', '_token', '_method'));
        return $this->show($request->proveedor_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        Remito::where('id', $id)->delete();
        return $this->show($request->proveedor_id);
    }
}
