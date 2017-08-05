<?php

namespace Roots\Sage\widgets;

use Roots\Sage\Assets;

/**
 * Adds custom widget.
 */
class Custom_Widget extends \WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'custom_widget', // Base ID
      __('Social icons', 'text_domain'), // Name
      array( 'description' => __( 'Adds Social Icons', 'text_domain' ), ) // Args
    );
  }

  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {

    if ( !empty($instance['title']) ) {
      apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }


    // vars
    $socials = get_field('select_socials', 'widget_' . $args['widget_id']);

    ?><div class="socials-wrapper"><?php
    // check
    if( $socials ): ?>
    	<?php foreach( $socials as $social ): ?>
        <?php if($social=='linked_in'){?>
          <a class="socials-link linkedin" href="<?php echo get_field('insert_linked_in_url','widget_' . $args['widget_id']); ?>"></a>
        <?php }elseif($social=='twitter'){?>
          <a class="socials-link twitter" href="<?php echo get_field('insert_twitter_url','widget_' . $args['widget_id']); ?>"></a>
        <?php }elseif($social=='pinterest'){?>
          <a class="socials-link pinterest" href="<?php echo get_field('insert_pinterest_url','widget_' . $args['widget_id']); ?>"></a>
        <?php }elseif($social=='google_plus'){?>
          <a class="socials-link googleplus" href="<?php echo get_field('insert_google_plus_url','widget_' . $args['widget_id']); ?>"></a>
        <?php }elseif($social=='rss'){?>
          <a class="socials-link rss" href="<?php echo get_field('insert_rss_url','widget_' . $args['widget_id']); ?>"></a>
        <?php } ?>
    	<?php endforeach; ?>
    <?php endif;
    ?></div><?php

  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    if ( isset($instance['title']) ) {
      $title = $instance['title'];
    }
    else {
      $title = __( 'New title', 'text_domain' );
    }
    ?>

    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>


    <?php
  }

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

    return $instance;
  }

} // class Custom_Widget

// register Custom_Widget widget
add_action( 'widgets_init', function(){
  register_widget(  __NAMESPACE__ . '\\Custom_Widget' );
});
