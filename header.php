<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
  <meta charset="<?php bloginfo('charset') ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>

<body <?php body_class('font-poppins w-full mx-auto transition-all scroll-smooth'); ?>>

  <?php if (function_exists('wp_body_open')) {
    wp_body_open();
  } ?>

  <!-- Dark Mode  -->
  <div class="fixed bottom-12 right-2 z-50">
    <button id="dark-mode-toggle" class="text-lg">
      <span id="dark-mode-icon" class="border border-gray-600 p-1 rounded ">🔆</span>
    </button>
  </div>


  <header class="bg-white dark:bg-gray-900 relative md:fixed top-0 left-0 min-h-[60px] z-40 w-full shadow-sm">
    <div class="header_container flex justify-between items-center py-2 px-8">
      <!-- Mobile Logo -->
      <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="flex items-center gap-2.5 no-underline">
        <!-- Gray A icon -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="36" height="36">
          <!-- Light mode: dark bg, gray icon -->
          <rect width="48" height="48" rx="8" fill="#0F172A" class="dark:hidden" />
          <polygon points="24,6 13,42 19,42 24,20" fill="#F59E0B" class="dark:hidden" />
          <polygon points="24,6 35,42 29,42 24,20" fill="#F59E0B" class="dark:hidden" />
          <rect x="14" y="28" width="20" height="3" rx="1.5" fill="#F59E0B" class="dark:hidden" />
          <circle cx="39" cy="11" r="4" fill="#F59E0B" opacity="0.9" class="dark:hidden" />

          <!-- Dark mode: light bg, gray icon -->
          <rect width="48" height="48" rx="8" fill="#F8FAFC" class="hidden dark:block" />
          <polygon points="24,6 13,42 19,42 24,20" fill="#F59E0B" class="hidden dark:block" />
          <polygon points="24,6 35,42 29,42 24,20" fill="#F59E0B" class="hidden dark:block" />
          <rect x="14" y="28" width="20" height="3" rx="1.5" fill="#F59E0B" class="hidden dark:block" />
          <circle cx="39" cy="11" r="4" fill="#D97706" opacity="0.95" class="hidden dark:block" />
        </svg>

        <div>
          <div class="text-sm font-extrabold text-slate-900 dark:text-white leading-tight">
            arif <span class="font-extralight ml-1">hassan</span>
          </div>
          <div class="text-[7px] font-bold tracking-wider text-slate-400 uppercase">Full-Stack Dev</div>
        </div>
      </a>
      <div class="top_menu z-[15]">
        <div class="navbar  text-sm relative">
          <div class="screen_menu">
            <div class="left_nav uppercase dark:text-slate-100 font-bold font-poppins py-4 relative lg:block hidden">
              <!-- SCREEN MENU -->
              <div class="mount_top_menu">
                <?php wp_nav_menu(array(
                  'theme_location' => 'screen_menu',
                  'container' => '',
                  'menu_class' => 'menu_list',
                  'add_li_class' => '',
                  'nav_anchor_class' => ''
                ));
                ?>
              </div>
            </div>
          </div>

          <div class="menu-toggle block lg:hidden">
            <span id="mobile-menu" class="cursor-pointer text-lg"><i class="fa-solid fa-bars"></i></span>
          </div>

          <!-- TOP MOBILE MENU - AS SCREEN MENU -->
          <div class="mount_top_mobile_menu relative">
            <?php wp_nav_menu(array(
              'theme_location' => 'screen_menu',
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

  <div class="mount_body bg-slate-50 dark:bg-gray-800">
    <div class="container px-3 md:px-4 xl:p-0 mx-auto relative">
      <div class="site_content w-full lg:w-4/5 m-auto relative">
        <?php if (get_option('show_sidebar_area', 1)) { ?>
          <div
            class="left_nav_content hidden lg:block 2xl:block flex-auto h-full z-50 top-0 left-0 bottom-0 fixed border-r-2 w-3/12 bg-left_nav-bg  bg-cover bg-no-repeat bg-center bg-white dark:bg-gray-900 bg-opacity-80 backdrop-filter backdrop-blur-sm">

            <div class="sidebar_section_front mb-16 pl-8 pr-0 mt-20">

              <div class="sidebar_area overflow-y-auto max-h-96 pr-1">
                <?php get_sidebar(); ?>
              </div>

            </div>
            <!-- end sidebar_section_front  -->
          </div>
          <!--end left_nav_content-->
        <?php } ?>

        <div class="body_content w-full lg:w-9/12 overflow-hidden relative mt-6 md:mt-14 ml-0 lg:ml-[25%]">