<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<main role="main">
	<div class="container">
		<div class="row mt-5 mb-5">
			<div class="col-12 mt-5">
				<br>
				<br>
				<h1><?php the_title(); ?></h1>
			</div>
			<div class="col-12">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>  