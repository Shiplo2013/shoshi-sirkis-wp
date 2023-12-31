<!--- Contact Section --->
<section id="contact-popup" class="fix">
	<div class="container fix">
		<div class="contact-popup-wrapper fix">
			<div class="contact-popup-head fix">
				<div class="site-logo fix">
					<?php
					if ( the_custom_logo() ) :
						the_custom_logo();
					endif; ?>
				</div>
				<button type="button" id="contact-close">(x) חזרה</button>
			</div>
			<div class="contact-content fix">
				<div class="contact-content-left fix">
					<?php 
					$string = get_theme_mod( 'contact_phone_setting' );
					$string = str_replace(' ', '', $string);
					$number = str_replace('-', '', $string);
					?>
					<p>Contact<br>
					<a href="mailto:<?php echo get_theme_mod( 'contact_email_settings' ); ?>"><?php echo get_theme_mod( 'contact_email_settings' ); ?></a><br>
					tel. <a href="tel:<?php echo get_theme_mod( 'contact_phone_setting' ); ?>"><?php echo get_theme_mod( 'contact_phone_setting' ); ?></a> <a href="whatsapp://send?abid=<?php echo $number; ?>" class="contact-whatsapp"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/whatsup.svg" alt="WhatsApp" /></a><br>
					currently freelancing</p>
					<p>Social<br>
					ig. <a href="https://www.instagram.com/<?php echo get_theme_mod( 'contact_instagram_setting' ); ?>/" target="_blank" rel="noopener">@<?php echo get_theme_mod( 'contact_instagram_setting' ); ?></a></p>
					<p>(+) instegram<br>
					(+) web</p>
				</div>
				<div class="contact-content-right fix">
					<img src="<?php echo esc_url( get_theme_mod( 'contact_image_setting' ) ); ?>" alt="Contact">
				</div>
			</div>
		</div>
	</div>
</section>
<!--- Contact Section --->