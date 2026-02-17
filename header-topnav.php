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

  <!-- ═══════════════════════════════════════════════
       DARK MODE TOGGLE
  ════════════════════════════════════════════════ -->
  <div class="fixed bottom-8 right-6 z-50">
    <button id="dark-mode-toggle"
      class="w-10 h-10 flex items-center justify-center rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 shadow-md hover:shadow-lg transition-all duration-300">
      <span id="dark-mode-icon" class="text-base">🔆</span>
    </button>
  </div>

  <!-- ═══════════════════════════════════════════════
       TOP NAVBAR — fixed, full width
  ════════════════════════════════════════════════ -->
  <header id="site-header"
    style="position:fixed; top:0; left:0; width:100%; z-index:50; transition:all 0.3s; background:rgba(255,255,255,0.92); backdrop-filter:blur(12px); -webkit-backdrop-filter:blur(12px); border-bottom:1px solid #F1F5F9;"
    class="dark:bg-opacity-90 dark:border-slate-800" x-data="{ open: false }">

    <div
      style="max-width:1280px; margin:0 auto; padding:0 2rem; display:flex; align-items:center; justify-content:space-between; height:64px;">

      <!-- ── LOGO ── -->
      <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"
        style="text-decoration:none; display:flex; align-items:center; gap:12px; flex-shrink:0;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="40" height="40">
          <rect width="48" height="48" rx="9" fill="#0F172A" />
          <polygon points="24,6 13,42 19,42 24,20" fill="#F59E0B" />
          <polygon points="24,6 35,42 29,42 24,20" fill="#F59E0B" />
          <rect x="14" y="28" width="20" height="3" rx="1.5" fill="#F59E0B" />
          <circle cx="39" cy="11" r="4" fill="#F59E0B" opacity="0.9" />
        </svg>
        <div>
          <div style="font-size:16px; font-weight:800; color:#0F172A; letter-spacing:-0.3px; line-height:1.1;"
            class="dark:text-white">
            arif<span style="font-weight:200;">hassan</span>
          </div>
          <div style="font-size:7.5px; font-weight:700; letter-spacing:3px; color:#94A3B8; text-transform:uppercase;">
            Full-Stack Dev</div>
        </div>
      </a>

      <!-- ── DESKTOP NAV LINKS ── -->
      <nav style="display:flex; align-items:center; gap:4px;" class="hidden lg:flex">
        <?php
        $nav_items = [
          ['label' => 'Portfolio', 'href' => '#portfolio'],
          ['label' => 'Services', 'href' => '#service'],
          ['label' => 'About', 'href' => '#about'],
          ['label' => 'Blog', 'href' => '#blog'],
        ];
        foreach ($nav_items as $item): ?>
          <a href="<?php echo $item['href']; ?>"
            style="font-size:11px; font-weight:700; letter-spacing:2px; text-transform:uppercase; color:#64748B; text-decoration:none; padding:8px 14px; border-radius:8px; transition:all 0.2s;"
            class="dark:text-slate-400" onmouseover="this.style.color='#0F172A'; this.style.background='#F8FAFC';"
            onmouseout="this.style.color=''; this.style.background='';">
            <?php echo $item['label']; ?>
          </a>
        <?php endforeach; ?>

        <!-- Contact — amber CTA button -->
        <a href="#contact"
          style="font-size:11px; font-weight:700; letter-spacing:2px; text-transform:uppercase; color:#0F172A; text-decoration:none; padding:8px 18px; border-radius:8px; background:#F59E0B; margin-left:8px; transition:all 0.2s;"
          onmouseover="this.style.background='#D97706';" onmouseout="this.style.background='#F59E0B';">
          Contact
        </a>
      </nav>

      <!-- ── DESKTOP SOCIAL ICONS ── -->
      <div style="display:flex; align-items:center; gap:8px;" class="hidden lg:flex">
        <?php
        $socials = [
          ['mod' => 'github_url', 'icon' => 'fa-brands fa-github'],
          ['mod' => 'linkedin_url', 'icon' => 'fa-brands fa-linkedin-in'],
          ['mod' => 'twitter_url', 'icon' => 'fa-brands fa-x-twitter'],
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

        <!-- Availability dot -->
        <div
          style="display:flex; align-items:center; gap:5px; padding:5px 10px; border-radius:20px; background:#F0FDF4; border:1px solid #BBF7D0; margin-left:4px;">
          <span style="width:7px; height:7px; border-radius:50%; background:#22C55E; display:inline-block;"></span>
          <span
            style="font-size:9px; font-weight:700; color:#15803D; letter-spacing:1px; text-transform:uppercase;">Available</span>
        </div>
      </div>

      <!-- ── MOBILE HAMBURGER ── -->
      <button id="mobile-menu-btn"
        style="display:flex; align-items:center; justify-content:center; width:40px; height:40px; border-radius:8px; border:1px solid #E2E8F0; background:transparent; cursor:pointer; color:#64748B;"
        class="lg:hidden" onclick="document.getElementById('mobile-nav').classList.toggle('hidden');">
        <i class="fa-solid fa-bars"></i>
      </button>

    </div>

    <!-- ── MOBILE DROPDOWN NAV ── -->
    <div id="mobile-nav" class="hidden lg:hidden"
      style="border-top:1px solid #F1F5F9; background:rgba(255,255,255,0.97); backdrop-filter:blur(12px);">
      <div style="padding:12px 24px 20px; display:flex; flex-direction:column; gap:2px;">
        <?php
        $all_items = [
          ['label' => 'Portfolio', 'href' => '#portfolio'],
          ['label' => 'Services', 'href' => '#service'],
          ['label' => 'About', 'href' => '#about'],
          ['label' => 'Blog', 'href' => '#blog'],
          ['label' => 'Contact', 'href' => '#contact'],
        ];
        foreach ($all_items as $item): ?>
          <a href="<?php echo $item['href']; ?>" onclick="document.getElementById('mobile-nav').classList.add('hidden');"
            style="font-size:12px; font-weight:700; letter-spacing:2px; text-transform:uppercase; color:#475569; text-decoration:none; padding:12px 0; border-bottom:1px solid #F8FAFC;">
            <?php echo $item['label']; ?>
          </a>
        <?php endforeach; ?>

        <!-- Mobile availability -->
        <div style="display:flex; align-items:center; gap:8px; padding-top:16px;">
          <span style="font-size:10px;">🟢</span>
          <span style="font-size:10px; font-weight:700; color:#64748B;">Available for freelance &amp; remote work</span>
        </div>
      </div>
    </div>

  </header>

  <!-- Spacer to offset fixed navbar height -->
  <div style="height:64px;"></div>

  <!-- ═══════════════════════════════════════════════
       PAGE BODY — full width, no sidebar offset
  ════════════════════════════════════════════════ -->
  <div class="mount_body">
    <div class="body_content w-full overflow-hidden relative">