<div class="slider-wrapper row">

  <?php
  if( have_rows('insert_content') ):
    while ( have_rows('insert_content') ) : the_row();

// slider part
      if( get_row_layout() == 'slider' ):
        ?>
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
        <?php
      elseif( get_row_layout() == 'download' ):

      	$file = get_sub_field('file');

      endif;
    endwhile;
  else :
  endif;

  ?>


</div>
