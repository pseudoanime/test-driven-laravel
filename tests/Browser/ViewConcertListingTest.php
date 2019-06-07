<?php

namespace Browser;

use App\Concert;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class ViewConcertListingTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_can_view_concert_listing()
    {
        $concert = factory(Concert::class)->create();

        $this->browse(function ($browser) use ($concert) {
            $browser->visit('/concerts/' . $concert->id)
                ->assertSee($concert->title)
                ->assertSee($concert->subtitle)
                ->assertSee($concert->date->format('F j, Y'))
                ->assertSee($concert->date->format('g:ia'))
                ->assertSee(number_format($concert->ticket_price / 100, 2))
                ->assertSee($concert->venue)
                ->assertSee($concert->venue_address)
                ->assertSee($concert->state . ', ' . $concert->city . ' ' . $concert->zip)
                ->assertSee($concert->additional_information);
        });
    }

    /**  @test **/
    public function user_cannot_view_unpublished_concerts()
    {
        $concert = factory(Concert::class)->create([
            'published_at' => null
        ]);;

        $this->get("/concerts/{$concert->id}")
            ->assertStatus(404);
    }
}
