<?php

	get_header();

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?
			the_title('<h1 class="entry-title">', '</h1>');
		?>

		<p>This is the CSV page template!</p>

		<?
			$meta_args = array(
				'relation' => 'OR',
				array(
					'key' => 'issue',
					'value' => '^([5-9]|10|11)\.1$',
					'compare' => 'REGEXP'
				)
			);

			$args = array(
				'post_type' => 'article',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'category_name' => 'florida-review',
				'meta_query' => $meta_args,
				'fields' => 'ids'
			);

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {

				echo count( $query->posts ) . ' results returned.';
				echo '<br /><br />';
				echo '<ul>';

				foreach ( $query->posts as $id ) {

					echo '<li>' . get_post_meta( $id, 'author1-last', true ) . ', ' . get_post_meta( $id, 'author1-first', true ) . ' | ' . get_post_meta( $id, 'issue', true );

				}

				echo '</ul>';

			} else {

				echo "No results.";
			}
			/*
			// Pulls a list of articles that have no category

			$cats = get_categories();

			$cat_arr = array();
			foreach ( $cats as $cat ) {
				if ( !($cat->slug == 'uncategorized' ) )
					array_push( $cat_arr, $cat->term_id );
			}

			$args = array(
				'post_type' => 'article',
				'post_status' => 'publish',
				'category__not_in' => $cat_arr
			);

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {

					$query->the_post();

					$id = get_the_id();
					$title = get_the_title();
					$author_last = get_post_meta( $id, 'author1-last', true );
					$author_first = get_post_meta( $id, 'author1-first', true );

					?>
						<div class="article-row">
							<h4><?= $title ?></h4>
							<p>Post ID: <?= $id ?></p>
							<p>By <?= $author_first . ' ' . $author_last ?></p>
						</div>
					<?
				}

				wp_reset_postdata();

				echo "DONE!";

			} else {

				echo "No posts to display.";
			}
			*/

			/*
		//if ( !current_user_can( 'manage_options' ) ) {
			// Adds post entries from the specified CSV file.
			$path = get_template_directory() . '/toc2-1.csv';

			echo $path . "<br /><br />";

			if ( file_exists( $path ) ) {

				$toc = fopen( $path, 'r' );

				while( !feof($toc) ) {

					if (!$toc) {
						echo "File not opened!";
						break;
					}

					$line = fgetcsv($toc);

					$data = array(
						'year' => $line[1],
						'volume' => $line[2],
						'issue' => str_replace(',', ' &amp; ', $line[3] ),
						'author1-last' => str_replace( 'e`', '&eacute;', $line[4] ),
						'author1-first' => str_replace( 'e`', '&eacute;', $line[5] ),
						'title' => str_replace( 'e`', '&eacute;', $line[9] ),
						'abstract' => str_replace( 'e`', '&eacute;', $line[10] )
					);

					if ( empty( $data['author1-last'] ) || $data['author1-last'] == 'Author Last Name' )
						continue;

					$oth_auth_str = '';

					if ( !empty( $line[6] ) ) {

						$patt = '/trans\./';

						$lnames = explode( '&', $line[6] );

						if ( !empty( $line[7] ) )
							$fnames = explode( '&', $line[7] );

						if ( is_array( $lnames ) ) {

							$len = count( $lnames );

							if ( preg_match( $patt, $lnames[ $len - 1 ] ) )
								$oth_auth_str .= 'Translated by ';

							for ( $i = 0; $i < count( $lnames ); $i++ ) {

								$name = '';

								if ( is_array( $fnames ) )
									$name .= $fnames[$i] . ' ';

								$name .= $lnames[$i];

								if ( next( $lnames ) !== false )
									$name .= ', ';

								$oth_auth_str .= $name;
							}

						} else {

							if ( preg_match( $patt, $lnames ) )
								$oth_auth_str .= 'Translated by ';

							$oth_auth_str .= ( !empty( $fnames ) ) ? $fnames . ' ' . $lnames : $lnames;
						}
					}

					$data['other-authors'] = $oth_auth_str;

					$content = '';

					switch( $line[8] ) {

						case 'f':
							$genre = 'fiction';
							break;
						case 'n':
							$genre = 'non-fiction';
							break;
						case 'p':
						case 'p, t':
							$genre = 'poetry';
							break;
						case 'g':
							$genre = 'graphic-narrative';
							break;
						case 'other':
							$genre = '';
						default:
							$genre = 'visual-art';
							$content = $line[8];
					}

					$data['category'] = array( $genre, 'florida-review' );

					if ( !empty( $content ) )
						$data['content'] = $content;

					$post_array = array(
						'post_content' => "This article is a stub." . ( !empty( $data['content'] ) ? "\n\n" . ucwords( $data['content'] ) : '' ),
						'post_title' => $data['title'],
						'post_status' => 'publish',
						'post_type' => 'article',
						'tax_input' => array(
							'post_tag' => 'The Florida Review'
						),
						'meta_input' => array(
							'author1-last' => $data['author1-last'],
							'author1-first' => $data['author1-first'],
							'other-authors' => $data['other-authors'],
							'issue' => $data['volume'] . '.' . $data['issue'],
							'abstract' => ucwords( $data['abstract'] )
						)
					);

					$post_id = wp_insert_post( $post_array );
					wp_set_object_terms( $post_id, $data['category'], 'category');
				}

				echo "DONE!";

			} else {

				echo "Error opening file! <br />";
				echo $path;
			}
		//} else {

			//echo "This page is for administrative use only.";
		//}

		*/

		?>

	</main>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
