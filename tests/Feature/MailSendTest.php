<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MailSendTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->postJson('/api/send', ['subject' => 'Test Code Subject', 'message' => "Test code", 'mailTo' => "ibrahimh.cadirci@gmail.com"]);
 
        $response
            ->assertStatus(202)
            ->assertJson([
                "message"       => "Mail gönderildi."
            ]);
    }
}
