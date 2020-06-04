<?php
/*
* Template Name: Contact template
*/
get_header(); ?>

<div id="bacco_map" style="height: 400px"></div>

<?php
get_template_part( 'partials/content', 'page' );

get_footer();
?>

<script type="text/javascript">
	// Initialize and add the map
	function initMap() {
	  // The location of Uluru
	  var uluru = {lat: 52.081954, lng: 4.289193};
	  // The map, centered at Uluru
	  var map = new google.maps.Map(document.getElementById('bacco_map'), {zoom: 4, center: uluru});
	  // The marker, positioned at Uluru
	  var marker = new google.maps.Marker({position: uluru, map: map});
	}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTkuOvYBBwNzYKsM6Ytbqv5w_WHBRq4R4&callback=initMap"></script>