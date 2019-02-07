<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php 
	// afbeelding van niuewspagina overnemen 104
	$headerbeeld = get_field('headerbeeld',104);
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

<section id="content">
	<div class="container">
		<div class="row mb-5">
			<div class="col-12">
				<h1><?php the_title(); ?></h1>
			</div>
			<div class="col-12 light">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>

<section id="delen">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p><strong>Deel op social media</strong></p>
				<ul class="delen">
					<li>
						<a href="https://www.facebook.com/sharer.php?u=<?php echo home_url( $wp->request ) ?>" target="_blank">
							<span class="fa-stack fa">
							  <i class="fas fa-circle fa-stack-2x"></i>
							  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
							</span>
						</a> 
					</li>
					<li>
						<a href="http://twitter.com/share?text=Stichting Catent - <?php the_title(); ?>&url=<?php echo home_url( $wp->request ) ?>&hashtags=catent" target="_blank">
							<span class="fa-stack fa">
							  <i class="fas fa-circle fa-stack-2x"></i>
							  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
					<li>
						<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo home_url( $wp->request ) ?>?3&title=Stichting Catent - <?php the_title(); ?>&summary=Stichting Catent - <?php the_title(); ?>" target="_blank">
							<span class="fa-stack fa">
							  <i class="fas fa-circle fa-stack-2x"></i>
							  <i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
					<li>
						<a href="https://api.whatsapp.com/send?text=<?php echo home_url( $wp->request ) ?>" target="_blank">
							<span class="fa-stack fa">
							  <i class="fas fa-circle fa-stack-2x"></i>
							  <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>  