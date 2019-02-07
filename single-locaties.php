<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php 
$headerbeeld = get_field('locatie_foto');
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

<section id="intro" class="pt-2 pb-2 vlak-wit">
	<div class="container">
		<div class="row mb-5">
			<div class="col-12 col-md-8">
				<h3 class="tekst-groen"><?php the_title(); ?></h3>
			</div>
			<div class="col-12 col-md-8 mt-2 light">
				<?php the_field('locatie_omschrijving'); ?>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-12 col-md-4">
				<h5 class="tekst-paars mb-4">Adresgegevens</h5>
				<?php the_field('locatie_adres'); ?><br>
				<?php the_field('locatie_postcode'); ?><br>
				<a href="https://www.google.nl/maps?q=<?php the_field('locatie_latitude'); ?>,<?php the_field('locatie_longitude'); ?>" target="_blank"><i class="fas fa-map-marker-alt mr-2"></i> <?php the_field('locatie_plaats'); ?></a><br>
				
				<?php if( get_field('locatie_schoolgids') || get_field('locatie_schoolplan') ): ?>
				<h5 class="tekst-paars mb-4 mt-5">Downloads</h5>
				<a href="<?php the_field('locatie_schoolgids'); ?>" target="_blank"><i class="fas fa-file mr-2"></i> Schoolgids</a><br>
				<a href="<?php the_field('locatie_schoolplan'); ?>" target="_blank"><i class="fas fa-file mr-2"></i> Schoolplan</a>
				<?php endif; ?>
			</div>
			<div class="col-12 col-md-8">
				<h5 class="tekst-paars mb-4">Contactgegevens</h5>
				<?php the_field('locatie_telefoonnummer'); ?><br>
				<?php the_field('locatie_e-mailadres'); ?><br>
				<a href="<?php the_field('locatie_website'); ?>" target="_blank"><?php echo antispambot(get_field('locatie_website')); ?></a>
				
				<?php
				if ( get_sub_field('locatie_directeur_foto') ):
					$hoofdAfbeelding = get_sub_field('locatie_directeur_foto');
					$size = 'full';
					$afbeeldingID = $hoofdAfbeelding['ID'];
					$afbeelding_alt = $hoofdAfbeelding['alt'];
					$afbeelding_array = wp_get_attachment_image_src($afbeeldingID, $size);
					$afbeelding_url = $afbeelding_array[0];
				?>
				<img class="rounded-circle w-100" src="<?php echo $afbeelding_url; ?>" alt="<?php echo $afbeelding_alt; ?>">
				<?php endif; ?>
				<?php if( get_field('locatie_directeur_naam') ): ?>
				<?php the_field('locatie_directeur_naam'); ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="row mb-5">
			
		</div>
	</div>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>  



