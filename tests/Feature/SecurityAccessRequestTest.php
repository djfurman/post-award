<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Carbon;
use App\Security\AccessRequest;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SecurityAccessRequestTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_an_empty_inbox_when_no_items_are_waiting()
    {
        $item = factory(AccessRequest::class)->create();
        $this->assertCount(1, AccessRequest::all());
        $item->delete();
        $this->assertCount(0, AccessRequest::all());

        $this->get('api/v1/inbox')
            ->assertJson(['result' => ['inbox' => []]]);
    }

    /** @test */
    public function it_allows_mass_assignment_for_access_requests()
    {
        $cleanedRequest = factory(AccessRequest::class)->make()->toArray();
        AccessRequest::create($cleanedRequest);
        $this->assertDatabaseHas('access_requests', $cleanedRequest);
    }

    /** @test */
    public function it_tracks_the_request_type_and_does_not_allow_it_to_be_null()
    {
        $requestType = 'Initial';
        factory(AccessRequest::class)->create(['type' => $requestType]);
        $this->assertCount(1, AccessRequest::all());
        $this->assertDatabaseHas('access_requests', ['type' => $requestType]);
        AccessRequest::truncate();

        $requestType = null;
        $this->expectException(QueryException::class);
        factory(AccessRequest::class)->create(['type' => null]);
        $this->assertCount(0, AccessRequest::all());
    }

    /** @test */
    public function it_tracks_the_request_timestamp_and_does_not_allow_it_to_be_null()
    {
        $requestAt = Carbon::now();
        factory(AccessRequest::class)->create(['request_at' => $requestAt]);
        $this->assertDatabaseHas('access_requests', ['request_at' => $requestAt]);

        $requestAt = null;
        $this->expectException(QueryException::class);
        factory(AccessRequest::class)->create(['request_at' => $requestAt]);
    }

    /** @test */
    public function it_tracks_the_requested_system_and_does_not_allow_it_to_be_null()
    {
        $systemRequested = 'Facet Post-Award';
        factory(AccessRequest::class)->create(['system' => $systemRequested]);
        $this->assertDatabaseHas('access_requests', ['system' => $systemRequested]);

        $systemRequested = null;
        $this->expectException(QueryException::class);
        factory(AccessRequest::class)->create(['system' => $systemRequested]);
    }

    /** @test */
    public function it_tracks_the_requested_system_location_and_does_not_allow_it_to_be_null()
    {
        $systemLocation = 'AWS us-east-1';
        factory(AccessRequest::class)->create(['system_location' => $systemLocation]);
        $this->assertDatabaseHas('access_requests', ['system_location' => $systemLocation]);

        $systemLocation = null;
        $this->expectException(QueryException::class);
        factory(AccessRequest::class)->create(['system' => $systemLocation]);
    }
}
