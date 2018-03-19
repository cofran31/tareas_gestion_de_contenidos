<?php // MyPlugin - Settings Page



// deshabilito acceso directo a archivos
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



// muestra el formulario de configuración
function myplugin_display_settings_page() {

	// checa si el usuario tiene acceso permitido
	if ( ! current_user_can( 'manage_options' ) ) return;

	?>

	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">

			<?php

			// campos de seguridad
			settings_fields( 'myplugin_options' );

			// sección de configuración
			do_settings_sections( 'myplugin' );

			// botón
			submit_button();

			?>

		</form>
	</div>

	<?php

}
