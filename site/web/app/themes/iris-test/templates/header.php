<header class="banner">
  <div class="container">
    <div class="toggler">

    </div>
    <div class="nav-primary-wrapper">
      <nav class="nav-primary">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
        endif;
        ?>
      </nav>
    </div>
    <div class="page-info-wrapper">
      <a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
      <a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('description'); ?></a>
    </div>
  </div>
</header>
