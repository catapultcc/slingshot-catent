<?php
/**
 * Template Name: Toekomstvisie
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

<section id="intro" class="vlak-wit mb-3">
	<div class="container">
		<div class="row pb-5">
			<div class="col-12 col-md-6 mb-3">
				<h3 class="tekst-groen mb-3"><?php the_title(); ?></h3>
				<?php the_content(); ?>
                <a id="introLeesmeer" href="javascript:void(0);" class="button button-rood mt-2 mb-5" style="display: inline;">
                    Lees meer <i class="fal fa-long-arrow-right"></i>
                </a>
            </div>
			<div class="col-12 col-md-6">
                <div style="position:relative;padding-top:56.25%;">
                    <iframe src="https://www.youtube.com/embed/<?php the_field('intro_video'); ?>?rel=0&amp;showinfo=0&amp;controls=0" frameborder="0" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                </div>
			</div>
		</div>
	</div>
	<div id='intro-leesmeer' class="container" style="display:none">
		<div class="row pb-5">
			<div class="col-12 ">
				<?php the_field('intro_leesmeer'); ?>
            </div>
		</div>
	</div>
</section>


<section id="visiepunten" class="pb-5 achtergrond-wit-blauw">
	<div class="container">
		<div class="row">
			
			<?php
			$args = array(
				'post_type'      => 'toekomstvisie',
				'posts_per_page' => -1,
				'post_parent'    => 667,
				'order'          => 'ASC',
				'orderby'        => 'menu_order'
			 );

			$parent = new WP_Query( $args );

			if ( $parent->have_posts() ) : ?>

				<?php $parentTeller = 0;  $teller = 0; while ( $parent->have_posts() ) : $parent->the_post(); $parentTeller ++; ?>
				<div class="col-12 col-lg-6 mb-5">
					<div class="row">
						<div class="col-12">
						<?php
						if ( get_field('afbeelding') ):
							$hoofdAfbeelding = get_field('afbeelding');
							$size = 'full';
							$afbeeldingID = $hoofdAfbeelding['ID'];
							$afbeelding_alt = $hoofdAfbeelding['alt'];
							$afbeelding_array = wp_get_attachment_image_src($afbeeldingID, $size);
							$afbeelding_url = $afbeelding_array[0];
						?>
						<img src="<?php echo $afbeelding_url; ?>" class="mb-4" alt="<?php echo $afbeelding_alt; ?>" width="100%">
						<?php endif; ?>
						</div>
						<div class="col-12">
							<span class="fa-stack fa-2x tekst-paars float-left icon-before">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fal fa-long-arrow-right fa-stack-1x fa-inverse"></i>
							</span>
							<h2 class="tekst-paars kernwaarde-kop"><?php the_title(); ?></h2>
						</div>
						<div class="col-12">
							<div class="accordion" id="accordion-visie-<?php echo $parentTeller; ?>">
							<?php
							if( have_rows('kernwaarden') ): 
								while ( have_rows('kernwaarden') ) : the_row(); $teller ++; ?>
									  <div class="card">
										<div class="card-header" id="heading<?php echo $teller; ?>">
											<button class="btn-link collapsed tekst-rood rem12" type="button" data-toggle="collapse" data-target="#collapse<?php echo $teller; ?>" aria-expanded="false" aria-controls="collapse<?php echo $teller; ?>"><?php the_sub_field('titel'); ?></button>
										</div>
										<div id="collapse<?php echo $teller; ?>" class="collapse" aria-labelledby="heading<?php echo $teller; ?>" data-parent="#accordion-visie-<?php echo $parentTeller; ?>">
										  <div class="card-body">
											<?php the_sub_field('tekst'); ?>
											  <?php if( get_sub_field('quote') ): ?>
											  <div class="quote">
											  		<span class="tekst-paars rem12" style="font-weight: bold;"><i class="fas fa-quote-right tekst-paars"></i> <?php the_sub_field('quote'); ?></span><br>
												  <span class="tekst-paars rem10"><?php the_sub_field('quote_naam'); ?></span>
											  </div>
											  <?php endif; ?>
										  </div>
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
				<?php endwhile; ?>

			<?php endif; wp_reset_postdata(); ?>
			
		</div>
	</div>
</section>

<section id="afsluiter" class="vlak-wit pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-10">
				<p>Om het hiervoor genoemde te kunnen realiseren werken we aan een centrale opdracht, <br class="d-none d-md-inline">die we samen oppakken:</p>
				<h2 class="tekst-paars kernwaarde-kop">Brede inzet op voldoende, <br class="d-none d-md-inline">gekwalificeerde professionals</h2>
				<p>Het lijkt zo vanzelfsprekend dat voldoende en gekwalificeerde professionals voorwaardelijk zijn om de kwaliteit waar we voor staan, te kunnen leveren en te kunnen garanderen, om zo onze visie uit te dragen en in het primaire proces uit te voeren. Dit vraagt echter van àllen die werkzaam zijn bij Catent, op één van onze scholen of op het bestuurskantoor, bijzondere aandacht, inzet en enthousiasme. We zijn samen verantwoordelijk voor het gezond houden van Catent, van onze collega’s én van onszelf. Daarmee stralen we uit dat Catent een professionele en aantrekkelijke werkgever is en blijft. Voor ons en voor onze toekomstige collega’s. We maken werk van het actief en creatief werven van nieuwe collega’s, vanuit een wervingsstrategie die aansluit bij deze tijd, met de inzet van eigentijdse middelen, en in alle fasen van werving tot aanname staat onze nieuwe collega centraal, persoonlijk contact is daarbij essentieel.</p>
				<p>We laten ZIEN dat plezier in leren... vanuit nieuwsgierigheid... samen met anderen... op een stevige basis, inspirerend is voor IEDERE professional.</p>
			</div>
		</div>
	</div>
</section>


<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>
