<?php

namespace Tests\Unit;

use App\Concert;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConcertTest extends TestCase
{
    /**  @test **/
    public function can_get_formatted_date()
    {
        $concert = factory(Concert::class)->make([
            'date'=> Carbon::parse('2017-01-12 8:00pm')
        ]);

        $this->assertEquals('January 12, 2017', $concert->formatted_date);
    }

     /**  @test **/
     public function can_get_formatted_start_time()
    {
        $concert = factory(Concert::class)->make([
            'date'=> Carbon::parse('2017-01-12 17:00:00')
        ]);

        $this->assertEquals('5:00pm', $concert->formatted_time);
    }

    /**  @test **/
    public function can_get_ticket_price_in_dollars()
    {
          $concert= factory(Concert::class)->make([
              'ticket_price' =>2750
          ]);

          $this->assertEquals('27.50', $concert->ticket_price_in_dollars);
    }
}
