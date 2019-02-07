<?php
/**
 * Template Name: Vervolg
 */
?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php 
if(get_field('headerbeeld')) :
    $headerbeeld = get_field('headerbeeld');
    $agheader = $headerbeeld['url'];
else : 
    $agheader = get_template_directory_uri().'/images/headerbeeld-vervolg.jpg';
endif;

if( $agheader ) : ?>
<section id="headerbeeld-vervolg" class="animated-delay slideInDown" style="background-image: url('<?php echo $agheader; ?>')"></section>
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

<section id="intro" class="vlak-wit">
	<div class="container">
		<div class="row pb-5">
			<div class="col-12 col-md-8">
				<h3 class="tekst-groen mb-3"><?php the_title(); ?></h3>
			</div>
			<div class="col-12 col-md-8 light">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-12 pb-5">
				<?php if( get_field('documenten') ):
				echo "<p>Bekijk hieronder de beschikbare documenten</p>";
				if( have_rows('documenten') ):
					while ( have_rows('documenten') ) : the_row(); 
						$post_object_doc = get_sub_field('bestand');
						$file = get_field('bestand',$post_object_doc->ID); ?>
						<a href="<?php echo $file['url']; ?>" target="_blank"><i class="fal fa-long-arrow-right mr-2"></i> <?php echo get_the_title($post_object_doc->ID); ?></a>
					<?php 
					endwhile;
				endif;
				wp_reset_postdata(); 
				endif; ?>
			</div>
		</div>
	</div>
</section>

<?php if(is_page(array('over-catent', 'voor-ouders', 'praktische-informatie'))) : ?>
<section id="downloads" class="pb-5 achtergrond-wit-blauw">
	<div class="container">
		<div class="row">
			<div class="col-12 mb-4">
				<h3 class="tekst-paars">Documenten</h3>
			</div>
			 <?php 
				if( have_rows('blokken') ):
					while ( have_rows('blokken') ) : the_row(); 
						$post_object = get_sub_field('pagina');
						?>
				<div class="col-12 col-md-6 fadeIn wow mb-5">
					<div class="row">
						<div class="col-12 center mb-3">
							<?php
							if (has_post_thumbnail( $post_object->ID ) ):
								$featured_img_url = get_the_post_thumbnail_url($post_object->ID,'medium'); 
							?>
							<a href="<?php the_permalink($post_object->ID); ?>">
								<div class="download-header-bg hoef" style="background-image: url('<?php echo $featured_img_url; ?>');">
									<img src="<?php echo $featured_img_url; ?>" alt="<?php echo get_the_title($post_object->ID); ?>" class="w-100" width="100%" style="opacity: 0;">
								</div>
							</a>
							<?php else : ?>
							<div class="download-header">
								<i class="fal fa-file"></i>
							</div>
							<?php endif; ?>
						</div>
						<div class="col-12">
							<h5><?php echo get_the_title($post_object->ID); ?></h5>
						</div>
						<div class="col-12 mb-3">
							<?php echo get_field('samenvatting',$post_object->ID); ?>
						</div>
						<div class="col-12 download-opsomming">
							<?php if ( !empty( get_post_field('post_content', $post_object->ID)) ) : ?>
							<a href="<?php the_permalink($post_object->ID); ?>"><i class="fal fa-long-arrow-right mr-2 "></i> Meer info</a>
							<?php else : ?>
								<?php if( get_field('documenten',$post_object->ID) ) {
									echo "<p>Bekijk hieronder de beschikbare documenten</p>";
									if( have_rows('documenten',$post_object->ID) ):
										while ( have_rows('documenten',$post_object->ID) ) : the_row(); 
											$post_object_doc = get_sub_field('bestand');
											$file = get_field('bestand',$post_object_doc->ID); ?>
											<a href="<?php echo $file['url']; ?>" target="_blank"><i class="fal fa-long-arrow-right mr-2"></i> <?php echo get_the_title($post_object_doc->ID); ?></a>
										<?php 
										endwhile;
									endif;
									wp_reset_postdata(); 
									} 
								else { ?>
									<a href="<?php the_permalink($post_object->ID); ?>"><i class="fal fa-long-arrow-right mr-2 "></i> Meer info</a>
								<?php } ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php
					endwhile;
				endif;
				wp_reset_postdata(); 
				?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>
