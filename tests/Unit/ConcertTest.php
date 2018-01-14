<?php

namespace Tests\Unit;

use App\Concert;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConcertTest extends TestCase
{
    use RefreshDatabase;

    /**  @test **/
    public function can_get_formatted_date()
    {
        $concert = factory(Concert::class)->create([
            'date'=> Carbon::parse('2017-01-12 8:00pm')
        ]);

        $date = $concert->formatted_date;

        $this->assertEquals('January 12, 2017', $date);
    }
}
