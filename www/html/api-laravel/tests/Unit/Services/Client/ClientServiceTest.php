<?php

namespace Tests\Unit\Services\Client;

use App\Models\Client;
use App\Repositories\Client\ClientRepository;
use App\Services\Client\ClientService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientServiceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @var ClientRepository
     */
    private $clientRepository;

    /**
     * @var ClientService
     */
    private $clientService;

    protected function setUp(): void
    {
        parent::setUp();

        // Set up the dependencies
        $this->clientRepository = new ClientRepository(new Client());
        $this->clientService = new ClientService($this->clientRepository);
    }

    public function testCreateClient()
    {
        // Create test data
        $data = [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
        ];

        // Create a new instance of the Client factory
        $clientFactory = Factory::factoryForModel(Client::class);

        // Create a new Client using the factory
        $client = $clientFactory->create($data);

        // Call the method being tested
        $result = $this->clientService->createClient($data);

        // Assert the result
        $this->assertInstanceOf(Client::class, $result);
        $this->assertDatabaseHas('clients', $data);
    }

    public function testGetClient()
    {
        // Create a test client
        $client = Client::factory()->create();

        // Call the method being tested
        $result = $this->clientService->getClient($client->id);

        // Assert the result
        $this->assertInstanceOf(Client::class, $result);
        $this->assertEquals($client->id, $result->id);
    }

    public function testGetAllClients()
    {
        // Create test clients
        $clients = Client::factory()->count(5)->create();

        // Call the method being tested
        $result = $this->clientService->getAllClients();

        // Assert the result
        $this->assertInstanceOf(Client::class, $result->first());
        $this->assertCount(5, $result);
    }

    public function testUpdateClient()
    {
        // Create a test client
        $client = Client::factory()->create();

        // Update the client data
        $data = [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
        ];

        // Call the method being tested
        $result = $this->clientService->updateClient($client->id, $data);

        // Assert the result
        $this->assertInstanceOf(Client::class, $result);
        $this->assertDatabaseHas('clients', array_merge(['id' => $client->id], $data));
    }
}
