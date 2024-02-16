<?php
    /*
    * Template Name: Galería
    */
    get_header();
?>
    <main class="contenedor seccion">
        <?php
        while( have_posts() ): the_post();       
            the_title('<h1 class="text-center text-primary">','</h1>');   
        endwhile;
    ?>
    <p>Pagina Galeria Imagenes</p>
    </main>

<?php
    get_footer();
?>
