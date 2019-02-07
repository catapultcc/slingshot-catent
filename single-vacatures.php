<?php get_header(); ?>

<?php
if ( have_posts() ) : while ( have_posts() ) : the_post(); 

    $teamAfbeelding = get_field('vacature_teamfoto'); 
    $teamafbeeldingID = $teamAfbeelding['ID'];
    $teamafbeelding_alt = $teamAfbeelding['alt'];
    $teamafbeelding_array = wp_get_attachment_image_src($teamafbeeldingID, 'full');
    $teamafbeelding_url = $teamafbeelding_array[0];
 
    $post_object = get_field('vacature_plaats');
                    
    if( $post_object ):

        $hoofdAfbeelding = get_field('locatie_foto', $post_object->ID); 
        $afbeeldingID = $hoofdAfbeelding['ID'];
        $afbeelding_alt = $hoofdAfbeelding['alt'];
        $afbeelding_array = wp_get_attachment_image_src($afbeeldingID, 'full');
        $afbeelding_url = $afbeelding_array[0];
?>

<?php 
$headerbeeld = get_field('headerbeeld');
if( $headerbeeld ) {
?>
<section id="headerbeeld-vervolg" class="animated-delay slideInDown" style="background-image: url('<?php echo $headerbeeld['url']; ?>'); background-position: center;">
</section>
<?php
}
?>

<section id="broodkruimels">
    <div class="container mb-4 ">
        <div class="row">
            <div class="col-12 col-sm-6 mt-2 mb-2">
                <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div id="breadcrumbs">','</div>');	} ?>
            </div>
        </div>
    </div>
</section>

<section id="intro" class="pt-2 vlak-wit">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8">
				<h3 class="tekst-paars pb-1"><?php the_title(); ?></h3>
                <h2 class="tekst-groen pb-3">Vacature</h2>
                <div class="tekst-rood mb-5"><a href="http://maps.google.com/maps?q=<?php echo get_field('locatie_latitude',$post_object->ID); ?>,<?php echo get_field('locatie_longitude',$post_object->ID); ?>" target="_blank">
                    <i class="fas fa-2x fa-map-marker-alt mr-2"></i> <strong class="rem13"><?php echo get_field('locatie_plaats',$post_object->ID); ?>
                    </strong></a></div>
			</div>
            <div class="d-none d-md-block col-md-4 tekst-rood">
                <a href="<?php echo home_url();?>/werken-bij-catent"><i class="fal fa-long-arrow-left mr-2"></i> Terug naar overzicht</a>
            </div>
		</div>
		<div class="row">
            <div class="col-12 col-md-6 list-vinkjes pr-2 pr-md-5">
                <h5 class="tekst-paars pb-3">Jij biedt ons</h5>
                <?php echo get_field('vacature_jij_biedt_ons');?>
            </div>
            <div class="col-12 col-md-6 list-vinkjes pl-2 pl-md-5">
                <h5 class="tekst-paars pb-3">Wij bieden jou</h5>
                <?php echo get_field('vacature_wij_bieden_jou');?>
            </div>
        </div>
        
        <div class="row mb-5">
            <div class="col-12">
                <a href="mailto:info@catent.nl" class="button button-rood animated fadeInLeft delay-1s mt-4">Solliciteer direct <i class="fal fa-long-arrow-right"></i></a>
            </div>
        </div>
        
        <div class="row mb-4">
            <div class="col-12 col-md-6">
                <h5 class="mb-0 pb-0 tekst-paars"><?php if ($post_object->ID != 411) : ?>Dit worden jouw collega's <?php if( get_field('locatie_plaats',$post_object->ID) ) { echo 'in '.get_field('locatie_plaats',$post_object->ID); } endif; ?></h5>
            </div>
            <div class="col-12 col-md-6 tekst-paars text-right">
                <strong class="mr-2"><?php echo $footerafbeelding_url;?> Deel deze vacature </strong>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo home_url( $wp->request ) ?>?3&title=Werken bij Catent - <?php the_title(); ?>&summary=Werken bij Catent - <?php the_title(); ?>" target="_blank">
                    <span class="fa-stack tekst-rood">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                <a href="https://www.facebook.com/sharer.php?u=<?php echo home_url( $wp->request ) ?>" target="_blank">
                    <span class="fa-stack tekst-rood">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                <a href="https://api.whatsapp.com/send?text=<?php echo home_url( $wp->request ) ?>" target="_blank">
                    <span class="fa-stack tekst-rood">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            </div>
        </div>
 	</div>
    <div class="container-fluid">
       <div class="row">
            <div class="col-12 col-md-6 p-0">
                <img src="<?php echo $teamafbeelding_url; ?>" alt="<?php echo $teamafbeelding_alt; ?>" width="100%">
            </div>
            <div class="col-12 col-md-6 p-0">
                <img src="<?php echo $afbeelding_url; ?>" alt="<?php echo $afbeelding_alt; ?>" width="100%">
            </div>
        </div>
    </div>
</section>

<?php 
        wp_reset_postdata();
        endif;
    endwhile;
endif; ?>

<?php get_footer(); ?>  



