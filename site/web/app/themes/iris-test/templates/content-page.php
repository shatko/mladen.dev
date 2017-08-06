<?php the_content(); ?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>


  <?php
  if( have_rows('insert_content') ):
    while ( have_rows('insert_content') ) : the_row();

// slider part
      if( get_row_layout() == 'slider' ):
        ?>
        <div class="slider-wrapper row">
          <div class="slider-teaser col-lg-6">
            <h2><?php the_sub_field('title'); ?></h2>
            <p><?php the_sub_field('description'); ?></p>
            <a href="<?php the_sub_field('read_more_url'); ?>">Read More</a>
          </div>

          <div class="slider col-lg-6">
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
      elseif( get_row_layout() == 'call_to _action' ):

        $file = get_sub_field('file');

      endif;
    endwhile;
  else :
  endif;

  ?>
