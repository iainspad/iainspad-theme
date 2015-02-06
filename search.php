<?php get_header(); ?>
		<h3>Search results for <?php echo get_search_query(); ?></h3>
		<div id="blog-content">

			<div id="post-container">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

					<h1 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

					<section class="excerpt">
						<aside class="metadata">
							<ul>
								<li class="date"><a href="<?php $post_year = get_the_time('Y') ;echo get_year_link($post_year); ?>"><?php the_time("M jS, y"); ?></a></li>
								<li class="comments"><a href="<?php the_permalink(); ?>/#comments"><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></a></li>
								<?php if(get_the_author_meta('twitter') != '') { ?>
								<li class="tweet-button"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-via="<?php the_author_meta('twitter'); ?>" data-related="iainspad">Tweet</a>
								<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
								<?php } ?>
							</ul>
						</aside>

						<?php if(has_post_thumbnail()) { ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="thumbnail"><?php the_post_thumbnail('post-thumb'); ?></a>
						<?php } ?>

						<p><?php the_excerpt(); ?></p>

					</section>

				</article>
			<?php endwhile; ?>

				<nav class="pagination">
					<ul>
						<li><?php next_posts_link('Older Posts'); ?></li>
						<li><?php previous_posts_link('Newer Posts'); ?></li>
					</ul>
				</nav>

			<?php else : ?>

			<h3>Sorry! Nothing found for <?php echo get_search_query(); ?></h3>

			<?php endif; ?>

			</div>
			<?php get_sidebar(); ?>
		</div>
<?php get_footer(); ?>
