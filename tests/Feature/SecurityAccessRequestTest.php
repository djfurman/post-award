<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Security\AccessRequest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SecurityAccessRequestTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_returns_an_empty_inbox_when_no_items_are_waiting()
    {
        $item = factory(AccessRequest::class)->create();
        $this->assertCount(1, AccessRequest::all());
        $item->delete();
        $this->assertCount(0, AccessRequest::all());

        $this->get('api/v1/inbox')
            ->assertJson(['result' => ['inbox' => []]]);
    }
}
