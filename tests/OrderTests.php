<?php
use Laravel\Lumen\Testing\DatabaseMigrations;

class OrderTests extends TestCase
{
    use DatabaseMigrations;

    private $uuid;

    public function setUp() : void
    {
        parent::setUp();

        $request = $this->post('/api/orders',
            ['manufacturer' => 'Ford', 'model' => 'Mustang', 'total_price' => '25000']);

        $this->uuid = trim($request->response->decodeResponseJson()->json,'"');
    }

    public function testStoredOrder() : void
    {
        $this->seeInDatabase('orders', ['manufacturer' => 'Ford']);
        $this->seeInDatabase('orders', ['total_price' => '25000']);
        $this->seeInDatabase('orders', ['model' => 'Mustang']);
    }

    public function testPost() : void
    {
        $totalOrders = $this->get('/api/orders');
        $totalOrders->assertNotNull($totalOrders);
        $this->assertEquals(1, count($totalOrders->response->decodeResponseJson()));

        $data = ['manufacturer' => 'Honda', 'model' => 'Civic', 'total_price' => '5000'];
        $request = $this->post('/api/orders', $data);

        $request->assertPostConditions();
        $request->response->assertCreated();
        $request->response->assertStatus(201);
        $request->assertNotNull($request);
        $this->assertNotEmpty($request->response->decodeResponseJson()->json);
        $this->assertIsString($request->response->decodeResponseJson()->json);

        $this->seeInDatabase('orders', ['manufacturer' => 'Honda']);
        $this->seeInDatabase('orders', ['total_price' => '5000']);
        $this->seeInDatabase('orders', ['model' => 'Civic']);

        $totalOrders = $this->get('/api/orders');
        $totalOrders->assertNotNull($totalOrders);
        $this->assertEquals(2, count($totalOrders->response->decodeResponseJson()));

    }

    public function testPut() : void
    {
        $data = ['total_price' => '20000'];
        $request = $this->put("/api/orders/$this->uuid", $data);

        $request->response->assertStatus(200);
        $request->assertNotNull($request);
        $this->assertNotEmpty($request->response->decodeResponseJson()->json);
        $this->assertIsString($request->response->decodeResponseJson()->json);

        $totalOrders = $this->get('/api/orders');
        $totalOrders->assertNotNull($totalOrders);
        $this->assertEquals(1, count($totalOrders->response->decodeResponseJson()));
        $this->seeInDatabase('orders', ['total_price' => '20000']);

    }

}
