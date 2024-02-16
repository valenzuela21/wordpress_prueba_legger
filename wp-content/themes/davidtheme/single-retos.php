<?php
    get_header();
    $args =  array(
        'post_type' => 'retos',
        'p' => $post->ID
    );
    $query = new WP_Query($args);
    $meta = get_post_meta( get_the_ID(), 'my_post_options', true );
  
    if($query->have_posts()):
        while($query->have_posts()) : $query->the_post();
?>

<div class="container-reto">
    <div class="grid-2_xs-1">
        <div class="col">
            <h1><?php the_title(); ?></h1>
            <a class="btn-reto" href="<?php echo $meta['link-reto']['url']?>"><?php echo $meta['link-reto']['text']?></a>
        </div>
        <div class="col">
            <h3><?php echo esc_html('Seccion 1')?></h3>
            <p><?php echo $meta['descshort-reto']?></p>
        </div>
    </div>

    <div class="grid-2_xs-1">
        <div class="col">
            <?php the_content(); ?>
        </div>
        <div class="col">
            <?php the_post_thumbnail() ?>
        </div>
    </div>
    </div>
    
<?php
    endwhile;
    endif;
    get_footer();
?>