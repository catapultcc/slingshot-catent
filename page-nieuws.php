<?php
/**
 * Template Name: Nieuws
 */
?>

<?php get_header(); ?>

<div class="barba-container">

<?php 
$headerbeeld = get_field('headerbeeld');
if( $headerbeeld ) :
?>
<section id="headerbeeld-vervolg" class="animated fadeIn" style="background-image: url('<?php echo $headerbeeld['url']; ?>')">
</section>
<?php endif; ?>

<section id="broodkruimels">
    <div class="container mb-4 ">
        <div class="row">
            <div class="col-12 col-sm-6 mt-2 mb-2">
                <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div id="breadcrumbs">','</div>');	} ?>
            </div>
        </div>
    </div>
</section>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
<section id="intro" class="pt-2 pb-2 vlak-wit">
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

<section id="nieuws" class="pt-5 pb-5">
	<div class="container pb-5">
		<div class="row">
			<?php 
			query_posts(
				'posts_per_page=-1'
			); 
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
					<h5 class="tekst-paars"><?php the_title(); ?></h5>
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
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>
	
</div>