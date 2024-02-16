<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 
if( class_exists( 'CSF' ) ) {

//
// Set a unique slug-like ID
$prefix = 'my_post_options';

//
// Create a metabox
CSF::createMetabox( $prefix, array(
  'title'     => __('Opciones Retos', 'davidtheme'),
  'post_type' => 'retos',
  'context'   => 'normal',
) );

//
// Create a section
CSF::createSection( $prefix, array(
  'title'  => __('Info Adicional', 'davidtheme'),
  'fields' => array(

    //
    // A text field
    array(
      'id'    => 'code-rtc',
      'type'  => 'number',
      'title' => __('Code RTC', 'davidtheme'),
    ),

    array(
        'id'    => 'descshort-reto',
        'type'  => 'textarea',
        'title' => __('Descripción Larga', 'davidtheme'),
      ),

      array(
        'id'    => 'link-reto',
        'type'  => 'link',
        'title' => __('Enlace Buton', 'davidtheme'),
      ),
  

  )
) );


}