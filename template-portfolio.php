<?php /* Template Name: Portfolio Page */

get_header('part'); ?>

<!--PORTFOLIO SECTION-->

<?php
$args = (array('post_type' => 'mav_portfolio', 'post_status' => 'publish', 'posts_per_page' => -1));
$portfolio_query = new WP_Query($args);
if ($portfolio_query->have_posts()):
  ?>
  <section id="portfolio" class="portfolio_area min-h-[480px] md:min-h-screen my-20 md:mb-12 lg:mb-24  px-12">
    <div class="portfolio_title my-4 flex justify-between items-center">
      <h3
        class="bg-slate-200 px-4 py-2 inline-block font-bold text-2xl text-slate-700 tracking-wider  uppercase border-l-4 border-solid border-l-red-500">
        <?php echo esc_html(get_theme_mod('mountaviary_portfolio_title_text', 'PROJECTS')); ?>
      </h3>
    </div>
    <div class="about_content mt-4 mb-6">
      <h5 class="text-sm leading-8 text-slate-500 font-semibold">
        <?php echo esc_html(get_theme_mod('mountaviary_portfolio_subtitle', 'A few recent design and coding projects')); ?>
      </h5>
    </div>
    <div class="portfolio_page grid gap-12 grid-cols-1 lg:grid-cols-2">
      <?php while ($portfolio_query->have_posts()):
        $portfolio_query->the_post(); ?>
        <div class="single_port relative group <?php foreach (get_the_terms(get_the_ID(), 'portfolio_category') as $cat)
          echo $cat->slug . ' '; ?>">

          <?php if (has_post_thumbnail()) { ?>
            <?php
            // Check if the meta box value exists
            $portfolio_link = get_post_meta($post->ID, 'project-link', true); ?>
            <a href="<?php echo esc_url($portfolio_link); ?>" target="_blank">
              <?php echo the_post_thumbnail('post_temp', array('class' => 'w-full h-auto')); ?>
            </a>
          <?php } else { ?>
            <a href="<?php echo esc_url($portfolio_link); ?>" target="_blank">
              <img class="w-full h-auto wp-post-image"
                src="<?php echo esc_url(get_template_directory_uri()); ?>/img/redBackground_port.png"
                alt="<?php the_title(); ?>">
            </a>
          <?php } ?>

          <!-- show first tag  -->
          <div class=" text-sm absolute bottom-0 right-0 p-2 bg-red-700/70  ">
            <?php
            // Get the categories for this post
            $categories = get_the_terms($post->ID, 'portfolio_category');
            if ($categories && !is_wp_error($categories)) {
              echo '<span class="text-slate-100 font-semibold p-2 m-1 uppercase ">' . $categories[0]->name . '</span>';
            }
            ?>
          </div>

          <div
            class="overlay absolute flex flex-col gap-1 lg:4 bottom-0 left-0 h-full w-full z-40 px-2 pb-2  justify-center items-center cursor-pointer transition backdrop-blur-lg bg-white/20 opacity-0 group-hover:opacity-100 text-md">
            <div class="text-black  text-center transition px-2 font-poppins font-semibold leading-6 capitalize">
              <?php
              // Check if the meta box value exists
              $portfolio_link = get_post_meta($post->ID, 'project-link', true);
              if (!empty($portfolio_link)) { ?>
                <a class="port_title relative block mb-8 hover:text-slate-800" href="<?php echo esc_url($portfolio_link); ?>"
                  target="_blank"><?php echo the_title(); ?></a>
              <?php }
              ?>
            </div>
            <div class="port_cat text-sm">
              <?php
              // Get the categories for this post
              $categories = get_the_terms($post->ID, 'portfolio_category');
              if ($categories && !is_wp_error($categories)) {
                foreach ($categories as $category) {
                  echo '<span class="text-slate-100 font-semibold bg-black rounded  p-2 m-1 ">' . $category->name . '</span>';
                }
              }
              ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </section>

<?php endif; ?>
<!-- reset global post variable. After this point, we are back to the Main Query object -->
<?php wp_reset_postdata(); ?>
<!-- END OF PORTFOLIO SECTION  -->

<?php get_footer(); ?>