<?php

/*======
*
* Latest Posts Widget
*
======*/
	function cloux_latest_posts_register_widgets() {
		register_widget( 'cloux_latest_posts_widget' );
	}
	add_action( 'widgets_init', 'cloux_latest_posts_register_widgets' );

	class cloux_latest_posts_widget extends WP_Widget {
		function __construct() {
			parent::__construct(
		            'cloux_latest_posts_widget',
	        	    esc_html__( 'Cloux: Latest Posts Widget', 'cloux' ),
	 	           array( 'description' => esc_html__( 'Latest posts widget.', 'cloux' ), )
			);
		}
		
		function widget( $args, $instance ) {
			echo $args['before_widget'];

				$latest_posts_widget_title = esc_attr( $instance['latest_posts_widget_title'] );
				if ( !empty( $instance['latest_posts_widget_title'] ) ) {
					echo '<div class="widget-title cloux-title style-4">'. esc_attr( $latest_posts_widget_title ) .'</div>';
				}

				if( $instance) {
					$latest_posts_widget_title = esc_attr( $instance['latest_posts_widget_title'] );
					$latest_posts_widget_category = esc_attr( $instance['latest_posts_widget_category'] );
					$latest_posts_widget_exclude = esc_attr( $instance['latest_posts_widget_exclude'] );
					$latest_posts_widget_offset = esc_attr( $instance['latest_posts_widget_offset'] );
					$latest_posts_widget_post_count = esc_attr( $instance['latest_posts_widget_post_count'] );
				}
				
				/*------------- Exclude Start -------------*/
				if( !empty( $latest_posts_widget_exclude ) ) :
					$latest_posts_widget_exclude = $latest_posts_widget_exclude;
					$latest_posts_widget_exclude = explode( ',', $latest_posts_widget_exclude );
				else:
					$latest_posts_widget_exclude = "";
				endif;
				/*------------- Exclude End -------------*/
				?>
				<div class="latest-posts-widget">
					<?php
						$args_latest_posts = array(
							'posts_per_page' => $latest_posts_widget_post_count,
							'post_status' => 'publish',
							'post__not_in' => $latest_posts_widget_exclude,
							'offset' => $latest_posts_widget_offset,
							'ignore_sticky_posts'    => true,
							'post_type' => 'post',
							'cat' => $latest_posts_widget_category
						); 
						$wp_query = new WP_Query($args_latest_posts);
						while ( $wp_query->have_posts() ) {
							$wp_query->the_post();
							echo cloux_post_style_4( $post = get_the_ID(), $image = "true", $details = "true", $post_detail_style = "style-1" );
						}
						wp_reset_postdata();
					?>
				</div>

			<?php echo $args['after_widget'];
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['latest_posts_widget_title'] = esc_attr( $new_instance['latest_posts_widget_title'] );
			$instance['latest_posts_widget_category'] = esc_attr( $new_instance['latest_posts_widget_category'] );
			$instance['latest_posts_widget_exclude'] = esc_attr( $new_instance['latest_posts_widget_exclude'] );
			$instance['latest_posts_widget_offset'] = esc_attr( $new_instance['latest_posts_widget_offset'] );
			$instance['latest_posts_widget_post_count'] = esc_attr( $new_instance['latest_posts_widget_post_count'] );

			return $instance;
		}

		function form($instance) {

			$latest_posts_widget_title = '';
			$latest_posts_widget_category = '';
			$latest_posts_widget_exclude = '';
			$latest_posts_widget_offset = '';
			$latest_posts_widget_post_count = '';

			if( $instance) {
				$latest_posts_widget_title = esc_attr( $instance['latest_posts_widget_title'] );
				$latest_posts_widget_category = esc_attr( $instance['latest_posts_widget_category'] );
				$latest_posts_widget_exclude = esc_attr( $instance['latest_posts_widget_exclude'] );
				$latest_posts_widget_offset = esc_attr( $instance['latest_posts_widget_offset'] );
				$latest_posts_widget_post_count = esc_attr( $instance['latest_posts_widget_post_count'] );
			} ?>
			 
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'latest_posts_widget_title' ) ); ?>"><?php esc_html_e( 'Widget Title:', 'cloux' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'latest_posts_widget_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'latest_posts_widget_title' ) ); ?>" type="text" value="<?php echo esc_attr( $latest_posts_widget_title ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'latest_posts_widget_post_count' ) ); ?>"><?php esc_html_e( 'Post Count:', 'cloux' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'latest_posts_widget_post_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'latest_posts_widget_post_count' ) ); ?>" type="text" value="<?php echo esc_attr( $latest_posts_widget_post_count ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'latest_posts_widget_category' ) ); ?>"><?php esc_html_e( 'Category:', 'cloux' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name('latest_posts_widget_category') ); ?>" id="<?php echo esc_attr( $this->get_field_id('latest_posts_widget_category') ); ?>" class="widefat"> 
					<option value=""><?php echo esc_html__( 'All Categories', 'cloux' ); ?></option>
					<?php
					 $categories =  get_categories('child_of=0'); 
					 foreach ($categories as $category) {
						$category_select_control = '';
						if ( $latest_posts_widget_category == $category->cat_ID )
						{
							$category_select_control = "selected";
						}
						$cat_name = $category->cat_name;
						echo '<option value="' . esc_attr( $category->cat_ID ) . '"' . $category_select_control . '>';
							if( !empty( $cat_name ) ) {
								echo esc_attr( $cat_name );
							}
						echo '</option>';
					 }
					?>
				</select>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'latest_posts_widget_exclude' ) ); ?>"><?php esc_html_e( 'Exclude Posts:', 'cloux' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'latest_posts_widget_exclude' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'latest_posts_widget_exclude' ) ); ?>" type="text" value="<?php echo esc_attr( $latest_posts_widget_exclude ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'latest_posts_widget_offset' ) ); ?>"><?php esc_html_e( 'Offset:', 'cloux' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'latest_posts_widget_offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'latest_posts_widget_offset' ) ); ?>" type="text" value="<?php echo esc_attr( $latest_posts_widget_offset ); ?>" />
			</p>
		<?php }
	}