<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Shosh_Theme
 */
// Grid View
$grid_view = get_field( 'grid_view' );
?>

<article id="post-<?php the_ID(); ?>" class="post <?php if($grid_view) {echo $grid_view;}?>">
	<div class="post-thumbnail fix">
		<a href="<?php the_permalink(); ?>" class="thumbnail">
			<?php 
				if($grid_view == "landscape") :
					the_post_thumbnail('blog-image-landscape');
				elseif($grid_view == "portrait") :
					the_post_thumbnail('blog-image-portrait');
				elseif($grid_view == "square") :
					the_post_thumbnail('blog-image-square');
				else :
					the_post_thumbnail();
				endif;
			?>
			<div class="thumb-loading"></div>
		</a>
	</div>
	<header class="entry-header fix">
		<div class="post-category fix">
			<p>לקריאה <svg xmlns="http://www.w3.org/2000/svg" width="8" height="15" viewBox="0 0 8 15" fill="none">
<path d="M4.35355 0.646446C4.15829 0.451184 3.84171 0.451184 3.64645 0.646446L0.464466 3.82843C0.269204 4.02369 0.269204 4.34027 0.464466 4.53553C0.659728 4.7308 0.976311 4.7308 1.17157 4.53553L4 1.70711L6.82843 4.53553C7.02369 4.7308 7.34027 4.7308 7.53553 4.53553C7.7308 4.34027 7.7308 4.02369 7.53553 3.82843L4.35355 0.646446ZM4.5 15L4.5 1L3.5 1L3.5 15L4.5 15Z" fill="black"/>
</svg></p>
		</div>
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta fix">
				<span class="comments"><?php echo get_comments_number(); ?> תגובות</span>
				<span class="date"><?php echo get_the_date( 'd.m.y' ) ?></span>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
</article>
