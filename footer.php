<?php
/**
 * The template for displaying the footer.
 *
 * @package Gemeindetag
 */

?>
<footer class="site-footer" role="contentinfo" id="footer">
		<div class="site-footer-middle">
			<aside class="widget-area" role="complementary">
				<?php
				if ( is_active_sidebar( 'footer-widgets-left' ) ) {
					?>
					<div class="widget-column footer-widgets-left">
						<?php dynamic_sidebar( 'footer-widgets-left' ); ?>
					</div>
					<?php
				}
				if ( is_active_sidebar( 'footer-widges-right' ) ) {
					?>
					<div class="widget-column footer-widgets-right">
						<?php dynamic_sidebar( 'footer-widges-right' ); ?>
					</div>
					<?php
				}
				?>
			</aside>
		</div>
		<div class="site-footer-bottom">
			<div class="container">
				<span>© <?php echo esc_html( bloginfo( 'name' ) ); ?></span>
				<nav aria-label="<?php esc_html_e( 'Legal Navigation', 'blackstone-main' ); ?>" class="site-footer-middle__nav">
					<?php
					wp_nav_menu(
						[
							'menu_class'     => 'site-footer__menu menu',
							'container'      => false,
							'theme_location' => 'legal',
						]
					);
					?>
				</nav>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
	</body>
</html>
