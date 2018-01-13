<?php

namespace Browser;

use Carbon\Carbon;
use Tests\TestCase;
use App\Concert;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;


class ViewConcertListingTest extends DuskTestCase
{
    /** @test */
    public function user_can_view_concert_listing()
    {
        $concert = Concert::create([
            'title'                 => 'The Red Chord',
            'subtitle'              => 'with Animosity and Lethargy',
            'date'                  => Carbon::parse('December 13, 2016 8:00pm'),
            'ticket_price'          => 3250,
            'venue'                 => 'The Mosh Pit',
            'venue_address'         => '123 Example Lane',
            'city'                  => 'Laraville',
            'state'                 => 'ON',
            'zip'                   => '17916',
            'additional_information'=> 'For tickets call (0044) 789-345-345',
        ]);

        $this->browse(function ($browser) use($concert) {
            $browser->visit('/concerts/' . $concert->id)
                ->assertSee('The Red Chord');
        });
        // $this;
        // $this->see('with Animosity and Lethargy');
        // $this->see('December 13, 2016 8:00pm');
        // $this->see(3250);
        // $this->see('The Mosh Pit');
        // $this->see('123 Example Lane');
        // $this->see('Laraville');
        // $this->see('ON');
        // $this->see('17916');
        // $this->see('For tickets call (0044) 789-345-345');
    }
}
