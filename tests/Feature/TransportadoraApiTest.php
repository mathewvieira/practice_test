<?php

namespace Tests\Feature;

use Tests\TestCase;

class TransportadoraApiTest extends TestCase
{
    public function test_can_get_all_transportadoras()
    {
        $response = $this->getJson('/api/transportadoras');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['id', 'nome', 'cnpj', 'status']
        ]);
    }
}
