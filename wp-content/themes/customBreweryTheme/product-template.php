<?php
/* Template Name: Product Page template */
 ?>

<?php get_header(); ?>

<?php if(have_posts()): ?>
    <?php while(have_posts()): the_post();?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1><?php the_title(); ?></h1>
                    <div class="wp_content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    // $allProducts = new WP_Query('post_type=product&order=ASC&orderby=title');

                    $args = array(
                        'post_type' => 'product',
                        'order' => 'ASC',
                        'orderby' => 'title'
                    );
                    $allProducts = new WP_Query($args);
                 ?>
                 <?php if( $allProducts->have_posts() ): ?>
                     <?php while($allProducts->have_posts()): $allProducts->the_post();?>
                         <div class="card">
                             <?php if( has_post_thumbnail() ): ?>
                                 <?php the_post_thumbnail('thumbnail', ['class'=>'card-img-top img-fluid', 'alt'=>'Card image cap']); ?>
                             <?php endif; ?>
                           <div class="card-body">
                             <h5 class="card-title"><?php the_title(); ?></h5>
                           </div>
                         </div>
                     <?php endwhile; ?>
                 <?php endif; ?>

            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
