<!-- This is blade formatting of the basic php listing below -->

<h1>{{$heading}}</h1>

@if(count($listings) == 0)
    <p>No listings found</p>
@endif

@foreach($listings as $listing)
    <h2>
        <a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a>
    </h2>
    <p>
        {{$listing['description']}}
    </p>
@endforeach

<!-- Below is a simple view that will display a list of listings. It will receive a $heading and $listings variable from the controller. The $heading variable will be used to display the title of the page, and the $listings variable will be used to display the list of listings. -->

<h1><?php //echo $heading; ?></h1>
<?php //foreach ($listings as $listing) : ?>
    <h3><?php //echo $listing['title']; ?></h3>
    <p><?php //echo $listing['description']; ?></p>
<?php //endforeach; ?>