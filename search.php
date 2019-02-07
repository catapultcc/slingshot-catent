<?php get_header(); ?>

<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 titel-border-zwart">
				<h2>Zoeken</h2>
			</div>
		</div>
		<div class="row" style="background-color:#fff; margin:0;">
			<div class="col-xs-12">
				<h2>Zoekresultaten:  <?php echo the_search_query(); ?> </h2>
			</div>	
			<div class="col-xs-12 searchResults">
			<?php
			if (have_posts()) :
			   while (have_posts()) : the_post();
			?>
				<div class="col-xs-12 no-padding">
					<h3 class="tekst-oranje"><?php the_title(); ?></h3>
					<p><?php the_excerpt(); ?></p>
					<a class="leesmeerSearch button-rood" href="<?php the_permalink(); ?>" >Lees verder</a>
				</div>
				<hr>

			<?php      
			   endwhile;
			endif;
			?>

			</div>

		</div>
	</div>
</section>


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