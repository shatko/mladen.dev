<?php the_content(); ?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>


  <?php
  if( have_rows('insert_content') ):
    while ( have_rows('insert_content') ) : the_row();
// slider part
      if( get_row_layout() == 'slider' ):
        ?>
        <div class="slider-wrapper row">
          <div class="slider-teaser col-lg-5">
            <h2><?php the_sub_field('title'); ?></h2>
            <p><?php the_sub_field('description'); ?></p>
            <a href="<?php the_sub_field('read_more_url'); ?>">Read More</a>
          </div>

          <div class="slider col-lg-7">
            <?php
            $images = get_sub_field('slider_images');
            if( $images ): ?>
              <ul class="main-slider">
                <?php foreach( $images as $image ): ?>
                <li>
                  <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
        </div>
        <?php
// call to action part
      elseif( get_row_layout() == 'call_to _action' ):
        ?>
        <div class="call-to-action-wrapper">
          <div class="call-to-action row" style="<?php the_sub_field('border_position'); ?>:10px solid #0099ff">
            <div class="text-wrapper col-lg-8">
              <h2><?php the_sub_field('headline'); ?></h2>
              <h4><?php the_sub_field('minititle'); ?></h4>
            </div>
            <div class="button-wrapper col-lg-4">
              <a href="<?php the_sub_field('button_url'); ?>"><?php the_sub_field('button_text'); ?></a>
            </div>
          </div>
        </div>
        <?php
// one image four posts part        
      elseif( get_row_layout() == 'one-image-four-posts' ):
        ?>
        <div class="one-image-four-posts-wrapper">
          <div class="one-image-four-posts row">
            <div class="image-left col-lg-6">
              <img src="<?php echo the_sub_field('insert_image'); ?>" alt="iris" />
            </div>
            <div class="posts col-lg-6">
              <?php $first_post_id = get_sub_field('first_post'); ?>
              <?php $second_post_id = get_sub_field('second_post'); ?>
              <?php $third_post_id = get_sub_field('third_post'); ?>
              <?php $fourth_post_id = get_sub_field('fourth_post'); ?>
              <div class="row">
                <div class="post col-md-6">
                  <div class="image">
                    <?php echo get_the_post_thumbnail($first_post_id); ?>
                  </div>
                  <a href="<?php echo get_the_permalink($first_post_id); ?>"><?php echo get_the_title($first_post_id); ?></a>
                  <p><?php echo get_the_excerpt($first_post_id); ?></p>
                </div>
                <div class="post col-md-6">
                  <div class="image">
                    <?php echo get_the_post_thumbnail($second_post_id); ?>
                  </div>
                  <a href="<?php echo get_the_permalink($second_post_id); ?>"><?php echo get_the_title($second_post_id); ?></a>
                  <p><?php echo get_the_excerpt($second_post_id); ?></p>
                </div>
              </div>
              <div class="row">
                <div class="post col-md-6">
                  <div class="image">
                    <?php echo get_the_post_thumbnail($third_post_id); ?>
                  </div>
                  <a href="<?php echo get_the_permalink($third_post_id); ?>"><?php echo get_the_title($third_post_id); ?></a>
                  <p><?php echo get_the_excerpt($third_post_id); ?></p>
                </div>
                <div class="post col-md-6">
                  <div class="image">
                    <?php echo get_the_post_thumbnail($fourth_post_id); ?>
                  </div>
                  <a href="<?php echo get_the_permalink($fourth_post_id); ?>"><?php echo get_the_title($fourth_post_id); ?></a>
                  <p><?php echo get_the_excerpt($fourth_post_id); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
      endif;
    endwhile;
  else :
  endif;

  ?>
