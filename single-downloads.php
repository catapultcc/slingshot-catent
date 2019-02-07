<?php get_header(); ?>

<section id="headerbeeld-vervolg" class="animated-delay slideInDown" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/headerbeeld-vervolg.jpg'); background-position: center;">
</section>

<section id="intro" class="pt-5 pb-5 vlak-wit">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8">
				<h3 class="tekst-paars pb-1"><?php the_title(); ?></h3>
			</div>
            <div class="col-12 col-md-8">
				<?php the_field('tekstveld'); ?>
			</div>
            <div class="col-12 col-md-8 tekst-rood">
				<?php $file = get_field('bestand'); ?>
                <a href="<?php echo $file['url']; ?>" target="_blank"><i class="fal fa-long-arrow-right mr-2"></i> <?php the_field('buttontekst'); ?></a>
            </div>
			
		</div>
	</div>
</section>

<?php get_footer(); ?>  



