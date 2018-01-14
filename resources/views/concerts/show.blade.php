<h1>{{$concert->title}}</h1>
<h2>{{$concert->subtitle}}</h2>
<p>{{$concert->formatted_date}}<p>
<p>Doors at {{$concert->date->format("g:ia")}}<p>
<p>{{$concert->venue}}<p>
<p>{{$concert->venue_address}}<p>
<p>{{$concert->state}}, {{$concert->city}} {{$concert->zip}}<p>
<p>{{number_format($concert->ticket_price/100, 2)}}<p>
<p>{{$concert->additional_information}}<p>
