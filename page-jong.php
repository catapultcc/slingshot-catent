<?php
/**
 * Template Name: Jong Catent
 */
?>

<?php get_header(); ?>
<?php //if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php 
$headerbeeld = get_field('headerbeeld');
if( $headerbeeld ) :
?>
<section id="headerbeeld-vervolg" class="animated fadeIn" style="background-image: url('<?php echo $headerbeeld['url']; ?>')">
</section>
<?php endif; ?>
   
<section id="broodkruimels">
    <div class="container mb-4">
        <div class="row">
            <div class="col-12 col-sm-6 mt-2 mb-2">
                <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div id="breadcrumbs">','</div>');	} ?>
            </div>
        </div>
    </div>
</section>	
<section id="intro" class="pb-5 vlak-wit">
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
<section id="slider-jong-catent" class="pb-5 ">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div id="jong-slider" class="owl-carousel owl-theme pr-md-5">
					<?php 
					if( have_rows('jong_slider') ):
						while ( have_rows('jong_slider') ) : the_row(); 
						$hoofdAfbeelding = get_sub_field('afbeelding_slide');
						$size = 'full';
						$afbeeldingID = $hoofdAfbeelding['ID'];
						$afbeelding_alt = $hoofdAfbeelding['alt'];
						$afbeelding_array = wp_get_attachment_image_src($afbeeldingID, $size);
						$afbeelding_url = $afbeelding_array[0];
					?>
							<div class="item">
								<img src="<?php echo $afbeelding_url; ?>" alt="<?php echo $afbeelding_alt; ?>" width="100%">
							</div>
						<?php
						endwhile;
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</section>
    
<div class="achtergrond-wit-blauw">   
	<section id="ervaringen" class="pb-5 ">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6 schuif-omhoog <?php if ($rij % 2 == 0) { echo 'extra-p-r'; } ?>">
                        <h3 class="tekst-groen mb-3 ">Young professional?</h3>
                        <h2 class="tekst-paars mb-2">Word onderdeel van Jong Catent: dé kickstart van je carrière!</h2>
						<div class="bg-foto" style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2019/01/Jong-Catent-Teamfoto-Large.jpg');">
							<img src="<?php echo home_url(); ?>/wp-content/uploads/2019/01/Jong-Catent-Teamfoto-Large.jpg" alt="Word onderdeel van Jong Catent" class="w-100" width="100%" style="opacity: 0;">
						</div>
                        <div class="vlak-wit p-4">
                            <div class="blok-tekst ">
                            	Ben jij de “young professional” die zich bij Catent wilt aansluiten? Word je graag uitgedaagd? Ben je nieuwsgierig naar anderen én naar onderwijskundige vernieuwingen? Wil je zelf ook leren? Meld je aan voor Jong Catent, en maak samen met leeftijdgenoten een mooie ontwikkeling door, waarbij plezier in ontwikkelen, vanuit nieuwsgierigheid voorop staat
                            </div>
                        </div>
                    </div>
				<div class="col-12 col-md-6">
					<div class="mb-3">
						<h3 class="tekst-groen">Ervaringen</h3>
						<h2 class="tekst-paars col-12 col-md-8 pl-0">Dit zeggen onze jonge professionals over Catent</h2>
					</div>
					<div id="ervaringen-slider" class="owl-carousel owl-theme pr-1 pr-md-5">
						<?php 
						if( have_rows('werken_bij_ervaringen') ):
							while ( have_rows('werken_bij_ervaringen') ) : the_row(); 
								$Afbeelding = get_sub_field('ervaring_foto'); 
								$afbID = $Afbeelding['ID'];
								$afbAlt = $Afbeelding['alt'];
								$afb_array = wp_get_attachment_image_src($afbID, 'full');
								$afb_url = $afb_array[0];
								?>

								<div class="item">
									<div class="bg-foto" style="background-image: url('<?php echo $afb_url; ?>');">
										<img src="<?php echo $afb_url; ?>" alt="<?php echo $afbAlt; ?>" class="w-100" width="100%" style="opacity: 0;">
									</div>
									<div class="p-4 mb-3 vlak-wit">
										<?php echo get_sub_field('ervaring_tekst');?>
										<strong><?php echo get_sub_field('ervaring_naam');?></strong><br />
										<?php echo get_sub_field('ervaring_functie');?>
									</div>
								</div>

							<?php
							endwhile;
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
	

<?php //endwhile; endif; ?>
<?php get_footer(); ?>