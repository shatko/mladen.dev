<?php the_content(); ?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>


  <?php
  if( have_rows('insert_content') ):
    while ( have_rows('insert_content') ) : the_row();

// slider part
      if( get_row_layout() == 'slider' ):
        ?>
        <div class="slider-wrapper row">
          <div class="slider-teaser col-lg-6 col-lg-pull-6">
            <h2><?php the_sub_field('title'); ?></h2>
            <p><?php the_sub_field('description'); ?></p>
            <a href="<?php the_sub_field('read_more_url'); ?>">Read More</a>
          </div>

          <div class="slider col-lg-6 col-lg-push-6">
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
      elseif( get_row_layout() == 'download' ):

      	$file = get_sub_field('file');

      endif;
    endwhile;
  else :
  endif;

  ?>
  <div class="row">
    <div style="background:yellow" class="col-md-9 col-md-push-3">.col-md-9 .col-md-push-3</div>
    <div style="background:green" class="col-md-3 col-md-pull-9">.col-md-3 .col-md-pull-9</div>
  </div>
