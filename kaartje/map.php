<script>
  function initMap() {
    var image = '<?php echo get_template_directory_uri();?>/images/pin.gif';
    var zwolle = {lat: 52.525349, lng: 6.129694};
    var map = new google.maps.Map(document.getElementById('kaartje'), {
      zoom: 9,
      center: zwolle,
      styles:[  {"featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{"color": "#6f3b8d"}] },
                {"featureType": "landscape", "elementType": "all", "stylers": [{"color": "#f2f2f2"}] },
                {"featureType": "poi", "elementType": "all", "stylers": [{"color": "#dbcfe3"}, {"visibility": "on"}] },
                {"featureType": "road", "elementType": "all", "stylers": [{"saturation": -100}, {"lightness": 45}] },
                {"featureType": "road.highway", "elementType": "all", "stylers": [ { "visibility": "off"}] },
                {"featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{ "visibility": "off" } ] },
                {"featureType": "transit", "elementType": "all", "stylers": [{ "visibility": "off" }] },
                {"featureType": "water", "elementType": "all", "stylers": [ { "color": "#dbcfe3"}, { "visibility": "on" } ] } ]
    });

          
  
<?php
$loop = new WP_Query( array(
    'post_type' => 'Locaties',
    'posts_per_page' => -1
  )
);
$teller = 1;
if ( have_posts() ) : 
    while ( $loop->have_posts() ) : $loop->the_post(); 
        $popup_beeld = get_field('locatie_foto');
?>
        var locatie<?php echo $teller;?> = {lat: <?php echo get_field('locatie_latitude'); ?>, lng: <?php echo get_field('locatie_longitude'); ?>};
        var contentString<?php echo $teller;?> = '<a href="<?php echo get_field('locatie_website'); ?>" target="_blank"><div class="popup-box">'+
            '<div class="popup-foto"><img src="<?php echo $popup_beeld['url']; ?>" width="200"></div>'+
            '<div class="popup-kop vlak-groen tekst-wit"><?php echo addslashes(get_field('locatie_naam')); ?> <i class="fal fa-chevron-right"></i></div>'+
            '</div></a>';
        var infowindow<?php echo $teller;?> = new google.maps.InfoWindow({
            content: contentString<?php echo $teller;?>, 
            padding:0,
        });
        var marker<?php echo $teller;?> = new google.maps.Marker({
            position: locatie<?php echo $teller;?>,
            map: map,
            title: '<?php echo addslashes(get_field('locatie_naam')); ?>',
            icon: image
        });
        marker<?php echo $teller;?>.addListener('click', function() {
        infowindow<?php echo $teller;?>.open(map, marker<?php echo $teller;?>);
        });       
<?php 
      $teller++;
      endwhile; wp_reset_query(); 
endif;      
?>
  
      
  }

</script>

 
