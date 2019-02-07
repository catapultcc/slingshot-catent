<?php
/**
 * Template Name: Contact
 */
?>

<?php get_header(); ?>

<?php 
	$headerbeeld = get_field('headerbeeld');
	if( $headerbeeld ) {
	?>
<section id="headerbeeld-vervolg" class="animated-delay slideInDown" style="background-image: url('<?php echo $headerbeeld['url']; ?>')">
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
    

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section id="intro">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8 pb-5">
				<h3 class="tekst-groen mb-3"><?php the_title(); ?></h3>
				<?php the_content(); ?>
			</div>
			<div class="col-12 col-lg-4 pb-5">
				<h3 class="tekst-groen mb-3">Contact Stichting Catent</h3>
				<?php the_field('contactinfo'); ?>
			</div>
		</div>
	</div>
</section>

<?php endwhile; endif; wp_reset_postdata(); ?>
	
<?php get_footer(); ?>
