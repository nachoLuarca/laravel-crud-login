<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * obtiene todos los productos y los pasa a la vista de listado.
     */
    public function index()
    {
        $products = Product::paginate(10); // ✅ Paginación de 10 productos por página
        return view('products.index', compact('products'));
        
    }

    /**
     * simplemente muestra el formulario para crear.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * valida los datos recibidos, los guarda y redirige
     */
    public function store(Request $request)
    {
         // Validación
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);

        // Crear el producto
        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * muestra los detalles de un producto.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     *  muestra el formulario para editar un producto existente.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     *  valida y actualiza el producto en la base de datos..
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Eliminar producto.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
