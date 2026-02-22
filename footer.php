<?php
/**
 * The template for displaying the footer
 *
 * @package Mountaviary
 * @since Mountaviary 1.0.0
 */
?>
</div><!-- end body_content -->
</div><!-- end mount_body -->

<footer class="font-poppins bg-white dark:bg-gray-950 border-t border-slate-100 dark:border-slate-800">
  <div style="max-width:1200px; margin:0 auto; padding:2.5rem 1.5rem 2rem;">

    <!-- Top row: Logo + Nav -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">

      <!-- Logo -->
      <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"
        style="text-decoration:none; display:flex; align-items:center; gap:10px; flex-shrink:0;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="30" height="30">
          <rect width="48" height="48" rx="8" fill="#0F172A" />
          <g transform="translate(9, 9) scale(0.513, 0.513)">
            <path fill="white" fill-rule="evenodd" clip-rule="evenodd"
              d="M0.001,60.789c-0.035-1.043,0.688-1.877,1.143-2.73c1.366-2.564,2.773-5.168,4.073-7.799c0.877-1.774,1.632-3.578,2.682-5.266c1.522-2.443,2.786-5.109,4.123-7.748c1.328-2.621,2.551-5.293,3.974-7.896c0.907-1.66,1.74-3.559,2.781-5.115c1.132-1.693,2.556-2.883,5.066-3.031c1.251-0.072,2.631,0.051,4.023,0.051c2.819,0,5.181,0.096,8.146,0c0.917-0.029,3.203-0.285,3.477,0.397c0.23,0.572-0.667,1.922-0.993,2.533C33.044,34.4,27.843,44.621,22.402,54.879c-1.497,2.822-2.565,5.977-6.358,6.408c-1.579,0.178-3.569,0.088-5.513,0.049c-2.601-0.051-5.559-0.049-8.245-0.049C1.479,61.287,0.464,61.498,0.001,60.789z" />
            <path fill="white" fill-rule="evenodd" clip-rule="evenodd"
              d="M59.852,60.84c-0.643,0.906-2.301,0.648-3.725,0.596c-2.814-0.105-5.394-0.051-8.344-0.051c-1.988,0-4.132,0.225-5.563-0.348c-2.343-0.936-3.468-3.621-4.619-5.91c-0.661-1.314-1.435-2.611-2.136-3.873c-0.689-1.24-1.352-2.598-2.086-3.975C33.049,46.66,32.7,46,32.336,45.293c-0.449-0.869-1.65-2.438-0.199-2.682c1.135-0.191,2.587,0,3.924,0c2.558,0,5.311-0.101,7.848,0c2.417,0.096,4.574-0.219,6.159,0.744c1.861,1.131,2.852,3.371,3.725,5.414c0.437,1.024,1.022,2.033,1.54,3.029c1.026,1.978,2.035,3.959,3.08,5.961C58.934,58.76,59.591,59.713,59.852,60.84z" />
          </g>
        </svg>
        <div>
          <div style="font-size:14px; font-weight:800; letter-spacing:-0.3px; line-height:1.1;"
            class="text-slate-700 dark:text-white">
            arif <span style="font-weight:300;">hassan</span>
          </div>
          <div style="font-size:7px; font-weight:700; letter-spacing:3px; text-transform:uppercase; line-height:1.4;"
            class="text-slate-300 dark:text-slate-600">dev · blog</div>
        </div>
      </a>

      <!-- Right: Nav + Socials -->
      <div class="flex flex-col sm:flex-row items-start sm:items-center gap-5 sm:gap-8">

        <!-- Footer Nav Menu -->
        <?php if (has_nav_menu('footer_menu')): ?>
          <?php wp_nav_menu([
            'theme_location' => 'footer_menu',
            'container' => 'nav',
            'container_class' => 'footer-nav-wrap  mr-2',
            'menu_class' => 'footer-menu-list',
            'fallback_cb' => false,
          ]);
        endif; ?>

        <!-- Divider -->
        <div class="hidden sm:block w-px h-4 bg-slate-200 dark:bg-slate-700"></div>

        <!-- Social icons -->
        <div class="flex items-center gap-2">
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
        </div>

      </div>
    </div>

    <!-- Bottom: Copyright -->
    <div
      class="mt-6 pt-5 border-t border-slate-100 dark:border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-2">

      <?php if (get_option('mountaviary_footer_option_setting', 1)): ?>
        <p class="text-xs text-slate-400 dark:text-slate-600">
          &copy;<?php echo date('Y'); ?>
          <a href="<?php echo esc_url(home_url('/')); ?>"
            class="hover:text-slate-600 dark:hover:text-slate-400 transition-colors" style="text-decoration:none;">
            <?php echo esc_html(get_bloginfo('name')); ?>
          </a>
          — <?php echo esc_html(get_theme_mod('mountaviary_footer_text', 'All Rights Reserved.')); ?>
        </p>
      <?php else: ?>
        <p class="text-xs text-slate-400 dark:text-slate-600">
          &copy;<?php echo date('Y'); ?>   <?php echo esc_html(get_bloginfo('name')); ?>
        </p>
      <?php endif; ?>
    </div>

  </div>
</footer>

<script>
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      document.getElementById('global-search').classList.add('hidden');
    }
  });
</script>

<?php wp_footer(); ?>
</body>

</html>