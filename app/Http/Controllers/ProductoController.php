<?php
 
namespace App\Http\Controllers;
 
use App\Http\Requests\StoreProductoRequest;
use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
 
class ProductoController extends Controller
{
    public function index(): View
    {
        $productos = Producto::with('categoria')
            ->orderBy('nombre')
            ->paginate(10);
 
        return view('productos.index', compact('productos'));
    }
 
    public function store(StoreProductoRequest $request): RedirectResponse
    {
        Producto::create($request->validated());
 
        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto registrado correctamente.');
    }
 
    // create(), show(), edit(), update() y destroy() siguen el mismo patrón
}
