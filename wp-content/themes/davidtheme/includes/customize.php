<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 
if( class_exists( 'CSF' ) ) {

//
// Set a unique slug-like ID
$prefix = 'wp_countrys';

//
// Create customize options
CSF::createCustomizeOptions( $prefix );

//
// Create a section
CSF::createSection( $prefix, array(
  'title'  => __('Pagina de David', 'davidtheme'),
  'priority' => 'low',
  'fields' => array(
    array(
        'id'    => 'media-page',
        'type'  => 'media',
        'title' => __('Imagen', 'davidtheme'),
      ),
     array(
        'id'    => 'title-image',
        'type'    => 'text',
        'title' => __('Titulo Imagen SEO', 'davidtheme'),
      ),
    array(
        'id'    => 'title-page',
        'type'    => 'text',
        'title' => __('Titulo Formulario', 'davidtheme'),
      ),
    array(
        'id'     => 'country-repeater',
        'type'   => 'repeater',
        'title'  => __('Ciudad', 'davidtheme'),
        'fields' => array(
      
          array(
            'id'    => 'opt-text',
            'type'  => 'text',
            'title' => __('Ciudad', 'davidtheme')
          ),
      
        ),
      ),
  ),
  )
);



}