<?php

namespace Tests\Unit;

use App\Concert;
use Carbon\Carbon;
use Tests\TestCase;

class ConcertTest extends TestCase
{
    /**  test **/
    public function can_get_formatted_date()
    {
        $concert = factory(Concert::class)->create([
            'date'=> Carbon::parse('2017-01-12 8:00pm')
        ]);

        $date = $concert->formatted_date;

        $this->assertEquals('December 13, 2017', $date);
    }
}
