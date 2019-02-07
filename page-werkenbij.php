<?php
/**
 * Template Name: Werkenbij
 */
?>

<?php get_header(); ?>

<?php 
$headerbeeld = get_field('headerbeeld');
if( $headerbeeld ) :
?>
<section id="headerbeeld-vervolg" class="animated fadeIn" style="background-image: url('<?php echo $headerbeeld['url']; ?>')">
</section>
<?php endif; ?>
   
<section id="broodkruimels">
    <div class="container mb-4">
        <div class="row">
            <div class="col-12 col-sm-6 mt-2 mb-2">
                <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div id="breadcrumbs">','</div>');	} ?>
            </div>
        </div>
    </div>
</section>
    
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
<section id="intro" class="pb-5 vlak-wit">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8">
				<h3 class="tekst-groen"><?php the_title(); ?></h3>
			</div>
			<div class="col-12 col-md-8 mt-2 light">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>
    
    
<div class="achtergrond-wit-blauw">

<section id="nieuws" class="pb-5">
	<div class="container-fluid ">
		<div class="row">
			<!--VAST BLOK VOOR INTERIM POOL -->
			<div class="col-12 col-sm-6 col-md-4 col-lg-4 fadeIn wow mb-2">
				<a href="<?php echo home_url(); ?>/vacatures/interim-pool/">
					<div class="bg-foto hoef" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/Catent_werkenbij_2.jpg');">
						<img src="<?php echo get_template_directory_uri(); ?>/images/Catent_werkenbij_2.jpg" alt="Interim pool" width="100%" style="opacity: 0;">
					</div>
				</a>
				<div class="list-vinkjes px-2 py-4">
					<h5 class="tekst-paars mb-4">Interim pool<br>Stichting Catent</h5>
					<a href="http://maps.google.com/maps?q=52.5253488,6.12969410" target="_blank" class="tekst-rood mb-4 d-inline-block"><i class="fas fa-map-marker-alt mr-2"></i>&nbsp;Zwolle</a>
					<div class="blok-tekst">
						<ul>
						<li>Je bent ambitieus, leergierig, en enthousiast</li>
						<li>Je zoekt verregaande verantwoordelijkheid voor de ontwikkeling van kinderen</li>
						<li>Je wilt een vaste plek om je talenten te laten zien</li>
						<li>Je hebt een flexibele instelling</li>
						<li>Persoonlijke ontwikkeling staat bij jou voorop</li>
						</ul>
					</div>
					<a href="<?php echo home_url(); ?>/vacatures/interim-pool/" class="button button-rood animated fadeInLeft delay-1s mt-2 mb-1">Bekijk vacature <i class="fal fa-long-arrow-right"></i></a>
				</div>
			</div>
			<?php 
			$args_berichten = array (
				'post_type' 		=> 'vacatures',
				'post_status' 		=> 'publish', 
				'posts_per_page' 	=> 3
			);
			$query_berichten = new WP_Query( $args_berichten );

			if ($query_berichten->have_posts()) :
				while ($query_berichten->have_posts()) : $query_berichten->the_post();
            		if (get_field('vacature_zichtbaar_overzicht')) :
                    
						$post_object = get_field('vacature_plaats');

						if( $post_object ):
						$hoofdAfbeelding = get_field('locatie_foto', $post_object->ID); 
						$afbeeldingID = $hoofdAfbeelding['ID'];
						$afbeelding_alt = $hoofdAfbeelding['alt'];
						$afbeelding_array = wp_get_attachment_image_src($afbeeldingID, 'full');
						$afbeelding_url = $afbeelding_array[0];
            ?>
				
				<div class="col-12 col-sm-6 col-md-4 col-lg-4 fadeIn wow mb-2">
                    <a href="<?php the_permalink(); ?>">
						<div class="bg-foto hoef" style="background-image: url('<?php echo $afbeelding_url; ?>');">
							<img src="<?php echo $afbeelding_url; ?>" alt="<?php echo $afbeelding_alt; ?>" width="100%" style="opacity: 0;">
						</div>
					</a>
                    <div class="list-vinkjes px-2 py-4">
                        <h5 class="tekst-paars mb-4">
                            <?php the_title(); ?><br />
                            <?php echo get_the_title($post_object->ID); ?>
                        </h5>
						<a href="http://maps.google.com/maps?q=<?php echo get_field('locatie_latitude',$post_object->ID); ?>,<?php echo get_field('locatie_longitude',$post_object->ID); ?>" target="_blank" class="tekst-rood mb-4 d-inline-block">
							<i class="fas fa-map-marker-alt mr-2"></i>&nbsp;<?php echo get_field('locatie_plaats',$post_object->ID); ?>
						</a>
                        <div class="blok-tekst">
                            <?php echo get_field('vacature_samenvatting') ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="button button-rood animated fadeInLeft delay-1s mt-2 mb-1">Bekijk vacature <i class="fal fa-long-arrow-right"></i></a>
                    </div>
				</div>
						<?php 
                        wp_reset_postdata();
                    	endif;
					endif;
				endwhile;
			endif;
			wp_reset_query();
			?>
		</div>
	</div>
</section>
    

<section id="ervaringen" class="pb-5 ">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6">
                <div class="">
                    <h3 class="tekst-groen mb-3">Ervaringen</h3>
                    <h2 class="tekst-paars col-12 col-md-10 pl-0 mb-2">Dit zeggen onze medewerkers over werken bij Catent</h2>
				</div>
                <div id="ervaringen-slider" class="owl-carousel owl-theme pr-1 pr-md-5">
                    <?php 
                    if( have_rows('werken_bij_ervaringen') ):
                        while ( have_rows('werken_bij_ervaringen') ) : the_row(); 
                            $Afbeelding = get_sub_field('ervaring_foto'); 
                            $afbID = $Afbeelding['ID'];
                            $afbAlt = $Afbeelding['alt'];
                            $afb_array = wp_get_attachment_image_src($afbID, 'medium');
                            $afb_url = $afb_array[0];
                    		?>
                            <div class="item">
								<div class="bg-foto " style="background-image: url('<?php echo $afb_url; ?>');">
									<img src="<?php echo $afb_url; ?>" alt="<?php echo $afbAlt; ?>" class="w-100" width="100%" style="opacity: 0;">
								</div>
                                <div class="p-4 mb-3 vlak-wit">
                                    <?php echo get_sub_field('ervaring_tekst');?>
                                    <strong><?php echo get_sub_field('ervaring_naam');?></strong><br />
                                    <?php echo get_sub_field('ervaring_functie');?>
                                </div>
                            </div>
                    
                    <?php
                        endwhile;
                    endif;
                ?>
                </div>
			</div>
			
            <?php
            if( have_rows('intro_blokken') ): $rij = 1;
                while ( have_rows('intro_blokken') ) : the_row(); $rij++; ?>
                    <div class="col-12 col-md-6 schuif-omhoog <?php if ($rij % 2 == 0) { echo 'extra-p-r'; } ?>">
                        <h3 class="tekst-groen mb-3 "><?php the_sub_field('blok_titel'); ?></h3>
                        <h2 class="tekst-paars mb-2"><?php the_sub_field('blok_subtitel'); ?></h2>
                        <?php
                        if ( get_sub_field('blok_foto') ):
                            $hoofdAfbeelding = get_sub_field('blok_foto');
                            $size = 'full';
                            $afbeeldingID = $hoofdAfbeelding['ID'];
                            $afbeelding_alt = $hoofdAfbeelding['alt'];
                            $afbeelding_array = wp_get_attachment_image_src($afbeeldingID, $size);
                            $afbeelding_url = $afbeelding_array[0];
                        ?>
						<div class="bg-foto " style="background-image: url('<?php echo $afbeelding_url; ?>');">
							<img src="<?php echo $afbeelding_url; ?>" alt="<?php echo $afbeelding_alt; ?>" class="w-100" width="100%" style="opacity: 0;">
						</div>
                        <?php endif; ?>
                        <div class="vlak-wit p-4">
                            <div class="blok-tekst ">
                            <?php the_sub_field('blok_tekst'); ?>
                            </div>
                            <?php if ( get_sub_field('blok_button_tekst') ): ?>
                            <a class="button button-rood mt-2" href="<?php the_sub_field('blok_button_link'); ?>"><?php the_sub_field('blok_button_tekst'); ?> <i class="fal fa-long-arrow-right"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php 
                endwhile;
            endif;
            ?>

		</div>
	</div>
</section>
    
</div>
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>