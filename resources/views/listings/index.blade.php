<x-layout>

@include('partials._hero')
@include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @unless(count($listings) == 0)

        @foreach($listings as $listing)
            <x-listing-card :listing="$listing" />
        @endforeach

        @else
        <p>No listings found</p>
        @endunless


    </div>
</x-layout>

<!-- Below is a simple view that will display a list of listings. It will receive a $heading and $listings variable from the controller. The $heading variable will be used to display the title of the page, and the $listings variable will be used to display the list of listings. -->

<h1><?php //echo $heading; 
    ?></h1>
<?php //foreach ($listings as $listing) : 
?>
<h3><?php //echo $listing['title']; 
    ?></h3>
<p><?php //echo $listing['description']; 
    ?></p>
<?php //endforeach; 
?>