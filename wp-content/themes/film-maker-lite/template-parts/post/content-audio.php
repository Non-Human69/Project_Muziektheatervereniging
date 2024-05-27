<?php
/**
 * Template part for displaying posts
 *
 * @package Film Maker Lite
 * @subpackage film_maker_lite
 */

?>
<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $audio = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>
<?php $film_maker_lite_column_layout = get_theme_mod( 'film_maker_lite_sidebar_post_layout');
if($film_maker_lite_column_layout == 'four-column' || $film_maker_lite_column_layout == 'three-column' ){ ?>
  <div id="category-post">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="page-box">
        <?php
          if ( ! is_single() ) {
            // If not a single post, highlight the audio file.
            if ( ! empty( $audio ) ) {
              foreach ( $audio as $audio_html ) {
                echo '<div class="entry-audio">';
                  echo $audio_html;
                echo '</div><!-- .entry-audio -->';
              }
            };
          };
        ?>
        <div class="box-content mt-2 text-center">
            <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
          <div class="box-info">
            <?php $film_maker_lite_blog_archive_ordering = get_theme_mod('blog_meta_order', array('date', 'author', 'comment', 'category'));
            foreach ($film_maker_lite_blog_archive_ordering as $film_maker_lite_blog_data_order) : 
              if ('date' === $film_maker_lite_blog_data_order) : ?>
                <i class="far fa-calendar-alt mb-1"></i><span class="entry-date"><?php echo get_the_date('j F, Y'); ?></span>
              <?php elseif ('author' === $film_maker_lite_blog_data_order) : ?>
                <i class="fas fa-user mb-1"></i><span class="entry-author"><?php the_author(); ?></span>
              <?php elseif ('comment' === $film_maker_lite_blog_data_order) : ?>
                <i class="fas fa-comments mb-1"></i><span class="entry-comments"><?php comments_number(__('0 Comments', 'film-maker-lite'), __('0 Comments', 'film-maker-lite'), __('% Comments', 'film-maker-lite')); ?></span>
              <?php elseif ('category' === $film_maker_lite_blog_data_order) :?>
                <i class="fas fa-list mb-1"></i><span class="entry-category"><?php film_maker_lite_display_post_category_count(); ?></span>
              <?php endif;
            endforeach; ?>
          </div>
          <p><?php echo esc_html(film_maker_lite_excerpt_function());?></p>
          <?php if(get_theme_mod('film_maker_lite_remove_read_button',true) != ''){ ?>
            <div class="readmore-btn">
              <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'film-maker-lite' ); ?>"><?php echo esc_html(get_theme_mod('film_maker_lite_read_more_text',__('Read More','film-maker-lite')));?></a>
            </div>
          <?php }?>
        </div>
        <div class="clearfix"></div>
      </div>
    </article>
  </div>
<?php } else{ ?>
  <div id="category-post">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="page-box row">
      <?php $film_maker_lite_post_layout = get_theme_mod( 'film_maker_lite_post_layout','image-content');
      if($film_maker_lite_post_layout == 'image-content'){ ?>
        <div class="col-lg-6 col-md-12 align-self-center">
          <?php
            if ( ! is_single() ) {
              // If not a single post, highlight the audio file.
              if ( ! empty( $audio ) ) {
                foreach ( $audio as $audio_html ) {
                  echo '<div class="entry-audio">';
                    echo $audio_html;
                  echo '</div><!-- .entry-audio -->';
                }
              };
            };
          ?>
        </div>
        <div class="box-content col-lg-6 col-md-12">
          <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
          <div class="box-info">
            <?php $film_maker_lite_blog_archive_ordering = get_theme_mod('blog_meta_order', array('date', 'author', 'comment', 'category'));
            foreach ($film_maker_lite_blog_archive_ordering as $film_maker_lite_blog_data_order) : 
              if ('date' === $film_maker_lite_blog_data_order) : ?>
                <i class="far fa-calendar-alt mb-1"></i><span class="entry-date"><?php echo get_the_date('j F, Y'); ?></span>
              <?php elseif ('author' === $film_maker_lite_blog_data_order) : ?>
                <i class="fas fa-user mb-1"></i><span class="entry-author"><?php the_author(); ?></span>
              <?php elseif ('comment' === $film_maker_lite_blog_data_order) : ?>
                <i class="fas fa-comments mb-1"></i><span class="entry-comments"><?php comments_number(__('0 Comments', 'film-maker-lite'), __('0 Comments', 'film-maker-lite'), __('% Comments', 'film-maker-lite')); ?></span>
              <?php elseif ('category' === $film_maker_lite_blog_data_order) :?>
                <i class="fas fa-list mb-1"></i><span class="entry-category"><?php film_maker_lite_display_post_category_count(); ?></span>
              <?php endif;
            endforeach; ?>
          </div>
          <p><?php echo esc_html(film_maker_lite_excerpt_function());?></p>
          <?php if(get_theme_mod('film_maker_lite_remove_read_button',true) != ''){ ?>
            <div class="readmore-btn">
              <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'film-maker-lite' ); ?>"><?php echo esc_html(get_theme_mod('film_maker_lite_read_more_text',__('Read More','film-maker-lite')));?></a>
            </div>
          <?php }?>
        </div>
      <?php }
      else if($film_maker_lite_post_layout == 'content-image'){ ?>
        <div class="box-content col-lg-6 col-md-12">
          <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
          <div class="box-info">
            <?php $film_maker_lite_blog_archive_ordering = get_theme_mod('blog_meta_order', array('date', 'author', 'comment', 'category'));
            foreach ($film_maker_lite_blog_archive_ordering as $film_maker_lite_blog_data_order) : 
              if ('date' === $film_maker_lite_blog_data_order) : ?>
                <i class="far fa-calendar-alt mb-1"></i><span class="entry-date"><?php echo get_the_date('j F, Y'); ?></span>
              <?php elseif ('author' === $film_maker_lite_blog_data_order) : ?>
                <i class="fas fa-user mb-1"></i><span class="entry-author"><?php the_author(); ?></span>
              <?php elseif ('comment' === $film_maker_lite_blog_data_order) : ?>
                <i class="fas fa-comments mb-1"></i><span class="entry-comments"><?php comments_number(__('0 Comments', 'film-maker-lite'), __('0 Comments', 'film-maker-lite'), __('% Comments', 'film-maker-lite')); ?></span>
              <?php elseif ('category' === $film_maker_lite_blog_data_order) :?>
                <i class="fas fa-list mb-1"></i><span class="entry-category"><?php film_maker_lite_display_post_category_count(); ?></span>
              <?php endif;
            endforeach; ?>
          </div>
          <p><?php echo esc_html(film_maker_lite_excerpt_function());?></p>
          <?php if(get_theme_mod('film_maker_lite_remove_read_button',true) != ''){ ?>
            <div class="readmore-btn">
              <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'film-maker-lite' ); ?>"><?php echo esc_html(get_theme_mod('film_maker_lite_read_more_text',__('Read More','film-maker-lite')));?></a>
            </div>
          <?php }?>
        </div>
        <div class="col-lg-6 col-md-12 align-self-center pt-lg-0 pt-3">
          <?php
            if ( ! is_single() ) {
              // If not a single post, highlight the audio file.
              if ( ! empty( $audio ) ) {
                foreach ( $audio as $audio_html ) {
                  echo '<div class="entry-audio">';
                    echo $audio_html;
                  echo '</div><!-- .entry-audio -->';
                }
              };
            };
          ?>
        </div>
      <?php }?>
        <div class="clearfix"></div>
      </div>
    </article>
  </div>
<?php } ?>