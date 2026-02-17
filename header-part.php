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
      <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"
        style="text-decoration:none; display:flex; align-items:center; gap:10px;">
        <!-- Amber A icon -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="36" height="36">
          <rect width="48" height="48" rx="8" fill="#0F172A" class="dark:fill-amber-400" />
          <polygon points="24,6 13,42 19,42 24,20" fill="#F59E0B" />
          <polygon points="24,6 35,42 29,42 24,20" fill="#F59E0B" />
          <rect x="14" y="28" width="20" height="3" rx="1.5" fill="#F59E0B" />
          <circle cx="39" cy="11" r="4" fill="#F59E0B" opacity="0.9" />
        </svg>
        <div>
          <div style="font-size:14px; font-weight:800; color:#0F172A; letter-spacing:-0.3px; line-height:1.1;"
            class="dark:text-white">
            arif<span style="font-weight:200;">hassan</span>
          </div>
          <div style="font-size:8px; font-weight:600; letter-spacing:2px; color:#94A3B8; text-transform:uppercase;">
            Full-Stack Dev</div>
        </div>
      </a>

      <!-- Mobile hamburger -->
      <span id="mobile-menu" class="cursor-pointer text-xl text-slate-700 dark:text-slate-200 p-2">
        <i class="fa-solid fa-bars"></i>
      </span>
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
        <aside class="left_nav_content hidden lg:flex flex-col fixed top-0 left-0 h-full z-50 w-1/5
          bg-white dark:bg-gray-900
          border-r border-slate-100 dark:border-slate-800
          pl-8 pr-4">

          <!-- Logo block -->
          <div class="pt-10 pb-8 border-b border-slate-100 dark:border-slate-800">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"
              style="text-decoration:none; display:flex; align-items:center; gap:12px;">

              <!-- Amber A mark — dark mode flips bg -->
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="44" height="44" style="flex-shrink:0;">
                <!-- Dark mode: amber bg, dark icon | Light mode: dark bg, amber icon -->
                <rect width="48" height="48" rx="9" fill="#0F172A" class="dark-rect" />
                <polygon points="24,6 13,42 19,42 24,20" fill="#F59E0B" />
                <polygon points="24,6 35,42 29,42 24,20" fill="#F59E0B" />
                <rect x="14" y="28" width="20" height="3" rx="1.5" fill="#F59E0B" />
                <circle cx="39" cy="11" r="4" fill="#F59E0B" opacity="0.9" />
              </svg>

              <div>
                <div style="font-size:17px; font-weight:800; color:#0F172A; letter-spacing:-0.3px; line-height:1.2;"
                  class="dark:text-white site-title-text">
                  arif<span style="font-weight:200;">hassan</span>
                </div>
                <div
                  style="font-size:8px; font-weight:700; letter-spacing:3px; color:#94A3B8; text-transform:uppercase; margin-top:2px;">
                  Full-Stack Dev
                </div>
              </div>
            </a>

            <!-- Amber underline accent -->
            <div style="height:2px; width:80%; background:#F59E0B; border-radius:1px; margin-top:14px;"></div>
          </div>

          <!-- Nav links -->
          <nav class="flex-1 py-8">
            <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:2px;">

              <?php
              $nav_items = [
                ['label' => 'Portfolio', 'href' => '#portfolio', 'icon' => 'fa-solid fa-briefcase'],
                ['label' => 'Services', 'href' => '#service', 'icon' => 'fa-solid fa-gear'],
                ['label' => 'About', 'href' => '#about', 'icon' => 'fa-solid fa-user'],
                ['label' => 'Blog', 'href' => '#blog', 'icon' => 'fa-solid fa-pen-nib'],
                ['label' => 'Contact', 'href' => '#contact', 'icon' => 'fa-solid fa-envelope'],
              ];
              foreach ($nav_items as $item): ?>
                <li>
                  <a href="<?php echo $item['href']; ?>"
                    style="display:flex; align-items:center; gap:12px; padding:10px 14px; border-radius:10px; text-decoration:none; font-size:11px; font-weight:700; letter-spacing:2px; text-transform:uppercase; color:#64748B; transition:all 0.2s;"
                    class="nav-link-item dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white"
                    onmouseover="this.style.color='#0F172A'; this.querySelector('.nav-accent').style.opacity='1';"
                    onmouseout="this.style.color=''; this.querySelector('.nav-accent').style.opacity='0';">
                    <!-- Amber left accent bar -->
                    <span class="nav-accent"
                      style="width:3px; height:18px; background:#F59E0B; border-radius:2px; flex-shrink:0; opacity:0; transition:opacity 0.2s;"></span>
                    <i class="<?php echo $item['icon']; ?>" style="font-size:13px; width:16px; text-align:center;"></i>
                    <?php echo $item['label']; ?>
                  </a>
                </li>
              <?php endforeach; ?>

            </ul>
          </nav>

          <!-- Bottom: availability badge -->
          <div class="pb-8" style="border-top:1px solid #F1F5F9; padding-top:20px;">
            <div style="display:flex; align-items:center; gap:8px;">
              <span style="font-size:10px;">🟢</span>
              <div>
                <div style="font-size:10px; font-weight:700; color:#0F172A;" class="dark:text-slate-200">Available for
                  work</div>
                <div style="font-size:9px; color:#94A3B8; letter-spacing:0.5px;">Remote · Freelance</div>
              </div>
            </div>

            <!-- Social icons row -->
            <div style="display:flex; gap:8px; margin-top:16px; flex-wrap:wrap;">
              <?php
              $socials = [
                ['mod' => 'github_url', 'icon' => 'fa-brands fa-github'],
                ['mod' => 'linkedin_url', 'icon' => 'fa-brands fa-linkedin-in'],
                ['mod' => 'twitter_url', 'icon' => 'fa-brands fa-x-twitter'],
                ['mod' => 'whatsapp_url', 'icon' => 'fa-brands fa-whatsapp'],
              ];
              foreach ($socials as $s):
                $url = get_theme_mod($s['mod']);
                if ($url): ?>
                  <a href="<?php echo esc_url($url); ?>" target="_blank"
                    style="width:32px; height:32px; border-radius:8px; border:1px solid #E2E8F0; display:flex; align-items:center; justify-content:center; font-size:12px; color:#64748B; text-decoration:none; transition:all 0.2s;"
                    onmouseover="this.style.borderColor='#F59E0B'; this.style.color='#F59E0B';"
                    onmouseout="this.style.borderColor='#E2E8F0'; this.style.color='#64748B';">
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