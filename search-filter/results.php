<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

$count=0;
if ( $query->have_posts() ){
	$total_posts = $query->found_posts;
	?>

<?php

$current_page = $query->query_vars['paged'];
$current_post_count = $query->post_count - 1;
$posts_per_page = $query->query_vars['posts_per_page'];
$total_posts = $query->found_posts;

$posts_start = ($current_page - 1 ) * $posts_per_page + 1;
if( $posts_per_page > $total_posts ) {
	$posts_start = 1;
}
$posts_end = $posts_start + $current_post_count;



?>

	<div class="row gutters-40 artists-wrap mb-5">
		<?php
			while ($query->have_posts()){
			$query->the_post();
		?>
		<div class="col-md-4  mb-5">
		<div class="block-wrap">
			<div class="img-wrap">
		
				<div class="linkwrap">
				<div class="weblink">
				<a href="<?php echo get_field('website'); ?>"><img src="<?php bloginfo('template_directory')?>/assets/feather-link.svg" alt=""></a>	
				</div>
				<div class="instalink">
				<a href="<?php echo get_field('instagram'); ?>">	
				<img src="<?php bloginfo('template_directory')?>/assets/feather-instagram.svg" alt=""></a>	
				</div>
				</div>

				<?php if(has_post_thumbnail()){ ?>
<div class="c-card bg-img " style="background-image:url(<?php the_post_thumbnail_url('artists',array('class'=>'listing-artists w-100'))?>);">
				<a class="anim-image-hover d-block weblink" href="<?php echo the_permalink(); ?>">
				<?php }else{
					?>
<div class="c-card bg-img " style="background-image:url(<?php bloginfo('template_directory')?>/assets/placeholder.jpg);">
				<a class="anim-image-hover d-block weblink" href="<?php echo the_permalink(); ?>">
					<?php } ?>

				</a>	
				</div>

			</div>
			<h3 class="mt-4"><?php the_title();?></h3>
					<p><?php excerpt('15'); ?></p>
					
					<div class="btn-container">
					<a class="btn btn-dark" href="<?php echo get_the_permalink(); ?>">Portfolio</a>
					</div>
		
		</div>
		</div>
		<?php  $count++; ?>
		<?php
			}
		?>
			
	</div>
	<div class="row mt-5 pt-5">
		<div class="col-12">
	<?php // Pagination
	$total = $query->max_num_pages;

	// only bother with pagination if we have more than 1 page
	if ( $total > 1 ) : ?>
		<nav class="pagination text-center">
			<?php
			// Set up pagination to use later on
			$big = 999999999; // need an unlikely integer
			$pagination = paginate_links( array(
				'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'    => '?paged=%#%',
				'current'   => $current_page,
				'total'     => $total,
				'type'      => 'plain',
				'prev_next' => true,
				'prev_text' => __('', 'visceral'),
				'next_text' => __('', 'visceral')
			) );

			echo $pagination; ?>
		</nav>
	<?php endif; ?>
	</div>
	</div>
	<?php
}
else
{
	echo "No Results Found";
}
?>