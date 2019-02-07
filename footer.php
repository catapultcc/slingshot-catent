<footer>
    <div class="contact-footer">
        <div class="container-fluid"> 
            <div class="row row-eq-height">
                <div class="col-12 col-md-6 tekst-wit pt-5 pb-5 vlak-paars text-right" >
                   
                    <?php 
					if (is_singular( 'vacatures' )) {
					$post_object = get_field('vacature_plaats');
					
					if( $post_object ):
						$footerAfbeelding = get_field('locatie_directeur_foto', $post_object->ID);
						$footerafbeeldingID = $footerAfbeelding['ID'];
						$footerafbeelding_alt = $footerAfbeelding['alt'];
						$footerafbeelding_array = wp_get_attachment_image_src($footerafbeeldingID, 'thumbnail');
						$footerafbeelding_url = $footerafbeelding_array[0];

						$locatieDirecteurNaam = get_field('locatie_directeur_naam', $post_object->ID); 
						$locatieTelefoon = get_field('locatie_telefoonnummer', $post_object->ID); 
						$locatieEmail = get_field('locatie_e-mailadres', $post_object->ID); 
						wp_reset_postdata();
					endif;
					?>
                    
                    <div class="ml-auto text-center" style="max-width:500px">
                        <div class="row mb-3">
                            <div class="col-12 col-md-8 text-center">
                                <div class="col-6 col-sm-4 animated fadeInLeft wow mx-auto">
                                    <img class="rounded-circle w-100" src="<?php echo $footerafbeelding_url; ?>" alt="<?php echo $footerafbeelding_alt; ?>" >
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-12 col-md-8">
                                <h6 class=" tekst-groen mb-3 text-center">Meer weten over deze vacature?</h6>
                                <h2 class=" light text-center">Neem gerust contact op met <?php echo $locatieDirecteurNaam;?></h2>

                                <div class="col-12 mb-4 text-center">
                                    <a href="tel:<?php echo str_replace(' ','',$locatieTelefoon) ;?>" target="_blank">
                                        <span class="fa-stack tekst-rood">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-phone fa-stack-1x fa-inverse"></i>
                                        </span><br />
                                        <?php echo $locatieTelefoon ;?>
                                    </a>
                                </div>
                                <div class="col-12 mb-4 text-center">
                                    <a href="mailto: <?php echo antispambot($locatieEmail); ?>" target="_blank">
                                        <span class="fa-stack tekst-rood">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
                                        </span><br />
                                        <?php echo antispambot($locatieEmail); ?>
                                    </a>
                                </div>
                                <div class="col-12">
                                    <a href="<?php the_field('headerbeeld_button_link'); ?>" class="button button-rood animated fadeInLeft delay-1s mt-4">Solliciteer direct <i class="fal fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php } else { ?>
                    
                    <div class="ml-auto text-left" style="max-width:500px">
                        <div class="row mb-3">
                            <div class="col-6 col-sm-4 animated fadeInLeft wow">
								<?php if( get_field('contact_afbeelding') ): $pagina_id = get_the_ID(); else : $pagina_id = (int)get_option( 'page_on_front' ); endif; ?>
                                    <?php $contact_foto = get_field('contact_afbeelding', $pagina_id); ?>
									<img class="rounded-circle w-100" src="<?php echo $contact_foto['url']; ?>" alt="<?php echo $contact_foto['alt']; ?>" >
                            </div>
                            <div class="col-6 col-sm-8 text-left d-flex align-items-center">
                                <h3 class="tekst-groen">Vragen? </h3>
                            </div>
                        </div>
                        <h2><?php echo get_field('contact_naam', $pagina_id); ?><br />helpt je graag verder</h2>
						<div class="social-icons mb-4">
							<a href="tel:0383031844" target="_blank">
								<span class="fa-stack fa-2x tekst-rood">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fas fa-phone fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</div>
						<?php
						if( get_field('contactformulier') ):
							echo do_shortcode( get_field('contactformulier') );
							else :  echo do_shortcode( '[ninja_form id=2]' ); 
						endif; ?>
                        <?php /*?><form action="" class="extra-p-r">
                            <input class="w-100 mb-1 p-2" type="text" name="Naam" id="Naam" placeholder="Naam..."><br />
                            <input class="w-100 mb-1 p-2" type="text" name="Email" id="Email" placeholder="E-mailadres..."><br />
                            <textarea class="w-100 mb-1 p-2" name="Bericht" id="Bericht" cols="30" rows="4">Bericht...</textarea><br />
                            <a href="javascript:jQuery(field).closest("form").submit();" class="button button-rood">Verzenden <i class="fal fa-long-arrow-right"></i></a>                    
                        </form><?php */?> 
                    </div>
                    
                    <?php } ?>
                    
                </div>
                <div class="col-12 col-md-6 vlak-wit p-0">
                    <div id="kaartje"></div>
                    <?php include 'kaartje/map.php'; ?>
                    <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWrWA3eOtSj2tVXqR0GfuXeSs4rvyhenw&callback=initMap">
                    </script>
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="menu-footer vlak-groen tekst-wit pt-4 pb-5">
        <div class="container-fluid">
            <div class="container"> 
                <div class="row">
                    <div class="col-12 col-sm-6 extra-p-r social-icons">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer 1') ) : ?>
                        <?php endif; ?>
                        <a href="https://www.linkedin.com/company/catent" target="_blank">
							<span class="fa-stack fa-2x tekst-rood">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>
							</span>
						</a>
                    </div>
                    <div class="d-none d-md-block col-sm-6 col-md-3 list-pijltje">
                        <h5 class="tekst-paars mt-3 mb-3">Documenten</h5>
                        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => ' ', 'container_id' => 'navbarFooterCollapse', 'items_wrap' => '<ul class="tekst-wit">%3$s</ul>' ) ); ?> 
                    </div>
                    <div class="col-12 col-sm-6 col-md-3"> 
                        <h5 class="tekst-paars mt-3 mb-3">Contact</h5>
                        <p><span class="tekst-paars">Postadres</span> <br>
                        Postbus 290 <br>
                        8000 AG Zwolle</p>
                        <p><span class="tekst-paars">Bezoekadres</span> <br>
                        Schrevenweg 6 <br>
                        8024 HA Zwolle</p>
                        <p><a href="https://goo.gl/maps/U2pUFTnQmW62" target="_blank" class="button button-rood">Route <i class="fal fa-long-arrow-right"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-2 pb-2">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <p class="m-0"><a href="<?php echo home_url(); ?>/privacy-verklaring">Privacy</a></p>
					<br class="d-block d-md-none">
                </div>
                <div class="col-12 col-sm-6">
                    <p class="m-0 text-right d-none d-md-block">&copy; 2019 Stichting Catent | Ontwerp en realisatie: <a href="https://www.catapult.nl" style="color: #000;">Catapult creëert</a></p>
                    <p class="m-0 d-block d-md-none">&copy; 2019 Stichting Catent <span class="d-none d-md-inline">|</span><br class="d-block d-md-none"> Ontwerp en realisatie: <a href="https://www.catapult.nl" style="color: #000;">Catapult creëert</a></p>
					<br class="d-block d-md-none">
                </div>
            </div>
        </div>
    </div>
</footer>

<a href="#0" class="cd-top">Top</a>

<?php wp_footer(); ?>

</body>
</html>