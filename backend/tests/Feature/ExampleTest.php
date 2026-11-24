<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_la_aplicacion_arranca_correctamente(): void
    {
        $response = $this->get('/up');

        $response->assertStatus(200);
    }

    public function test_las_rutas_desconocidas_de_la_api_responden_en_json(): void
    {
        $response = $this->get('/api/ruta-inexistente');

        $response->assertNotFound()->assertHeader('Content-Type', 'application/json');
    }
}
