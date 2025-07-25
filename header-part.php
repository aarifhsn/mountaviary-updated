<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
  <meta charset="<?php bloginfo('charset') ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>

<body <?php body_class('font-poppins w-full mx-auto transition-all scroll-smooth dark:bg-gray-900'); ?>>

  <?php if (function_exists('wp_body_open')) {
    wp_body_open();
  } ?>

  <!-- Dark Mode  -->
  <div class="fixed top-4 right-4 z-50">
    <button id="dark-mode-toggle" class="text-xl">
      <span id="dark-mode-icon" class="border border-gray-400 p-2 rounded ">🌞</span>
    </button>
  </div>

  <header class="bg-white dark:bg-slate-900  lg:hidden fixed top-0 left-0 min-h-[60px] z-50 w-full flex items-center">
    <div class="header_container container flex justify-between items-center px-3 md:pl-6 md:pr-0 mx-auto py-1">
      <div class="site_title flex w-4/12 font-poppins items-center">

        <div class="site_context">
          <?php if (display_header_text()): // If user chooses to display header text. ?>
            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" class="font-bold"
                rel="home"><?php echo get_bloginfo('name'); ?></a></h1>

            <?php
            $description = get_bloginfo('description', 'display');
            if ($description || is_customize_preview()): ?>
              <h4 class="text-xs text-slate-500 italic "><?php echo $description; ?></h4>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="top_menu w-1/2 z-[15]">
        <div class="navbar uppercase font-bold text-sm text-right relative">
          <div class="menu-toggle block lg:hidden float-right">
            <span id="mobile-menu" class="cursor-pointer text-lg"><i class="fa-solid fa-bars"></i></span>
          </div>

          <!-- TOP MOBILE MENU - AS SCREEN MENU -->
          <div class="mount_top_mobile_menu relative">
            <?php wp_nav_menu(array(
              'theme_location' => 'custom_menu',
              'container' => '',
              'menu_class' => '',
              'add_li_class' => '',
              'nav_anchor_class' => ''
            ));
            ?>
          </div>

        </div>
      </div>
    </div><!--end header_container-->

  </header>

  <div class="mount_body">
    <div class="container px-3 md:px-4 xl:p-0 mx-auto relative">
      <div class="site_content w-full relative">
        <div
          class="left_nav_content hidden lg:block 2xl:block flex-auto h-full z-50 top-0 left-0 fixed border-r-2 w-1/5 bg-left_nav-bg  bg-cover bg-no-repeat bg-center bg-white dark:bg-gray-900 bg-opacity-80 backdrop-filter backdrop-blur-sm pl-16 pr-4">
          <div class="site_title flex font-poppins pt-16">
            <?php if (function_exists('the_custom_logo') && has_custom_logo()) { ?>
              <div class="logo mr-4">
                <?php the_custom_logo(); ?>
              </div>
            <?php } ?>
            <div class="site_context">
              <?php if (display_header_text()): // If user chooses to display header text. ?>
                <h1 class="site-title text-2xl dark:text-white"><a href="<?php echo esc_url(home_url('/')); ?>"
                    class="font-bold" rel="home"><?php echo get_bloginfo('name'); ?></a></h1>

                <?php
                $description = get_bloginfo('description', 'display');
                if ($description || is_customize_preview()): ?>
                  <h4 class="text-xs text-slate-500 italic "><?php echo $description; ?></h4>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="sidebar_area max-h-96 mb-20 mt-12">
            <div id="sidebar1" class="left_nav_info sidebar_toggle">
              <div class=" pr-4 pt-4 pb-4">
                <div
                  class="left_nav text-left uppercase font-poppins font-bold text-sm text-slate-700 dark:text-slate-100 mt-4 relative">
                  <!-- LEFT NAV MENU -->
                  <div class="mount_frontpage_left_menu">
                    <?php wp_nav_menu(array(
                      'theme_location' => 'custom_menu',
                      'container' => '',
                      'menu_class' => '',
                      'add_li_class' => '',
                      'nav_anchor_class' => ''
                    )); ?>
                  </div>
                </div>
              </div>
            </div>

            <!-- FRONT-PAGE SOCIAL ICONS  -->
            <div class="front_page_social w-full mt-14">
              <ul
                class="social-icons flex flex-wrap gap-x-2 gap-y-6 justify-start text-lg text-slate-600 dark:text-slate-100">
                <?php
                $social_platforms = array(
                  'facebook' => 'fa-brands fa-facebook-f',
                  'github' => 'fa-brands fa-github',
                  'instagram' => 'fab fa-instagram',
                  'linkedin' => 'fa-brands fa-linkedin-in',
                  'youtube' => 'fa-brands fa-youtube',
                  'whatsapp' => 'fa-brands fa-whatsapp',
                  'telegram' => 'fa-brands fa-telegram',
                  'twitter' => 'fa-brands fa-x-twitter',
                  'discord' => 'fa-brands fa-discord',
                  'email' => 'fa-regular fa-envelope',
                  // Add more social platforms as needed
                );

                foreach ($social_platforms as $platform => $icon_class) {
                  $url = get_theme_mod("{$platform}_url");
                  if ($platform !== 'email') {
                    if ($url) {
                      echo "<li class='my-2'><a class='px-2 md:px-3 py-1 md:py-1.5 rounded border border-slate-200 dark:border-slate-700 hover:border-slate-400 border-solid' href='" . esc_url($url) . "' target='_blank'><i class='$icon_class w-4 h-4'></i></a></li>";
                    }
                  } else {
                    if ($url) {
                      echo "<li class='my-2'><a class='px-2 md:px-3 py-1 md:py-1.5 rounded border border-slate-200 hover:border-slate-400 border-solid' href='mailto:" . esc_attr($url) . "'' target='_blank'><i class='$icon_class  w-4 h-4'></i></a></li>";
                    }
                  }
                }
                ?>
              </ul>
            </div>
          </div>
          <!-- end left_nav_info -->
        </div>
        <!-- end sidebar_section_front  -->

      </div>
      <!--end left_nav_content-->

      <div class="body_content w-full lg:w-4/5 overflow-hidden relative  ml-0 lg:ml-[20%]">