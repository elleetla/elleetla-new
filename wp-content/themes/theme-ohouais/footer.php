<!-- footer -->
<footer>

	<!-- footer principal --> 
	<?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
	<div id="footer-principal">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center mentions-footer">
					<?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
						<?php dynamic_sidebar( 'sidebar-footer' ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!-- /.footer principal -->

</footer>
<!-- /.footer -->

<?php wp_footer(); ?>

</body>
</html>