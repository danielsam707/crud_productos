<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $request->validate([
            'nombre' => 'required|max:255|min:3',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|numeric',
        ], ['direccion.required' => 'Por favor ingresa una dirección válida',
            'nombre.min' => 'Por favor ingrese solo números en el campo',
    ]);

        Proveedor::create($request->all());

        return redirect()->route('proveedores.index')
        ->with('succes', 'Proveedor creado exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        return view('proveedores.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'direccion' => 'required',
            'telefono' => 'required|integer|min:0',
        ]);

        $proveedor->update($request->all());

        return redirect()->route('proveedores.index')
        ->with('succes', 'Proveedor actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $provedor)
    {
        $provedor->delete();

        return redirect()->route('proveedores.index')
        ->with('succes', 'Proveedor eliminado exitosamente');
    }
}
