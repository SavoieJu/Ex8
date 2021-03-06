<?php
/**
 * The template for displaying the front-page
 *
 * This is the template that displays the front-page by default.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pied-cormorant
 */

get_header();
?>
	<img class="hero-img-pc" src="https://windows10spotlight.com/wp-content/uploads/2018/12/dde71c707fa28234470f4a203e598728.jpg" alt="Pied Cormorant">
	<h1 class="pc-site-title"><?php bloginfo( 'name' ); ?></h1>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php 
		// the query
		$the_query = new WP_Query( array(
			'category_name' => 'nouvelle',
			'posts_per_page' => 3,
		)); 
		?>

		<?php if ( $the_query->have_posts() ) : ?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

		<a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
		<p><?php the_excerpt(); ?></p>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>

		<?php else : ?>
		<span><?php __('Pas de nouvelle'); ?></span>
		<?php endif; ?>
        
		</main><!-- #main -->
	</div><!-- #primary -->
	<div class='section-evenements'>
		<div class="section-evenements-conteneur">
			<h1>Événements!</h1>
			<ul>
				<?php 
				// the query
				$the_query = new WP_Query( array(
					'category_name' => 'evenement',
					'posts_per_page' => 4,
				)); 
				?>

				<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				
				<li><div><?php the_post_thumbnail() ?><h3><?php the_title(); ?></h3></div></li>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

				<?php else : ?>
				<li><?php __("Pas d'événement"); ?></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>

<?php
get_sidebar();
get_footer();
