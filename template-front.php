<?php
/* 
 * Template Name: Custom Front Page 
 */

get_header('part'); ?>

<?php if (get_option('front_page_user_info', 1)) { ?>
  <section id="home"
    class="devs_top_info min-h-[480px] md:min-h-screen flex justify-center items-center text-start px-4 lg:px-16 xl:px-36 pt-24 md:py-0 mb-12 md:my-2 bg-contain bg-center bg-no-repeat relative">
    <div class="devs_top_content">
      <h2 class="relative text-3xl md:text-5xl 2xl:text-8xl text-slate-700 dark:text-slate-300 font-extrabold capitalize">
        <span
          class="font-extrabold text-slate-200 dark:text-slate-800 absolute -mt-4 md:-mt-6 2xl:-mt-14 -left-2"><?php echo esc_html(get_theme_mod('mountaviary_front_span_text')); ?></span>
        <span class="relative"><?php echo esc_html(get_theme_mod('mountaviary_front_name_text')); ?></span>
      </h2>
      <p
        class="text-left text-xs lg:text-sm text-gray-500 dark:text-gray-300 my-3 md:my-6 font-medium leading-6 lg:leading-9 font-poppins">
        <?php // echo esc_html(get_theme_mod('mountaviary_front_content')); ?>
        With 6+ years of experience, I build clean, responsive, and user-friendly websites. Skilled in <span
          class="font-semibold text-xl">Laravel</span>, Livewire,
        <span class="font-semibold text-xl">WordPress</span>, <span class="font-semibold text-lg">PHP</span>, Tailwind
        CSS, Bootstrap-5,
        <span class="font-semibold text-lg">Javascript</span> and so on. I’ve delivered projects like social platforms,
        vaccine registration apps, and custom APIs.
        I create tailored WordPress themes and plugins while working with <span
          class="font-semibold text-lg">Alpine.js</span>, vanilla JS, and PHP frameworks. Currently exploring <span
          class="font-semibold text-xl">Vue.js</span> to level up further.
      </p>

      <!-- Tech Stack -->
      <div class="flex flex-row  my-8">
        <div class="flex items-center mr-4">
          <span class="text-sm font-semibold text-gray-800 dark:text-gray-200 uppercase tracking-wide">⚡ Tech Stack</span>
        </div>
        <div class="flex flex-wrap gap-2">
          <span class="">
            <?php $tech_stack = ['PHP', 'LARAVEL', 'WordPress', 'VueJS', 'AlpineJS', 'Livewire', 'FilamentPHP', 'TailwindCSS'];

            foreach ($tech_stack as $stack) {
              echo '<span class="px-3 py-2 bg-gradient-to-r from-gray-50 to-gray-200 border border-gray-100 dark:border-gray-700 rounded-lg dark:bg-transparent dark:from-transparent dark:to-transparent dark:text-slate-200 text-sm font-semibold text-gray-700 hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-200  transition-all duration-300 transform mr-1">' . $stack . '</span>';
            }

            ?>
          </span>
        </div>
      </div>

      <div class="person_social_info mt-12">
        <?php if (get_option('front_work_portfolio_option', 1)) { ?>
          <div class="cont_marge flex my-8 text-slate-600 dark:text-slate-300">
            <h3 class="hello">
              <a class="p-4 font-semibold border hover:border-slate-600 dark:hover:border-slate-400 hover:text-slate-800 dark:hover:text-slate-100 border-slate-300 dark:border-slate-600 border-solid relative"
                href="#contact">Say Hello
              </a>
            </h3>
            <h3 class="my_work">
              <a class="px-7 py-4 font-semibold hover:text-slate-800 dark:hover:text-slate-100" href="#portfolio">My Work
                <span class="ml-2 -rotate-45 absolute text-xs"><i class="fa-solid fa-arrow-right"></i></span>
              </a>
            </h3>
          </div>
        <?php } ?>

        <!-- FRONT-PAGE SOCIAL ICONS  -->
        <div class="front_page_social w-full md:w-2/3">
          <ul
            class="social-icons flex flex-wrap gap-x-4 gap-y-6 justify-start text-lg text-slate-600 dark:text-slate-100">
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
                  echo "<li><a class='px-2 md:px-3 py-1 md:py-1.5 rounded border border-slate-200 dark:border-slate-600 hover:border-slate-400 dark:hover:bg-slate-800 border-solid' href='" . esc_url($url) . "' target='_blank'><i class='$icon_class'></i></a></li>";
                }
              } else {
                if ($url) {
                  echo "<li><a class='px-2 md:px-3 py-1 md:py-1.5 rounded border dark:hover:bg-slate-800 border-slate-200 hover:border-slate-400 border-solid' href='mailto:" . esc_attr($url) . "'' target='_blank'><i class='$icon_class'></i></a></li>";
                }
              }
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
<?php } ?>
<!--end devs_top_info-->


<!--AUTHOR SECTION-->
<section id="about"
  class="devs_about bg-bg-author min-h-[480px] md:min-h-screen my-20 md:my-2 lg:mb-24 transition-all py-24 relative bg-cover bg-fixed bg-no-repeat bg-center z-10 flex  justify-center items-center  font-montserrat">
  <div class="author_meta flex flex-col gap-4 z-50 relative justify-center text-center font-montserrat">
    <p class="uppercase text-white text-sm sm:text-lg tracking-widest">LARAVEL | WORDPRESS | PHP</p>
    <h3 class="capitalize text-4xl sm:text-6xl lg:text-7xl xl:text-8xl text-red-600 py-2 font-bold">Web Developer</h3>
    <h5 class="uppercase text-slate-400 font-medium text-[10px] lg:text-sm tracking-wide leading-6 ">"Code your dreams
      into reality, Turn errors into opportunities."</h5>

    <h5 class="text-xs font-semibold text-red-500 mt-12 uppercase"><a
        class="text-red-500 p-4 inline-block border border-slate-200  hover:border-slate-400 hover:text-white transition-all"
        href="<?php echo esc_url(get_theme_mod('mountaviary_about_resume_link')); ?>" target="_blank">View
        Resume</a></h5>
  </div>

</section>
<!--END AUTHOR SECTION-->


<?php if (get_option('mountaviary_show_about_option', true)) { ?>
  <!--ABOUT SECTION-->
  <section id="" class="devs_about min-h-[480px] md:min-h-screen my-20 md:my-2 lg:mb-24 transition-all px-4">
    <div class="page_title my-4">
      <h3
        class="bg-slate-200 px-4 py-2 inline-block font-bold text-2xl text-slate-700 tracking-wider  uppercase border-l-4 border-solid border-l-red-500">
        DEV'S INFO
      </h3>
    </div>

    <div class="about_photo overflow-hidden ">
      <div class="about_photo_single grid grid-cols-2 relative ">
        <div class="flex justify-center items-center bg-bg-about bg-cover h-full ">
          <div class="my-2 font-poppins pl-10"><span
              class="block text-sm font-bold text-slate-400  uppercase ">Hello</span>
            <h3
              class="-mr-10 font-bold text-4xl md:text-6xl lg:text-8xl text-slate-100 z-40 relative tracking-wide block max-w-max ">
              <?php echo esc_html(get_theme_mod('mountaviary_about_username_text', 'I\'m Arif')); ?>
            </h3>
            <h5 class="text-slate-100 w-full sm:w-4/5">
              <?php echo esc_html(get_theme_mod('mountaviary_about_user_designation', 'A Freelance Web Developer. From Bangladesh')); ?>
            </h5>
          </div>
        </div>
        <div class="about_content">
          <img class="w-full h-auto"
            src="<?php echo esc_url(get_theme_mod('mountavaiary_about_profile', 'https://pixabay.com/get/g5d98e04901ad7b021a34314a0d48208c294242157632fc16dcd54a7f63dc784f3526f53aaa2668ed249f1fcca1912a3b50c6e2e55434a7159df6946739d2faf9_1280.png')); ?>"
            alt="pixabay" />
          <div class="author_info_text text-slate-600 bg-slate-200 font-medium leading-7 p-4 pt-7">
            <p>
              <?php echo esc_html(get_theme_mod('mountaviary_about_user_content', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.')); ?>
            </p>
            <h5 class="text-xs text-slate-100 font-semibold  mt-8 uppercase"><a
                class="p-4 inline-block bg-slate-800 hover:text-red-500 transition-all"
                href="<?php echo esc_url(get_theme_mod('mountaviary_about_resume_link')); ?>" target="_blank">View
                Resume</a></h5>
          </div>
        </div>
      </div>
    </div>

    <div class="about_info my-4">
      <div class="about_content my-4 md:my-6 py-3 md:py-7 font-poppins">
        <div class="about_content_list mt-8 border-t-2 border-slate-300 p-0 sm:p-1 md:p-9 pt-12 leading-8 text-sm">
          <div class="left_list mt-8 md:mt-0">
            <ul class="columns-1 sm:columns-2 gap-0 sm:gap-x-6 md:gap-x-12">
              <?php
              $user_birthday = get_theme_mod('user_birthday');
              $user_age = get_theme_mod('user_age');
              $user_address = get_theme_mod('user_address');
              $user_email = get_theme_mod('user_email');
              $user_phone = get_theme_mod('user_phone');
              $user_nationality = get_theme_mod('user_nationality');
              $user_study = get_theme_mod('user_study');
              $user_degree = get_theme_mod('user_degree');
              $user_interest = get_theme_mod('user_interest');
              $user_freelance = get_theme_mod('user_freelance');

              $items = [
                'Birthday' => $user_birthday,
                'Age' => $user_age,
                'Address' => $user_address,
                'Email' => $user_email,
                'Phone' => $user_phone,
                'Nationality' => $user_nationality,
                'Study' => $user_study,
                'Degree' => $user_degree,
                'Interest' => $user_interest,
                'Freelance' => $user_freelance,
              ];
              foreach ($items as $label => $value) {
                if (!empty($value))
                  echo "<li><span class=\"min-w-[100px] mr-2 inline-block font-bold\">$label:</span><span class=\"text-slate-500\">$value</span></li>";
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>


<!--PORTFOLIO SECTION-->
<?php if (get_option('mountaviary_show_portfolio_option', true)) { ?>
  <?php
  $args = (array('post_type' => 'mav_portfolio', 'post_status' => 'publish', 'posts_per_page' => get_theme_mod('front_portfolio_post_count')));
  $portfolio_query = new WP_Query($args);
  if ($portfolio_query->have_posts()):
    ?>

    <section id="portfolio" class="relative portfolio_area min-h-screen py-20 px-4 bg-gray-200 dark:bg-gray-900">

      <!-- Section Header -->
      <div class="text-center mb-16">
        <h2 class="text-5xl font-bold mb-4 text-gray-800 dark:text-gray-100 uppercase">
          <?php echo esc_html(get_theme_mod('mountaviary_portfolio_title_text', 'Recent Projects')); ?>
        </h2>
      </div>

      <div class="portfolio_page">
        <?php while ($portfolio_query->have_posts()):
          $portfolio_query->the_post(); ?>
          <div class="single_port bg-white dark:bg-slate-800 flex items-center gap-6 py-12 pr-4 rounded-xl my-12 relative group <?php foreach (get_the_terms(get_the_ID(), 'portfolio_category') as $cat)
            echo $cat->slug . ' '; ?>">

            <div class="relative w-1/2">
              <div class="h-96 relative overflow-hidden">
                <?php if (has_post_thumbnail()) { ?>
                  <?php
                  // Check if the meta box value exists
                  $portfolio_link = get_post_meta($post->ID, 'project-link', true); ?>
                  <?php echo the_post_thumbnail('post_temp', array('class' => 'w-full h-full object-cover transition-transform duration-700 hover:scale-105')); ?>

                <?php } else { ?>
                  <img class="w-full h-auto wp-post-image"
                    src="<?php echo esc_url(get_template_directory_uri()); ?>/img/redBackground_port.png"
                    alt="<?php the_title(); ?>">
                <?php } ?>
              </div>
              <div
                class="overlay absolute flex flex-col gap-1 lg:4 bottom-0 left-0 h-full w-full z-40 px-2 pb-2  justify-center items-center cursor-pointer transition backdrop-blur-lg bg-white/20 opacity-0 group-hover:opacity-100 text-md">

                <div class="text-black  text-center transition px-2 font-poppins font-semibold leading-6 capitalize">
                  <?php
                  // Check if the meta box value exists
                  $portfolio_link = get_post_meta($post->ID, 'project-link', true);
                  if (!empty($portfolio_link)) { ?>
                    <a class="port_title relative block mb-8 hover:text-slate-800 text-sm font-semibold text-gray-800 dark:text-gray-200 uppercase tracking-wide border border-gray-200 dark:border-gray-500 px-4 py-2 hover:bg-gray-50 dark:hover:bg-slate-700 hover:border-gray-300 transition duration-300 rounded-full"
                      href="<?php echo esc_url($portfolio_link); ?>" target="_blank">View Project</a>
                  <?php }
                  ?>
                </div>
              </div>

            </div>

            <div class="w-1/2 port_cat text-sm min-h-60">
              <!-- project category   -->
              <h3
                class="border-gray-300 bg-gray-200 dark:bg-slate-700 rounded-xl px-4 py-2 mb-4 text-sm font-semibold text-gray-800 dark:text-slate-200 tracking-wide">
                Web
                Application</h3>

              <!-- Project Title -->
              <h3 class="text-3xl font-bold text-gray-700 dark:text-slate-50 mb-4 leading-tight">
                <?php the_title(); ?>
              </h3>

              <!-- Project Description -->
              <div class="text-gray-600 dark:text-slate-400 text-md leading-relaxed mb-6">
                <?php
                $content = get_the_content();
                if (empty($content)) {
                  echo "A comprehensive project showcasing modern web development techniques, advanced functionality, and seamless user experience design.";
                } else {
                  echo wp_trim_words($content, 30, '...');
                }
                ?>
              </div>

              <!-- Tech Stack -->
              <div class="flex flex-wrap justify-between my-8">
                <div class="">
                  <div class="flex items-center mb-3">
                    <span class="text-sm font-semibold text-gray-800 dark:text-slate-100 uppercase tracking-wide">⚡ Tech
                      Stack</span>
                  </div>
                  <div class="flex flex-wrap gap-2 mt-3">
                    <?php
                    $categories = get_the_terms($post->ID, 'portfolio_category');
                    if ($categories && !is_wp_error($categories)) {
                      foreach ($categories as $category) {
                        echo '<span class="px-4 py-2 bg-gradient-to-r from-gray-100 to-gray-50 dark:from-slate-700 dark:to-slate-800 border border-gray-200 dark:border-gray-400 rounded-2xl text-sm font-medium text-gray-700 dark:text-slate-100 hover:bg-gradient-to-r hover:from-indigo-500 hover:to-purple-500 hover:text-white transition-all duration-300 transform hover:-translate-y-1">' . $category->name . '</span>';
                      }
                    }
                    ?>
                  </div>
                </div>

                <div> <!-- Case Study Button -->
                  <button type="button"
                    class="case-study-button text-sm font-semibold text-gray-800 dark:text-gray-200 uppercase tracking-wide px-6 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl hover:border-indigo-500 hover:text-indigo-500 transition-all duration-300">
                    Case Study
                  </button>

                  <div class="case-study-content hidden mt-4">
                    <div class="case_study_content">
                      <h3 class="text-2xl font-bold text-gray-800 mb-4 leading-tight">Case Study</h3>
                      <p>Description</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Key Features -->
              <div class="mb-6">
                <div class="flex items-center mb-3">
                  <span class="text-sm font-semibold text-gray-800 dark:text-gray-200 uppercase tracking-wide">🚀 Key
                    Features</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                  <?php
                  // Get custom features or use default ones
                  $custom_features = get_post_meta($post->ID, 'project_features', true);
                  $features = !empty($custom_features) ? explode(',', $custom_features) : [
                    'Responsive Design',
                    'Custom Development',
                    'Performance Optimization',
                    'Modern UI/UX',
                    'Cross-browser Support',
                    'SEO Optimized'
                  ];

                  foreach (array_slice($features, 0, 6) as $feature) {
                    echo '<div class="flex items-center text-gray-600 dark:text-gray-300 text-sm"><span class="text-green-500 font-bold mr-2">✓</span>' . trim($feature) . '</div>';
                  }
                  ?>
                </div>
              </div>

            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </section>

  <?php endif; ?>
  <!-- reset global post variable. After this point, we are back to the Main Query object -->
  <?php wp_reset_postdata(); ?>
<?php } ?>
<!-- END OF PORTFOLIO SECTION  -->



<!-- SERVICES SECTION  -->
<?php if (get_option('mountaviary_show_service_option', true)) { ?>
  <?php
  $args = (array('post_type' => 'mav_service', 'post_status' => 'publish', 'posts_per_page' => -1, 'order' => 'ASC'));
  $services_query = new WP_Query($args);

  if ($services_query->have_posts()):
    ?>

    <section id="service" class="font-poppins services_area min-h-[480px] md:min-h-screen my-20 md:mb-12 lg:mb-24 px-4">

      <!-- Section Header -->
      <div class="text-center mb-16">
        <h2 class="text-5xl font-bold mb-4 text-gray-800 uppercase">
          <?php echo esc_html(get_theme_mod('mountaviary_service_title_text', 'SERVICES')); ?>
        </h2>

        <div class="service_content mt-4">
          <h5 class="text-sm leading-8 text-slate-500 font-semibold">
            <?php echo esc_html(get_theme_mod('mountaviary_services_subtitle', 'What I can Support')); ?>
          </h5>
        </div>
      </div>


      <div class="services_page grid grid-cols-1 gap-6">
        <?php while ($services_query->have_posts()):
          $services_query->the_post(); ?>
          <div class="single_serve bg-white p-6 rounded-2xl transition border-b border-slate-200">
            <!-- IF ADDED SERVICE AREA ICON -->

            <h3 class="services_title text-xl font-medium text-slate-600 hover:text-slate-900 flex items-center">
              <?php $services_icon = get_post_meta($post->ID, 'service-icon', true);
              if (!empty($services_icon)) { ?>
                <span
                  class="service_icon text-gray-500 bg-transparent flex justify-center items-center left-0 relative text-center w-2 h-2 mr-4 rounded-full group-hover:bg-slate-300 transition-all">
                  <span class="dashicons <?php echo $services_icon; ?>"></span>
                </span>
              <?php } ?>
              <a class="capitalize pb-1 font-semibold" href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
            </h3>
            <p class="services_content text-sm text-slate-500 font-normal leading-8">
              <?php echo wp_trim_words(get_the_content(), 10, '...'); ?>
            </p>
          </div>
        <?php endwhile; ?>

      </div>
      <div
        class="bg-gradient-to-br from-blue-50 to-white p-12 text-center rounded-xl mt-10 border border-slate-200 inline-block center font-poppins mx-auto w-full">
        <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-4">
          Need something custom?
        </h2>
        <p class="text-gray-400 text-base md:text-md mb-6">
          Let’s connect and build something amazing together!
        </p>
        <a href="#contact"
          class="inline-block bg-white text-gray-600  font-semibold px-6 py-3 rounded-full shadow-md hover:bg-gray-300 transition duration-300">
          💬 Let's Talk
        </a>
      </div>

    </section>
  <?php endif; ?>
  <!-- reset global post variable. After this point, we are back to the Main Query object -->
  <?php wp_reset_postdata(); ?>

<?php } ?>
<!-- END SERVICES AREA -->


<!-- BLOG SECTION  -->

<?php if (get_option('mountaviary_show_blog_option', true)) { ?>
  <?php
  $args = array('post_type' => 'post', 'posts_per_page' => get_theme_mod('front_blog_post_count'), 'ignore_sticky_posts' => 1);
  $the_query = new WP_Query($args);
  if ($the_query->have_posts()):
    ?>
    <section id="blog"
      class="bg-gray-100 dark:bg-gray-900 px-4 py-12 font-poppins blog_posts min-h-[480px] md:min-h-screen my-20 md:mb-12 lg:mb-24">

      <!-- Section Header -->
      <div class="text-center mb-16">
        <h2 class="text-5xl font-bold mb-4 text-gray-800 dark:text-gray-200 uppercase">
          <?php echo esc_html(get_theme_mod('mountaviary_blog_title_text', 'Blog Posts')); ?>
        </h2>
      </div>

      <div class="blog_info_area blog-grid block">

        <?php while ($the_query->have_posts()):
          $the_query->the_post(); ?>

          <div class="blog-post bg-white dark:bg-gray-800 shadow-sm mb-8 rounded-lg box-border ">

            <?php if (has_post_thumbnail()): ?>
              <div class="thumbnail overflow-hidden">
                <a href="<?php the_permalink(); ?>">
                  <?php echo the_post_thumbnail('medium', array('class' => 'w-full h-auto hover:scale-110 duration-300 rounded-t-lg')); ?>
                </a>
              </div>
            <?php endif; ?>

            <div class="post_title pt-2 mt-2 text-xl px-8">
              <?php
              the_title('<h2 class="entry-title"><a class="font-semibold text-slate-700 dark:text-slate-100 leading-8 hover:text-slate-900" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
            </div>
            <div class="author_info flex items-center gap-2  py-2 mt-2 px-8">
              <?php echo get_avatar(get_the_author_meta('ID'), $size = '28', $default = '', $alt = '', $args = array('class' => 'author_photo rounded-full')); ?>
              <h4
                class="author_name text-slate-500 dark:text-slate-300 hover:text-slate-900 dark:hover:text-slate-400 mr-3 text-xs font-bold">
                <?php the_author_posts_link(); ?>
              </h4>
              <h5 class="post_date text-slate-500 dark:text-slate-300 text-xs"><?php the_date('M d, Y'); ?></h5>
              <div>
                <ul class="post-categories ml-2 flex gap-2 justify-center">
                  <?php
                  $categories = get_the_category();
                  if (!empty($categories)) {
                    foreach ($categories as $index => $category) {
                      $category_link = get_category_link($category->term_id);
                      echo '<li class="category-item category-' . esc_attr($index) . '">
                                        <a class="text-sm bg-slate-200 dark:bg-slate-700 p-1 rounded text-slate-700 dark:text-slate-300 hover:text-slate-900" href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>
                                      </li>';
                    }
                  }
                  ?>
                </ul>
              </div>
            </div>
            <div class="blog_content py-3 px-8">
              <h4 class="text-sm font-normal leading-8 text-slate-500 dark:text-slate-300 hover:text-slate-950 mb-2">
                <?php the_excerpt(); ?>
              </h4>
            </div>
          </div>

        <?php endwhile; ?>

      </div>
    </section>

  <?php endif; ?>
  <!-- reset global post variable. After this point, we are back to the Main Query object -->
  <?php wp_reset_postdata(); ?>
<?php } ?>

<!-- CONTACT SECTION -->
<?php if (get_option('mountaviary_show_contact_option', true)) { ?>
  <section id="contact" class="contact_section min-h-[480px] md:min-h-screen my-12 md:my-20 lg:my-36  px-4">


    <!-- Section Header -->
    <div class="contact_area_title text-center mb-16">
      <h2 class="text-5xl font-bold mb-4 text-gray-800 uppercase">
        <?php echo esc_html(get_theme_mod('mountaviary_front_contact_page_title', 'Find Me Here')); ?>
      </h2>
    </div>

    <div class="map w-full h-full overflow-hidden">
      <iframe class="w-full"
        src="<?php echo esc_url(get_theme_mod('mountaviary_frontpage_map_url', 'https://www.google.com/maps/embed/v1/place?q=Dhaka,+Bangladesh&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8')); ?>"
        height="450" style="border: 0" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="contact_area flex gap-8 py-9 px-2 md:px-8 font-poppins font-bold text-xs">

      <div class="contact_form w-full md:w-2/3 overflow-hidden ml-0 mr-0 -mt-6 px-0 text-slate-500 leading-8">
        <?php $contact_form_shortcode = get_theme_mod('mountaviary_contact_form'); ?>
        <?php echo do_shortcode($contact_form_shortcode); ?>
      </div>

      <div class="contact_info w-full md:w-1/3 mt-6 mb-10 overflow-hidden text-slate-800 mx-auto">
        <ul>
          <?php
          $user_cont_phone = get_theme_mod('mountaviary_front_contact_page_phone');
          $user_cont_address = get_theme_mod('mountaviary_front_contact_page_location_text');
          $user_cont_email = get_theme_mod('mountaviary_front_contact_page_email');
          $items = [
            'Phone/ WhatsApp' => $user_cont_phone,
            'Address' => $user_cont_address,
            'Email' => $user_cont_email,
          ];
          foreach ($items as $label => $value) {
            if (!empty($value))
              echo "
                <div class=\"text-slate-500 mb-2 sm:mb-0 block mb-2\">$label</div>
                <div class=\"font-semibold text-lg text-slate-800 mb-8\">$value</div>
              ";
          }
          ?>
        </ul>
      </div>


    </div>
  </section>
<?php } ?>

<?php get_footer(); ?>