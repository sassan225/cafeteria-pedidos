<?php
 
namespace App\Http\Requests;
 
use Illuminate\Foundation\Http\FormRequest;
 
class StoreProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        // El acceso por rol lo controla el middleware 'rol' (HU-24)
        return true;
    }
 
    public function rules(): array
    {
        return [
            'categoria_id' => ['required', 'integer', 'exists:categorias,id'],
            'nombre' => ['required', 'string', 'max:100'],
            'descripcion' => ['required', 'string', 'max:500'],
            'precio' => ['required', 'numeric', 'min:0'],
        ];
    }
}
