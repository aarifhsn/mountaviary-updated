<?php
/**
 * Template Name: Contact Page
 *
 * @package Mountaviary
 * @since Mountaviary 1.0.0
 */

get_header('topnav');
?>

<main class="bg-white dark:bg-gray-950 min-h-screen font-poppins">
    <div style="max-width:1200px; margin:0 auto; padding:3rem 1.5rem 5rem;">

        <!-- Page Header -->
        <div class="mb-12">
            <p class="text-xs font-bold uppercase tracking-widest text-slate-300 dark:text-slate-600 mb-2"
                style="letter-spacing:1.5px;">Get in touch</p>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-slate-50 mb-3">
                <?php echo esc_html(get_theme_mod('mountaviary_front_contact_page_title', 'Contact Me')); ?>
            </h1>
            <p class="text-sm text-slate-400 dark:text-slate-500 max-w-md">
                Have a project in mind or just want to say hello? Fill out the form or reach out directly.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-10">

            <!-- LEFT: Contact Info -->
            <div class="lg:col-span-2 flex flex-col gap-6">

                <!-- Info Cards -->
                <?php
                $contact_items = [
                    [
                        'icon' => 'fa-solid fa-phone',
                        'label' => 'Phone',
                        'value' => get_theme_mod('mountaviary_front_contact_page_phone'),
                        'href' => 'tel:' . get_theme_mod('mountaviary_front_contact_page_phone'),
                    ],
                    [
                        'icon' => 'fa-solid fa-envelope',
                        'label' => 'Email',
                        'value' => get_theme_mod('mountaviary_front_contact_page_email'),
                        'href' => 'mailto:' . get_theme_mod('mountaviary_front_contact_page_email'),
                    ],
                    [
                        'icon' => 'fa-solid fa-location-dot',
                        'label' => 'Location',
                        'value' => get_theme_mod('mountaviary_front_contact_page_location_text'),
                        'href' => null,
                    ],
                ];
                foreach ($contact_items as $item):
                    if (!$item['value'])
                        continue;
                    ?>
                    <div
                        class="flex items-start gap-4 p-4 rounded-xl border border-slate-100 dark:border-slate-800 hover:border-slate-200 dark:hover:border-slate-700 transition-colors">
                        <div
                            class="w-9 h-9 flex-shrink-0 flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 text-sm">
                            <i class="<?php echo esc_attr($item['icon']); ?>"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-widest text-slate-300 dark:text-slate-600 mb-0.5"
                                style="letter-spacing:1.5px;"><?php echo esc_html($item['label']); ?></p>
                            <?php if ($item['href']): ?>
                                <a href="<?php echo esc_url($item['href']); ?>"
                                    class="text-sm font-semibold text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white transition-colors no-underline">
                                    <?php echo esc_html($item['value']); ?>
                                </a>
                            <?php else: ?>
                                <p class="text-sm font-semibold text-slate-700 dark:text-slate-300">
                                    <?php echo esc_html($item['value']); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Social Links -->
                <?php
                $socials = [
                    ['mod' => 'github_url', 'icon' => 'fa-brands fa-github', 'label' => 'GitHub'],
                    ['mod' => 'twitter_url', 'icon' => 'fa-brands fa-x-twitter', 'label' => 'Twitter'],
                    ['mod' => 'linkedin_url', 'icon' => 'fa-brands fa-linkedin-in', 'label' => 'LinkedIn'],
                    ['mod' => 'whatsapp_url', 'icon' => 'fa-brands fa-whatsapp', 'label' => 'WhatsApp'],
                    ['mod' => 'facebook_url', 'icon' => 'fa-brands fa-facebook-f', 'label' => 'Facebook'],
                    ['mod' => 'instagram_url', 'icon' => 'fa-brands fa-instagram', 'label' => 'Instagram'],
                    ['mod' => 'telegram_url', 'icon' => 'fa-brands fa-telegram', 'label' => 'Telegram'],
                    ['mod' => 'youtube_url', 'icon' => 'fa-brands fa-youtube', 'label' => 'YouTube'],
                ];
                $has_socials = false;
                foreach ($socials as $s) {
                    if (get_theme_mod($s['mod'])) {
                        $has_socials = true;
                        break;
                    }
                }
                if ($has_socials): ?>
                    <div class="pt-2">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-300 dark:text-slate-600 mb-3"
                            style="letter-spacing:1.5px;">Find me on</p>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($socials as $s):
                                $url = get_theme_mod($s['mod']);
                                if ($url): ?>
                                    <a href="<?php echo esc_url($url); ?>" target="_blank"
                                        aria-label="<?php echo esc_attr($s['label']); ?>" class="w-9 h-9 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-700
                      text-slate-400 dark:text-slate-500 text-sm
                      hover:text-slate-800 dark:hover:text-slate-200
                      hover:bg-slate-100 dark:hover:bg-slate-800
                      hover:border-slate-300 dark:hover:border-slate-600
                      transition-all no-underline">
                                        <i class="<?php echo esc_attr($s['icon']); ?>"></i>
                                    </a>
                                <?php endif; endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Map -->
                <?php $map_url = get_theme_mod('mountaviary_frontpage_map_url');
                if ($map_url): ?>
                    <div class="overflow-hidden rounded-xl border border-slate-100 dark:border-slate-800"
                        style="height:200px;">
                        <iframe src="<?php echo esc_url($map_url); ?>" width="100%" height="200" style="border:0;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                <?php endif; ?>

            </div>

            <!-- RIGHT: Contact Form -->
            <div class="lg:col-span-3">
                <div class="p-6 sm:p-8 rounded-2xl border border-slate-100 dark:border-slate-800">

                    <h2 class="text-lg font-extrabold text-slate-900 dark:text-slate-50 mb-6">Send a message</h2>

                    <?php
                    $contact_form = get_theme_mod('mountaviary_contact_form');
                    if ($contact_form):
                        // Use plugin shortcode (e.g. WPForms, CF7)
                        echo do_shortcode($contact_form);
                    else:
                        // Fallback: native HTML form
                        ?>
                        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>"
                            class="flex flex-col gap-4">
                            <input type="hidden" name="action" value="mountaviary_contact_form">
                            <?php wp_nonce_field('mountaviary_contact_nonce', 'contact_nonce'); ?>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label
                                        class="block text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-1.5"
                                        style="letter-spacing:1.5px;">Name</label>
                                    <input type="text" name="contact_name" required placeholder="Your name" class="w-full px-4 py-3 rounded-xl text-sm border border-slate-200 dark:border-slate-700
                      bg-white dark:bg-slate-900
                      text-slate-800 dark:text-slate-200
                      placeholder-slate-300 dark:placeholder-slate-600
                      focus:outline-none focus:border-slate-400 dark:focus:border-slate-500
                      transition-colors" />
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-1.5"
                                        style="letter-spacing:1.5px;">Email</label>
                                    <input type="email" name="contact_email" required placeholder="your@email.com" class="w-full px-4 py-3 rounded-xl text-sm border border-slate-200 dark:border-slate-700
                      bg-white dark:bg-slate-900
                      text-slate-800 dark:text-slate-200
                      placeholder-slate-300 dark:placeholder-slate-600
                      focus:outline-none focus:border-slate-400 dark:focus:border-slate-500
                      transition-colors" />
                                </div>
                            </div>

                            <div>
                                <label
                                    class="block text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-1.5"
                                    style="letter-spacing:1.5px;">Subject</label>
                                <input type="text" name="contact_subject" placeholder="What's this about?" class="w-full px-4 py-3 rounded-xl text-sm border border-slate-200 dark:border-slate-700
                    bg-white dark:bg-slate-900
                    text-slate-800 dark:text-slate-200
                    placeholder-slate-300 dark:placeholder-slate-600
                    focus:outline-none focus:border-slate-400 dark:focus:border-slate-500
                    transition-colors" />
                            </div>

                            <div>
                                <label
                                    class="block text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-1.5"
                                    style="letter-spacing:1.5px;">Message</label>
                                <textarea name="contact_message" required rows="6" placeholder="Tell me about your project…"
                                    class="w-full px-4 py-3 rounded-xl text-sm border border-slate-200 dark:border-slate-700
                    bg-white dark:bg-slate-900
                    text-slate-800 dark:text-slate-200
                    placeholder-slate-300 dark:placeholder-slate-600
                    focus:outline-none focus:border-slate-400 dark:focus:border-slate-500
                    transition-colors resize-none"></textarea>
                            </div>

                            <button type="submit" class="self-start px-6 py-3 rounded-xl text-sm font-bold transition-all
                  bg-slate-900 dark:bg-slate-100
                  text-white dark:text-slate-900
                  hover:bg-slate-700 dark:hover:bg-white
                  cursor-pointer border-0">
                                Send Message <i class="fa-solid fa-paper-plane ml-1.5 text-xs"></i>
                            </button>

                        </form>
                    <?php endif; ?>

                    <!-- Success / Error message -->
                    <?php
                    if (isset($_GET['contact']) && $_GET['contact'] === 'success'): ?>
                        <div
                            class="mt-4 p-4 rounded-xl bg-emerald-50 dark:bg-emerald-950 border border-emerald-200 dark:border-emerald-800">
                            <p class="text-sm font-semibold text-emerald-700 dark:text-emerald-400">
                                <i class="fa-solid fa-circle-check mr-2"></i>
                                Message sent successfully. I'll get back to you soon!
                            </p>
                        </div>
                    <?php elseif (isset($_GET['contact']) && $_GET['contact'] === 'error'): ?>
                        <div
                            class="mt-4 p-4 rounded-xl bg-red-50 dark:bg-red-950 border border-red-200 dark:border-red-800">
                            <p class="text-sm font-semibold text-red-700 dark:text-red-400">
                                <i class="fa-solid fa-circle-exclamation mr-2"></i>
                                Something went wrong. Please try again or email directly.
                            </p>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

        </div>

    </div>
</main>

<?php get_footer(); ?>