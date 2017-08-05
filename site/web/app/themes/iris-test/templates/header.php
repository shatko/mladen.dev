<header class="banner">
  <div class="container">
    <div class="toggler">
      <div class="meta-wrapper">
        <ul>
          <li><a href="#">Sign Up</a></li>
          <li><a href="#">Login</a></li>
          <li><a href="#">RSS Feeds</a></li>
          <li><a href="#">Archived News</a></li>
        </ul>
      </div>
      <?php dynamic_sidebar('sidebar-socials'); ?>
    </div>
    <div class="nav-primary-wrapper">
      <div class="toggler-button toggler-button-close"></div>
      <div class="hamburger-wrapper">
        <div class="hamburger">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <nav class="nav-primary">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
        endif;
        ?>
      </nav>
    </div>
    <div class="page-info-wrapper row">
      <a class="brand col-md-6" href="<?= esc_url(home_url('/')); ?>">
        <h2><?php bloginfo('name'); ?></h2>
        <p><?php bloginfo('description'); ?></p>
      </a>
      <form  class="search-form col-md-6" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
        <label>
          <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
          <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search Our Website...', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
        </label>
        <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
      </form>
    </div>
  </div>
</header>
