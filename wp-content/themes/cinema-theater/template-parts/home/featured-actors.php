<?php
/**
 * Template part for displaying featured actors section
 *
 * @package Cinema Theater
 * @subpackage cinema_theater
 */
?>

<?php $cinema_theater_static_image = get_stylesheet_directory_uri() . '/assets/images/sliderimage.png'; ?>

<?php if( get_theme_mod( 'cinema_theater_featured_actors_enable' ) != '') { ?>

<section id="featured-actors" class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 text-center text-md-start">
        <?php if( get_theme_mod( 'cinema_theater_featured_actors_heading' ) != '') { ?>
          <h2><?php echo esc_html(get_theme_mod('cinema_theater_featured_actors_heading')); ?></h2>
        <?php }?>
        <?php if( get_theme_mod( 'cinema_theater_featured_actors_sub_heading' ) != '') { ?>
          <p class="mb-0"><?php echo esc_html(get_theme_mod('cinema_theater_featured_actors_sub_heading')); ?></p>
        <?php }?>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="more-btn text-center text-md-end">
          <?php if( get_theme_mod( 'cinema_theater_featured_actors_btn_link' ) != '' || get_theme_mod( 'cinema_theater_featured_actors_btn_text' ) != '') { ?>
            <a href="<?php echo esc_html(get_theme_mod('cinema_theater_featured_actors_btn_link')); ?>" class="mb-0"><?php echo esc_html(get_theme_mod('cinema_theater_featured_actors_btn_text')); ?></a>
          <?php }?>
        </div>
      </div>
      <div class="row mx-0 mt-5">
        <?php
          $film_maker_lite_post_category = get_theme_mod('cinema_theater_featured_actors_section_category');
          if($film_maker_lite_post_category){
            $film_maker_lite_page_query = new WP_Query(array( 'category_name' => esc_html( $film_maker_lite_post_category ,'cinema-theater')));?>
            <?php while( $film_maker_lite_page_query->have_posts() ) : $film_maker_lite_page_query->the_post(); ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="actors-box mb-3">
                <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php }else {echo ('<img src="'.$cinema_theater_static_image.'">'); } ?>
                <div class="actors-box-content">
                  <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </div>
              </div>
            </div>
            <?php endwhile;
            wp_reset_postdata();
          }
        ?>
      </div>
    </div>
  </div>
</section>

<?php }?>
