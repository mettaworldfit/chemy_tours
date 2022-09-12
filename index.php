<?php get_header(); ?>

<br><br><br><br>

<p>heeeeee</p>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section>

			<h1><?php echo "blog";?></h1>

			<?php get_template_part( '/template_part/loop' ); ?>

			<?php get_template_part( '/template_part/pagination' ); ?>

           

		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>


