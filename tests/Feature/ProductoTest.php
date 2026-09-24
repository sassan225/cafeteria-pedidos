<?php

namespace Tests\Feature;

use App\Http\Requests\StoreProductoRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ProductoTest extends TestCase
{
    public function test_validar_campos_obligatorios_y_precio()
    {
        $request = new StoreProductoRequest;
        $validator = Validator::make([], $request->rules());

        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('nombre', $validator->errors()->messages());
        $this->assertArrayHasKey('precio', $validator->errors()->messages());
    }
}
