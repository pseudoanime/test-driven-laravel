<?php

namespace Tests\Unit;

use App\Concert;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ConcertTest extends TestCase
{
    use RefreshDatabase;

    /**  @test **/
    public function can_get_formatted_date()
    {
        $concert = factory(Concert::class)->make([
            'date' => Carbon::parse('2017-01-12 8:00pm')
        ]);

        $this->assertEquals('January 12, 2017', $concert->formatted_date);
    }

    /**  @test **/
    public function can_get_formatted_start_time()
    {
        $concert = factory(Concert::class)->make([
            'date' => Carbon::parse('2017-01-12 17:00:00')
        ]);

        $this->assertEquals('5:00pm', $concert->formatted_time);
    }

    /**  @test **/
    public function can_get_ticket_price_in_dollars()
    {
        $concert = factory(Concert::class)->make([
            'ticket_price' => 2750
        ]);

        $this->assertEquals('27.50', $concert->ticket_price_in_dollars);
    }

    /**  @test **/
    public function concerts_with_published_at_fields_are_published()
    {
        $published_concerts = factory(Concert::class, 2)->states('published')->create();

        $unpublished_concerts = factory(Concert::class)->states('unpublished')->create();

        $concerts = Concert::published()->get();

        foreach ($published_concerts as $key => $published_concert) {
            $this->assertTrue($concerts->contains($published_concert));
        }

        $this->assertFalse($concerts->contains($unpublished_concerts));
    }
}
