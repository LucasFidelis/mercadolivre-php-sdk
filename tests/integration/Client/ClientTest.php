<?php

use LucasFidelis\MercadoLivreSdk\Client\Client;

use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase {
  public function testCanBeCreated(): void {
    $client = new Client(CLIENT_ID, CLIENT_SECRET, ACCESS_TOKEN, REFRESH_TOKEN);
    $this->assertInstanceOf(Client::class, $client);
  }
}