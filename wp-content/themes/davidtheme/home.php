<?php
    get_header();
    $options = get_option( 'wp_countrys' ); 
?>
 

    <main class="seccion contenedor">
    <div class="bg_landing">
        <div class="container-landing">
        <div class="grid-2_xs-1">
            <div class="col">
                <img src="<?php echo esc_html($options["media-page"]["url"]); ?>" alt="<?php echo esc_html($options["title-image"]); ?>" />
            </div>
            <div class="col">
                <div class="form_success">
                    <div class="content_success">
                    <h3>¡Enviado! 🎉</h3>
                    <p>Se ha enviado el reto satisfactoreamente.</p>
                    </div>
                </div>
                <div class="container_form">
                    <h3 style="color: gray;">Inscription punto de venta</h3>
                <form method="POST" id="form_point_sale" novalidate>
                    <input class="input" required id="name_full" name="name_full" type="text" placeholder="Nombre Cliente (*)" value="" onchange="validateCaracteresEspeciales(this)" />
                    <input class="input" required name="nit" type="text" placeholder="Nit (*)" value="" onchange="validateCaracteresEspeciales(this)" />
                    <input class="input" name="name_point" type="text" placeholder="Nombre Punto" value="" onchange="validateCaracteresEspeciales(this)" />
                    <input class="input" name="name_equitment" type="text" placeholder="Nombre Equipo" value="" onchange="validateCaracteresEspeciales(this)" />
            
                    <?php 
                  
                    echo ' <select class="select" name="city" id="cars"> 
                    <option value="" selected>Seleccione la ciudad</option>';
                    foreach($options['country-repeater'] as $key => $categories ):
                      
                    ?>
                        <option value="<?php echo $options["country-repeater"][$key]["opt-text"];?>"><?php echo $options["country-repeater"][$key]["opt-text"];?></option>
                    <?php endforeach; ?>
                    </select>
                    <input class="input" name="name_promotor" type="text" placeholder="Promotor" value="" onchange="validateCaracteresEspeciales(this)" />
                    <input class="input" name="rtc" type="number" placeholder="RTC" value=""  />
                    <input class="input" name="capitan" type="text" placeholder="Capitan o Usuario" value="" onchange="validateCaracteresEspeciales(this)" />
                    <form-group class="row_form">
                    <input name="term" required class="check" type="checkbox" onchange="validateCheck(this)"  />(*) <span class="txt_term">He leido acepto la politica de los términos y condiciones de mis datos personales.</span>
                     </form-group>
                    <input class="submit" id="submit-form" type="submit" value="Enviar" />
                </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    </main>

<?php
    get_footer();
?>