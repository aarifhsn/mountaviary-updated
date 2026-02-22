<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
  <meta charset="<?php bloginfo('charset') ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>

<body <?php body_class('font-poppins  w-full mx-auto transition-all scroll-smooth bg-white    dark:bg-gray-950'); ?>>

  <?php if (function_exists('wp_body_open')) {
    wp_body_open();
  } ?>

  <!-- DARK MODE TOGGLE -->
  <div class="fixed bottom-8 right-6 z-50">
    <button id="dark-mode-toggle"
      class="w-10 h-10 flex items-center justify-center rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-md hover:shadow-lg transition-all duration-300">
      <span id="dark-mode-icon" class="text-sm">🔆</span>
    </button>
  </div>

  <!-- HEADER -->
  <header id="site-header" style="position:fixed; top:0; left:0; width:100%; z-index:50; transition:all 0.3s;"
    class="bg-white/80 dark:bg-gray-950/80 backdrop-blur-lg border-b border-slate-100 dark:border-slate-800">

    <div
      style="max-width:1200px; margin:0 auto; padding:0 1.5rem; display:flex; align-items:center; justify-content:space-between; height:64px;">

      <!-- LOGO -->
      <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"
        style="text-decoration:none; display:flex; align-items:center; gap:10px; flex-shrink:0;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="34" height="34">
          <rect width="48" height="48" rx="8" fill="#0F172A" />
          <g transform="translate(9, 9) scale(0.513, 0.513)">
            <path fill="white" fill-rule="evenodd" clip-rule="evenodd"
              d="M0.001,60.789c-0.035-1.043,0.688-1.877,1.143-2.73c1.366-2.564,2.773-5.168,4.073-7.799c0.877-1.774,1.632-3.578,2.682-5.266c1.522-2.443,2.786-5.109,4.123-7.748c1.328-2.621,2.551-5.293,3.974-7.896c0.907-1.66,1.74-3.559,2.781-5.115c1.132-1.693,2.556-2.883,5.066-3.031c1.251-0.072,2.631,0.051,4.023,0.051c2.819,0,5.181,0.096,8.146,0c0.917-0.029,3.203-0.285,3.477,0.397c0.23,0.572-0.667,1.922-0.993,2.533C33.044,34.4,27.843,44.621,22.402,54.879c-1.497,2.822-2.565,5.977-6.358,6.408c-1.579,0.178-3.569,0.088-5.513,0.049c-2.601-0.051-5.559-0.049-8.245-0.049C1.479,61.287,0.464,61.498,0.001,60.789z" />
            <path fill="white" fill-rule="evenodd" clip-rule="evenodd"
              d="M59.852,60.84c-0.643,0.906-2.301,0.648-3.725,0.596c-2.814-0.105-5.394-0.051-8.344-0.051c-1.988,0-4.132,0.225-5.563-0.348c-2.343-0.936-3.468-3.621-4.619-5.91c-0.661-1.314-1.435-2.611-2.136-3.873c-0.689-1.24-1.352-2.598-2.086-3.975C33.049,46.66,32.7,46,32.336,45.293c-0.449-0.869-1.65-2.438-0.199-2.682c1.135-0.191,2.587,0,3.924,0c2.558,0,5.311-0.101,7.848,0c2.417,0.096,4.574-0.219,6.159,0.744c1.861,1.131,2.852,3.371,3.725,5.414c0.437,1.024,1.022,2.033,1.54,3.029c1.026,1.978,2.035,3.959,3.08,5.961C58.934,58.76,59.591,59.713,59.852,60.84z" />
          </g>
        </svg>
        <div>
          <div style="font-size:16px; font-weight:800; letter-spacing:-0.3px; line-height:1.1;"
            class="text-slate-700 dark:text-white">
            arif <span style="font-weight:300;">hassan</span>
          </div>
          <div style="font-size:7px; font-weight:700; letter-spacing:3px; text-transform:uppercase; line-height:1;"
            class="text-slate-400 dark:text-slate-600">dev · blog</div>
        </div>
      </a>

      <!-- DESKTOP NAV — hidden on mobile, visible md+ -->
      <nav class="hidden md:flex items-center gap-1">
        <div class="mount_top_menu mr-4">
          <?php wp_nav_menu(array(
            'theme_location' => 'screen_menu',
            'container' => '',
            'menu_class' => 'menu_list',
          )); ?>
        </div>

        <!-- Search toggle button -->
        <button id="search-toggle"
          class="w-8 h-8 flex items-center justify-center rounded-lg text-slate-400 dark:text-slate-500 hover:text-slate-800 dark:hover:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-all duration-200"
          onclick="document.getElementById('global-search').classList.toggle('hidden');">
          <i class="fa-solid fa-magnifying-glass text-xs"></i>
        </button>

        <div class="w-px h-4 mx-2 bg-slate-200 dark:bg-slate-700"></div>

        <?php
        $socials = [
          ['mod' => 'github_url', 'icon' => 'fa-brands fa-github'],
          ['mod' => 'twitter_url', 'icon' => 'fa-brands fa-x-twitter'],
          ['mod' => 'linkedin_url', 'icon' => 'fa-brands fa-linkedin-in'],
          ['mod' => 'whatsapp_url', 'icon' => 'fa-brands fa-whatsapp'],
          ['mod' => 'facebook_url', 'icon' => 'fa-brands fa-facebook-f'],
          ['mod' => 'instagram_url', 'icon' => 'fa-brands fa-instagram'],
          ['mod' => 'youtube_url', 'icon' => 'fa-brands fa-youtube'],
          ['mod' => 'telegram_url', 'icon' => 'fa-brands fa-telegram'],

        ];
        foreach ($socials as $s):
          $url = get_theme_mod($s['mod']);
          if ($url): ?>
            <a href="<?php echo esc_url($url); ?>" target="_blank"
              class="w-8 h-8 flex items-center justify-center rounded-lg text-slate-400 dark:text-slate-500 hover:text-slate-800 dark:hover:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-all duration-200 text-xs p-2 gap-4 border border-slate-200 dark:border-slate-700"
              style="text-decoration:none;">
              <i class="<?php echo esc_attr($s['icon']); ?>"></i>
            </a>
          <?php endif; endforeach; ?>
      </nav>

      <!-- MOBILE HAMBURGER — visible only on mobile -->
      <div class="md:hidden flex items-center gap-2">

        <!-- Mobile search toggle -->
        <button
          class="flex items-center justify-center w-9 h-9 rounded-lg border border-slate-200 dark:border-slate-700 text-slate-500 dark:text-slate-400 bg-transparent cursor-pointer transition-all hover:bg-slate-50 dark:hover:bg-slate-800"
          onclick="document.getElementById('global-search').classList.toggle('hidden');" aria-label="Search">
          <i class="fa-solid fa-magnifying-glass text-xs"></i>
        </button>

        <!-- Hamburger -->
        <button
          class="flex items-center justify-center w-9 h-9 rounded-lg border border-slate-200 dark:border-slate-700 text-slate-500 dark:text-slate-400 bg-transparent cursor-pointer transition-all hover:bg-slate-50 dark:hover:bg-slate-800"
          onclick="document.getElementById('mobile-nav').classList.toggle('hidden');" aria-label="Toggle menu">
          <i class="fa-solid fa-bars text-xs"></i>
        </button>

      </div>

    </div>

    <!-- MOBILE NAV DROPDOWN — hidden by default, shown on mobile only -->
    <div id="mobile-nav"
      class="hidden md:hidden border-t border-slate-100 dark:border-slate-800 bg-white dark:bg-gray-950">
      <div style="max-width:1200px; margin:0 auto; padding:0 1.5rem;">
        <div class="py-4 flex flex-col gap-1">
          <div class="mount_top_menu mobile">
            <?php wp_nav_menu(array(
              'theme_location' => 'screen_menu',
              'container' => '',
              'menu_class' => 'menu_list',
            )); ?>
          </div>

          <!-- Social icons in mobile menu -->
          <div class="flex items-center gap-2 pt-3 mt-1 border-t border-slate-100 dark:border-slate-800">
            <?php foreach ($socials as $s):
              $url = get_theme_mod($s['mod']);
              if ($url): ?>
                <a href="<?php echo esc_url($url); ?>" target="_blank"
                  class="w-8 h-8 flex items-center justify-center rounded-lg text-slate-400 dark:text-slate-500 hover:text-slate-800 dark:hover:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-all duration-200 text-xs p-2 gap-4 border border-slate-200 dark:border-slate-700"
                  style="text-decoration:none;">
                  <i class="<?php echo esc_attr($s['icon']); ?>"></i>
                </a>
              <?php endif; endforeach; ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Global Search Overlay -->
    <div id="global-search"
      class="hidden absolute left-0 top-full w-full border-t border-slate-200 dark:border-slate-700 bg-white dark:bg-gray-950 shadow-xl">
      <div style="max-width:1200px; margin:0 auto; padding:1rem 1.5rem;">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3">

          <i class="fa-solid fa-magnifying-glass text-sm text-slate-500 dark:text-slate-400"></i>

          <input type="search" name="s" placeholder="Search posts…" value="<?php echo esc_attr(get_search_query()); ?>"
            autofocus class="flex-1 bg-transparent text-sm font-medium text-slate-800 dark:text-slate-100
          placeholder-slate-400 dark:placeholder-slate-500
          border border-slate-200 dark:border-slate-700 py-2 px-4 rounded-lg" />

          <button type="submit" class="px-3 py-1.5 rounded-lg text-xs font-bold uppercase tracking-widest transition-colors
          bg-slate-100 dark:bg-slate-800
          text-slate-600 dark:text-slate-300
          hover:bg-slate-200 dark:hover:bg-slate-700
          hover:text-slate-700 dark:hover:text-white" style="letter-spacing:1.5px;">Go
          </button>

          <button type="button" onclick="document.getElementById('global-search').classList.add('hidden');" class="w-7 h-7 flex items-center justify-center rounded-lg transition-colors
          text-slate-500 dark:text-slate-400
          hover:text-slate-700 dark:hover:text-white
          hover:bg-slate-100 dark:hover:bg-slate-800">
            <i class="fa-solid fa-xmark text-sm"></i>
          </button>

        </form>
      </div>
    </div>

  </header>

  <!-- Spacer for fixed header -->
  <div style="height:64px;"></div>

  <div class="mount_body">
    <div class="body_content w-full overflow-hidden relative">