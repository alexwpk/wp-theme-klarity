<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package klarity
 */

if ( ! function_exists( 'klarity_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function klarity_posted_on() {
    ?>
    <span class="posted-on">
      <?php esc_html_e( 'Posted on ', 'klarity'); ?>
      <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
        <?php echo sprintf('<time class="entry-date published updated" datetime="%1$s">%2$s</time>',
          esc_attr( get_the_date( DATE_W3C ) ),
          esc_html( get_the_date() )
        ); ?>
      </a>
    </span><?php
	}
endif;

if ( ! function_exists( 'klarity_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function klarity_posted_by() {
		echo '<span class="byline"> '.
      sprintf(
      /* translators: %s: post author. */
        esc_html_x( 'by %s', 'post author', 'klarity' ),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
      )
  .'</span>';

	}
endif;

if ( ! function_exists( 'klarity_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function klarity_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'klarity' ) );
			if ( $categories_list ) {
		  /* translators: used to list categories */
		    printf( '<span class="cat-links">' . esc_html__( ' in %1$s', 'klarity' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'klarity' ) );
			if ( $tags_list ) {
		    /* translators: used to list tags */
		    printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'klarity' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'klarity' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'klarity' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'klarity_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function klarity_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;
