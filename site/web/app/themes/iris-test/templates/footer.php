<footer class="content-info">
  <div class="container">
    <div class="footer-segment-wrapper row">
      <div class="col-lg-6">
        <div class="row">
          <div class="footer-segment footer-about col-md-6">
            <p class="footer-title">About us</p>
            <img src="http://iris.shatko.party/app/uploads/2017/08/215x90px.jpg" alt="iris">
            <p class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non diam erat. In fringilla massa ut nisi ullamcorper pellentesque. Quisque non luctus sem. Nullam non magna vel nisi posuere bibendum vitae sed dui.</p>
            <a class="read-more" href="#">Read More</a>
          </div>
          <div class="footer-segment footer-links col-md-6">
            <p class="footer-title">Quick Links</p>
            <ul>
              <li><a href="#">Lorem ipsum dolor sit</a></li>
              <li><a href="#">Amet consectetur</a></li>
              <li><a href="#">Praesent vel sem id</a></li>
              <li><a href="#">Curabitur hendrerit est</a></li>
              <li><a href="#">Aliquam eget erat nec sapien</a></li>
              <li><a href="#">Cras id augue nunc</a></li>
              <li><a href="#">In nec justo non</a></li>
              <li><a href="#">Vivamus mollis enim ut</a></li>
              <li><a href="#">Curabitur hendrerit est</a></li>
              <li><a href="#">Sed a nulla urna</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="row">
          <div class="footer-segment footer-last-blogs col-md-6">
            <p class="footer-title">Latest Blog posts</p>
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 2
            );
            $post_query = new WP_Query($args);
            if($post_query->have_posts() ) {
              while($post_query->have_posts() ) {
                $post_query->the_post();
                ?>
                <div class="two-blogs-single">
                  <h5><?php the_title(); ?></h5>
                  <span><?php the_author(); ?>,
                    <?php
                    $author = get_userdata(get_the_author_meta('ID'));
                    echo $author->user_url;
                    ?>
                  </span>
                  <span><?php echo get_the_date('l, F jS, Y'); ?></span>
                  <p><?php echo get_the_excerpt(); ?></p>
                  <a class="read-more" href="<?php echo the_permalink(); ?>">Read More</a>
                </div>
                <?php
              }
            }
            ?>
          </div>
          <div class="footer-segment footer-contact col-md-6">
            <p class="footer-title">Contact Us</p>
            <?php echo do_shortcode( '[contact-form-7 id="75" title="Contact form 1"]' ); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom row">
      <p class="col-md-6">Copyright © 2013 Domain Name - All Rights Reserved</p>
      <p class="col-md-6">Template by OS Templates</p>
    </div>
  </div>
</footer>
