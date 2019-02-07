<?php get_header(); ?>

<main role="main" class="container">
	<div class="container">
		<div class="row">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="col-12">
				<h1><?php the_title(); ?></h1>
			</div>
			<div class="col-12">
				<?php the_content(); ?>
			</div>
		<?php endwhile; endif; ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>
