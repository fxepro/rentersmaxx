<?php

namespace Tests\Feature;

use App\Models\WaitlistEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WaitlistTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_stores_a_waitlist_email()
    {
        $response = $this->post('/waitlist', [
            'email'      => 'test@example.com',
            'first_name' => 'Alex',
            'last_name'  => 'Johnson',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('waitlist_emails', ['email' => 'test@example.com']);
    }

    /** @test */
    public function it_assigns_a_ref_on_signup()
    {
        $this->post('/waitlist', ['email' => 'test@example.com']);

        $entry = WaitlistEmail::where('email', 'test@example.com')->first();
        $this->assertNotNull($entry->ref);
        $this->assertStringStartsWith('RMX-', $entry->ref);
    }

    /** @test */
    public function it_does_not_duplicate_on_second_submission()
    {
        $this->post('/waitlist', ['email' => 'test@example.com']);
        $this->post('/waitlist', ['email' => 'test@example.com']);

        $this->assertEquals(1, WaitlistEmail::where('email', 'test@example.com')->count());
    }

    /** @test */
    public function it_rejects_invalid_email()
    {
        $response = $this->post('/waitlist', ['email' => 'not-an-email']);
        $response->assertSessionHasErrors('email');
    }
}
