<?php

namespace Tests\Feature;

use Tests\TestCase;

class CartTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testList()
    {
        $response = $this->get('/api/carts');
        $response->assertStatus(200);
    }

    public function testDetail()
    {
        $response = $this->get('/api/carts/1');
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $response = $this->put("/api/carts/1", ['product_id' => 4]);
        $response->assertStatus(200);
    }

    public function testDelete()
    {
        $response = $this->delete("/api/carts/10");
        $response->assertStatus(200);
    }
}
