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

  <!--  DARK MODE TOGGLE — fixed bottom-right -->
  <div class="fixed bottom-8 right-6 z-50">
    <button id="dark-mode-toggle"
      class="w-10 h-10 flex items-center justify-center rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 shadow-md hover:shadow-lg transition-all duration-300">
      <span id="dark-mode-icon" class="text-base">🔆</span>
    </button>
  </div>

  <!--  MOBILE HEADER — visible only below lg -->
  <header
    class="bg-white dark:bg-slate-900 lg:hidden fixed top-0 left-0 z-50 w-full border-b border-slate-100 dark:border-slate-800"
    style="min-height:60px;">
    <div class="flex justify-between items-center px-4 py-3">

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
          <div class="text-sm font-extrabold text-slate-700 dark:text-white leading-tight">
            arif<span class="font-extralight ml-1">hassan</span>
          </div>
          <div class="text-[7px] font-bold tracking-wider text-slate-400 uppercase">Full-Stack Dev</div>
        </div>
      </a>

      <!-- Mobile hamburger -->
      <div class="menu-toggle">
        <span id="mobile-menu" class="cursor-pointer text-xl text-slate-700 dark:text-slate-200 p-2">
          <i class="fa-solid fa-bars"></i>
        </span>
      </div>
    </div>

    <!-- Mobile dropdown nav -->
    <div class="mount_top_mobile_menu px-4 pb-3">
      <?php wp_nav_menu(array(
        'theme_location' => 'custom_menu',
        'container' => '',
        'menu_class' => '',
        'add_li_class' => '',
        'nav_anchor_class' => 'hover:text-slate-500 dark:hover:text-slate-400'
      )); ?>
    </div>
  </header>

  <!-- LAYOUT WRAPPER -->
  <div class="mount_body">
    <div class="container px-3 md:px-4 xl:p-0 mx-auto relative">
      <div class="site_content w-full relative">

        <!-- LEFT SIDEBAR NAV — desktop only -->
        <aside
          class="left_nav_content hidden lg:flex flex-col fixed top-0 left-0 h-full z-50 w-1/5 bg-white dark:bg-gray-900 border-r border-slate-100 dark:border-slate-800 pl-6 pr-4">

          <!-- Logo block -->
          <div class="pt-8 pb-6 border-b border-slate-100 dark:border-slate-800">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="block no-underline">
              <div class="flex items-center  gap-3">
                <!-- Gray A mark -->
                <div class="flex-shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-11 h-11">
                    <!-- Light mode: dark bg, gray icon -->
                    <rect width="48" height="48" rx="9" fill="#0F172A" class="dark:hidden" />
                    <polygon points="24,6 13,42 19,42 24,20" fill="#F59E0B" class="dark:hidden" />
                    <polygon points="24,6 35,42 29,42 24,20" fill="#F59E0B" class="dark:hidden" />
                    <rect x="14" y="28" width="20" height="3" rx="1.5" fill="#F59E0B" class="dark:hidden" />
                    <circle cx="39" cy="11" r="4" fill="#F59E0B" opacity="0.9" class="dark:hidden" />

                    <!-- Dark mode: light bg, gray icon -->
                    <rect width="48" height="48" rx="9" fill="#F8FAFC" class="hidden dark:block" />
                    <polygon points="24,6 13,42 19,42 24,20" fill="#F59E0B" class="hidden dark:block" />
                    <polygon points="24,6 35,42 29,42 24,20" fill="#F59E0B" class="hidden dark:block" />
                    <rect x="14" y="28" width="20" height="3" rx="1.5" fill="#F59E0B" class="hidden dark:block" />
                    <circle cx="39" cy="11" r="4" fill="#D97706" opacity="0.95" class="hidden dark:block" />
                  </svg>
                </div>

                <div>
                  <div class="text-base font-extrabold text-slate-700 dark:text-white leading-tight">
                    arif<span class="font-extralight ml-1">hassan</span>
                  </div>
                  <div class="text-[7px] font-bold tracking-widest text-slate-400 uppercase mt-0.5">
                    Full-Stack Dev
                  </div>
                </div>
              </div>

              <!-- Gray underline accent -->
              <div class="h-0.5 w-4/5 bg-gradient-to-r from-gray-500 to-transparent rounded-full mt-3"></div>
            </a>
          </div>

          <!-- Nav links -->
          <nav class="flex-1 py-6 overflow-y-auto">
            <ul class="space-y-1">
              <?php
              $nav_items = [
                ['label' => 'About', 'href' => '#about', 'icon' => 'fa-solid fa-user'],
                ['label' => 'Portfolio', 'href' => '#portfolio', 'icon' => 'fa-solid fa-briefcase'],
                ['label' => 'Services', 'href' => '#service', 'icon' => 'fa-solid fa-gear'],
                ['label' => 'Blog', 'href' => '#blog', 'icon' => 'fa-solid fa-pen-nib'],
                ['label' => 'Contact', 'href' => '#contact', 'icon' => 'fa-solid fa-envelope'],
              ];
              foreach ($nav_items as $item): ?>
                <li>
                  <a href="<?php echo $item['href']; ?>"
                    class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-[10px] font-bold tracking-wider uppercase text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-white hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-200 relative overflow-hidden">

                    <!-- Gray left accent bar (slides in on hover) -->
                    <span
                      class="absolute left-0 top-0 bottom-0 w-1 bg-gray-500 rounded-r-full opacity-0 group-hover:opacity-100 transition-opacity duration-200"></span>

                    <!-- Icon -->
                    <span
                      class="w-4 flex items-center justify-center text-xs text-slate-400 dark:text-slate-500 group-hover:text-gray-500 dark:group-hover:text-gray-400 transition-colors duration-200">
                      <i class="<?php echo $item['icon']; ?>"></i>
                    </span>

                    <!-- Label -->
                    <span class="flex-1"><?php echo $item['label']; ?></span>

                    <!-- Hover arrow indicator -->
                    <span
                      class="text-[8px] text-gray-500 opacity-0 group-hover:opacity-100 -translate-x-1 group-hover:translate-x-0 transition-all duration-200">
                      <i class="fa-solid fa-arrow-right"></i>
                    </span>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </nav>

          <!-- Bottom: availability badge + socials -->
          <div class="pb-6 pt-4 border-t border-slate-100 dark:border-slate-800 space-y-4">

            <!-- Availability badge — card style like contact section -->
            <div
              class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 border border-green-200 dark:border-green-800/50 rounded-xl p-3">
              <div class="flex items-start gap-2 text-sm">
                <span class="text-xs mt-0.5">🟢</span>
                <div class="flex-1 min-w-0">
                  <div class="font-bold text-green-900 dark:text-green-100 leading-tight">
                    Available for work
                  </div>
                  <div class="text-xs text-green-700 dark:text-green-400 mt-0.5 tracking-wide">
                    Remote · Freelance
                  </div>
                </div>
              </div>
            </div>

            <!-- Social icons — larger, card-style buttons -->
            <div class="grid grid-cols-4 gap-2">
              <?php
              $socials = [
                ['mod' => 'github_url', 'icon' => 'fa-brands fa-github'],
                ['mod' => 'linkedin_url', 'icon' => 'fa-brands fa-linkedin-in'],
                ['mod' => 'twitter_url', 'icon' => 'fa-brands fa-x-twitter'],
                ['mod' => 'whatsapp_url', 'icon' => 'fa-brands fa-whatsapp'],
                ['mod' => 'facebook_url', 'icon' => 'fa-brands fa-facebook-f'],
                ['mod' => 'instagram_url', 'icon' => 'fa-brands fa-instagram'],
                ['mod' => 'youtube_url', 'icon' => 'fa-brands fa-youtube'],
                ['mod' => 'telegram_url', 'icon' => 'fa-brands fa-telegram'],
              ];
              $count = 0;
              foreach ($socials as $s):
                $url = get_theme_mod($s['mod']);
                if ($url && $count < 8):
                  $count++; ?>
                  <a href="<?php echo esc_url($url); ?>" target="_blank"
                    class="flex items-center justify-center w-9 h-9 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-400 hover:border-gray-400 dark:hover:border-gray-500 hover:text-gray-500 hover:bg-gray-50 dark:hover:bg-gray-900/20 transition-all duration-200 text-xs">
                    <i class="<?php echo $s['icon']; ?>"></i>
                  </a>
                <?php endif; endforeach; ?>
            </div>

          </div>

        </aside>
        <!-- end sidebar -->

      </div>

      <!-- Page body offset for sidebar width -->
      <div class="body_content w-full lg:w-4/5 overflow-hidden relative ml-0 lg:ml-[20%]">