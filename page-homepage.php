<?php
/**
 * Template Name: Homepage
 */
?>

<?php get_header(); ?>

<?php 
$headerbeeld = get_field('headerbeeld');
if( $headerbeeld ) :
?>

<script>
jQuery(document).ready(function(){
	var options = {
	  	strings: ["Plezier in leren...", "vanuit nieuwsgierigheid...", "samen met anderen...", "met een stevige basis."],
	  	typeSpeed: 65,
		loop: true,
	}
	var typed = new Typed("#typen", options);
});
</script>

<section id="headerbeeld-home" class="animated fadeIn" style="background-image: url('<?php echo $headerbeeld['url']; ?>')">
	<div class="container">
		<div class="row">
			<div class="tekst-wrap">
				<div class="col-12">
					<?php if (get_field('headerbeeld_titel')) : ?>
						<div class="typen-wrapper">
							<span class="tekst-wit" id="typen"></span>
						</div>
						<h1 style="display: none;">Stichting Catent</h1>
					<?php endif; ?>
					<?php if (get_field('headerbeeld_tekst')) : ?>
						<h3 class="tekst-wit"><?php the_field('headerbeeld_tekst'); ?></h3>
					<?php endif; ?>
					<?php if (get_field('headerbeeld_button_tekst')) : ?>
						<a href="<?php the_field('headerbeeld_button_link'); ?>" class="button button-rood animated fadeInLeft delay-1s mt-4"><?php the_field('headerbeeld_button_tekst'); ?> <i class="fal fa-long-arrow-right"></i></a>
					<?php endif; ?>
				</div>
				<div class="col-12 center mt-5">
					<div class="scrolldown animated bounceScroll slow infinite">
						<p style="display: block">Scroll</p>
						<i class="far fa-arrow-down"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<section id="intro" class="pt-5 pb-5 vlak-lichtgrijs">
	<div class="container">
		<div class="row">
		<?php
		if( have_rows('intro_blokken') ): $rij = 1;
			while ( have_rows('intro_blokken') ) : the_row(); $rij++; ?>
				<div class="col-12 col-md-6 schuif-omhoog <?php if ($rij % 2 == 0) { echo 'extra-p-r'; } ?>">
					<h3 class="tekst-groen mb-3 mt-3"><?php the_sub_field('blok_titel'); ?></h3>
					<h2 class="tekst-paars"><?php the_sub_field('blok_subtitel'); ?></h2>
					<?php
					if ( get_sub_field('blok_foto') ):
						$hoofdAfbeelding = get_sub_field('blok_foto');
						$size = 'full';
						$afbeeldingID = $hoofdAfbeelding['ID'];
						$afbeelding_alt = $hoofdAfbeelding['alt'];
						$afbeelding_array = wp_get_attachment_image_src($afbeeldingID, $size);
						$afbeelding_url = $afbeelding_array[0];
					?>
					<img src="<?php echo $afbeelding_url; ?>" class="mt-3" alt="<?php echo $afbeelding_alt; ?>" width="100%">
					<?php endif; ?>
					<div class="blok-tekst mt-4">
					<?php the_sub_field('blok_tekst'); ?>
					</div>
					<?php if ( get_sub_field('blok_button_tekst') ): ?>
					<a class="button button-rood mt-2" href="<?php the_sub_field('blok_button_link'); ?>"><?php the_sub_field('blok_button_tekst'); ?> <i class="fal fa-long-arrow-right"></i></a>
					<?php endif; ?>
				</div>
			<?php 
			endwhile;
		endif;
		?>
		</div>
	</div>
</section>

<section id="nieuws" class="pt-5 pb-5 vlak-lichtgrijs">
	<div class="container pb-5">
		<div class="row">
			<div class="col-12 mb-3">
				<h3 class="tekst-groen">Nieuws</h3>
			</div>
			<?php query_posts('posts_per_page=3'); 
			if ( have_posts() ) : 
				while ( have_posts() ) : the_post(); ?>
				<div class="col-12 col-sm-6 col-md-4 col-lg-4 fadeIn wow mt-4">
					<?php
					if ( has_post_thumbnail( $_post->ID ) ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large'); 
					?>
					<a href="<?php the_permalink(); ?>">
						<div class="bg-foto hoef" style="background-image: url('<?php echo $featured_img_url; ?>');">
						</div>
					</a>
					<?php } ?>
					<h5 class="tekst-groen mb-3"><?php the_sub_field('blok_titel'); ?></h5>
					<a href="<?php the_permalink(); ?>"><h5 class="tekst-paars"><?php the_title(); ?></h5></a>
					<div class="blok-tekst mt-4">
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="button button-rood animated fadeInLeft delay-1s mt-2 mb-5">Lees verder <i class="fal fa-long-arrow-right"></i></a>
				</div>
				<?php 
				endwhile;
			endif;
			wp_reset_query();
			?>
		</div>
	</div>
</section>

<?php get_footer(); ?>