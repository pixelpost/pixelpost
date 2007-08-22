<?php
/*

admin-lang-english.php : english (default) language file for Pixelpost-Admin-Section
===================================================================================
Pixelpost version 1.7

SVN file version:
$Id: admin-lang-english.php 239 2007-04-10 15:21:09Z d3designs $

Version 1.5:
Development Team:
Ramin Mehran, Will Duncan, Joseph Spurling, Piotr "GeoS" Galas
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Copyright  2006 Pixelpost.org <http://www.pixelpost.org>

Pixelpost www:  	http://www.pixelpost.org/
Pixelpost wiki: 	http://wiki.pixelpost.org/
Pixelpost forum: 	http://forum.pixelpost.org
Attention:
============
This is the english language file for the admin section of Pixelpost
It is absolutely necessary that this file is uploaded to the
Language-folder, as this is the default version as well if no
admin-language-file for another language exists.
______________________________________________________________________________

ADMIN PANEL LANGUAGE VARIABLES:

Dont edit                    ||      Edit                                   */

$_lang_file_translator        = 'The Pixelpost Crew';
$_lang_file_email             = 'thecrew@pixelpost.org';
$_lang_file_rev               = '1.6';

$admin_lang_isrtl             = "no"; // yes for right-to-left languages and no for left-to-right languages
$admin_lang_update            = "Update";
$admin_lang_reload            = "<br /> Debes volver a cargar la p&aacute;gina para ver los cambios.";
$admin_lang_error             = "Error";
$admin_lang_post              = "envíos";
$admin_lang_page              = "p&aacute;gina";
$admin_lang_of                = "de";
$admin_lang_next              = "Siguiente";
$admin_lang_prev              = "Anterior";
$admin_lang_show              = "Mostrar";
$admin_lang_go                = "OK";
$admin_lang_done              = "Hecho:";


// Admin Start
$admin_start_1                = "La carpeta <b>language</b> no existe o el archivo";
$admin_start_2                = "No se encuentra.\n<br />Aseg&uacute;rate de que has cargado todos los archivos necesarios con los mismos nombres que se mencionan aqu&iacute;.";
$admin_start_userpw           = "Nombre de usuario o password incorrectos.";
$admin_start_pw_forgot        = "Olvid&eacute; mi password";
$admin_start_browser_title    = "ADMIN";
$admin_start_welcome          = "Bienvenido a pixelpost - Debes iniciar la sesi&oacute;n.";
$admin_start_pp_name          = "Link a tu fotolog:";
$admin_start_pp_tit           = "Haz click aqui para cargar tu fotolog";
$admin_start_cookie           = "Se enviar&aacute; una 'cookie'";
$admin_start_username         = "Usuario";
$admin_start_pw               = "Password";
$admin_start_pw_button        = "Env&iacute;ame un nuevo password";
$admin_start_pw_recover       = "Es virtualmente <span style='color:red;'><b>imposible recuperar tu antiguo password</b></span> pero podemos generarte uno nuevo al azar.\n<br />
                                 Por favor, introduce la direccion de email que configuraste en tu panel de control.
                                 <br />Recibir&aacute;s un nuevo password en breve.";
$admin_start_email            = "Direccion email:";
$admin_start_email_button     = "Intruduce tu email";
$admin_start_admin_1          = "Panel de Control";
$admin_start_admin_2          = "para";
$admin_start_remember         = "Iniciar sesi&oacute;n autom&aacute;ticamente:";

// Password Recovery

// Front Page
$admin_lang_pw_title            = "Recuperaci&oacute;n de Password";

$admin_lang_pw_wronguser        = "El usuario introducido no es un administrador.";
$admin_lang_pw_back             =  "Volver al panel de control";
$admin_lang_pw_noemail          = "No has introducido ninguna direcci&oacute;n de email. \n<br />
                                   Si no eres capaz de recordar tu passwordIf you have no clue about your password, deja un mensaje enl <a href='http://forum.pixelpost.org/'>Pixelpost forum</a>.\n<br />";
$admin_lang_pw_notsent          = "No se envi&oacute; nada. \n<br /> La direcci&oacute;n de email introducida no es la misma que se ha guardado en el panel de control.<br />";
$admin_lang_pw_subject          = "Mensaje de recuperaci&oacute;n de Password";
$admin_lang_pw_usertext         = "Tu nombre de usuario:";
$admin_lang_pw_mailtext         = "Tu direcci&oacute;n de email:";
$admin_lang_pw_newpw            = "Tu nuevo password:";
$admin_lang_pw_text_1           = "&Eacute;ste es el sistema de recuperaci&oacute;n de password";
$admin_lang_pw_text_2           = "De: Panel de control de Pixelpost";
$admin_lang_pw_text_3           = "Se enviar&acute; un correo a tu direcci&oacute;n con tu nombre de usuario y password. \n<br />  Comprueba tu correo en ";
$admin_lang_pw_text_4           = "<span style='color:red;'>Error. \n<br />La direcci&oacute;n de email introducida es correcta, pero no se pudo enviar ning&uacute;n mensaje. \n<br />Pide ayuda a tu administrador</span>";
$admin_lang_pw_text_5           = "Error en la base de datos:";
$admin_lang_pw_text_6           = "<br />Actualizaci&oacute;n de password fallida.";
$admin_lang_pw_text_7           = "&Eacute;ste email se ha enviado autom&aacute;ticamente desde el inicio de sesi&oacute;n de tu fotolog.\n Alguien solicit&oacute; un nuevo password para el panel de control.\n\n Inicia la sesi&oacute;n \n\nen ";
$admin_lang_pw_text_8           = "\n\npara configurar tu propio password.";

// Admin Menu
$admin_lang_new_image          = "Nueva Imagen";
$admin_lang_images             = "Im&aacute;genes";
$admin_lang_categories         = "Categor&iacute;as";
$admin_lang_comments           = "Comentarios";
$admin_lang_options            = "Opciones";
$admin_lang_general_info       = "Info";
$admin_lang_addons             = "Extras";
$admin_lang_logout             = "Cerrar sesi&oacute;n";

// New Image
$admin_lang_ni_post_a_new_image   = "Enviar Nueva Imagen";
$admin_lang_ni_image              = "Imagen";
$admin_lang_ni_image_title        = "T&iacute;tulo";
$admin_lang_ni_select_cat         = "Selecciona Categor&iacute;as / Keywords";
$admin_lang_ni_description        = "Descripci&oacute;n / Texto";
$admin_lang_ni_datetime           = "Fecha y Hora del env&iacute;o";
$admin_lang_ni_post_now           = "Enviar ahora";
$admin_lang_ni_post_one_day_after = "Enviar un dia despu&eacute;s de la &uacute;ltima entrada";
$admin_lang_ni_post_spec_date     = "Enviar en una fecha espec&iacute;fica. Configura la fecha debajo:";
$admin_lang_ni_post_entry         = "Enviar Entrada";
$admin_lang_ni_upload             = "Subir Archivo";
$admin_lang_ni_upload_error       = "Hay un problema con la carga de archivos.";
$admin_lang_ni_posted             = "ENVIADO";
$admin_lang_ni_year               = "a&ntilde;o";
$admin_lang_ni_month              = "mes";
$admin_lang_ni_day                = "d&iacute;a";
$admin_lang_ni_hour               = "hora";
$admin_lang_ni_min                = "minuto";
$admin_lang_ni_markdown_text      = "Usa Markdown o HTML para dar formato al texto.";
$admin_lang_ni_markdown_hp        = "Markdown homepage";
$admin_lang_ni_markdown_element   = "B&aacute;sico";
$admin_lang_ni_markdown_syntax    = "Sintaxis";
$admin_lang_ni_missing_data       = "Faltan datos<br />\nEs necesaria al menos una imagen y un t&iacute;tulo para la imagen.\n
                                     No se ha cargado ninguna imagen debido a que falta informaci&oacute;n.";
$admin_lang_ni_crop_nextstep      = "Selecciona la ventana de miniaturas:";
$admin_lang_ni_crop_background    = "&Eacute;ste es el fondo de la imagen a recortar";
$admin_lang_ni_post_exif_date     = "Usar datos EXIF";
$admin_lang_ni_db_error           = "ocurri&oacute; un error al escribir en la base de datos";
$admin_lang_ni_tags               = "Etiquetas";
$admin_lang_ni_tags_desc          = "(Para separar etiquetas usa coma, punto y coma o espacios; para unir palabras utiliza el gui&oacute;n o gui&oacute;n bajo)";
$admin_lang_ni_alt_language	  = "Introduce un t&iacute;tulo y una descripci&oacute;n en el idioma alternativo";

// Images
$admin_lang_imgedit_edit           = "Editar";
$admin_lang_imgedit_title          = "T&iacute;tulo:";
$admin_lang_imgedit_alttitle          		= "Alt. Title:";
$admin_lang_imgedit_file_name      = "Nombre de archivo:";
$admin_lang_imgedit_dimensions     = "Dimensiones:";
$admin_lang_imgedit_tbpublished    = "Publicada:";
$admin_lang_imgedit_category_plural = "Categor&iacute;as:";
$admin_lang_imgedit_delete          = "Borrar";
$admin_lang_imgedit_delete1         = "Borrado";
$admin_lang_imgedit_delete2         = "imagen(es).";
$admin_lang_imgedit_deleted         = "Eliminar env&iacute;o / Borrar imagen / Borrar miniatura";
$admin_lang_imgedit_deleted1        = "Env&iacute;o borrado.";
$admin_lang_imgedit_deleted2        = "Imagen borrada.";
$admin_lang_imgedit_delete_error    = "No se pudo borrar el archiovo de imagen.\n
                                       Deberás hacerlo de alguna otra manera, quiz&aacute;s con un software FTP.";
$admin_lang_imgedit_deleted3        = "Miniatura borrada.";
$admin_lang_imgedit_delete_error2   = "No se pudo borrar la miniatura.\n
                                       Deberás hacerlo de alguna otra manera, quiz&aacute;s con un software FTP.";
$admin_lang_imgedit_reupimg         = "Reenviar Imagen:";
$admin_lang_imgedit_file            = "Archivo: ";
$admin_lang_imgedit_file_isuploaded = "se ha reenviado.";
$admin_lang_imgedit_update          = "Actualizar imagen";
$admin_lang_imgedit_updated         = "Imagen actualizada";
$admin_lang_imgedit_txt_desc        = "Texto/descripci&oacute;n:";
$admin_lang_imgedit_dtime           = "Fecha/Hora:";
$admin_lang_imgedit_img             = "Imagen:";
$admin_lang_imgedit_fsize           = "Tamaño de archivo:";
$admin_lang_imgedit_12cropimg       = "Herramienta CropImage:";
$admin_lang_imgedit_12cropimg_txt   = "Para editar &eacute;sta miniatura, arrastra la ventana de corte con el rat&oacute;n o exp&aacute;ndela/contr&aacute;ela con los botones '+'/'-' :";
$admin_lang_imgedit_uthmb_button    = "Actualizar miniatura";
$admin_lang_imgedit_u_post_button   = "Actualizar entrada";
$admin_lang_imgedit_title1          = "Im&aacute;genes - Reenviar, Editar o Borrar im&aacute;genes || ";
$admin_lang_imgedit_title2          = " im&aacute;gen(es) en la base de datos \n<br /> Mostrando ";
$admin_lang_imgedit_title3          = " env&iacute;os, p&aacute;gina ";
$admin_lang_imgedit_title4          = " de ";
$admin_lang_imgedit_12crop_opt      = "<strong>Nota:</strong> La opci&oacute;n 12CropImage no se ha seleccionado para recortar miniaturas. Las miniaturas no se podr&aacute;n modificar.";
$admin_lang_imgedit_edit_post       = "EDITAR ENTRADA";
$admin_lang_imgedit_img_page        = "im&aacute;genes por p&aacute;gina";
$admin_lang_imgedit_cropbg          = "&Eacute;ste es el texto de fondo de 12cropimage";
$admin_lang_imgedit_js_del_im       = "&iquest;Est&aacute;s seguro de querer borrar &eacute;sta imagen?";
$admin_lang_imgedit_preview         = "Vista previa";
$admin_lang_imgedit_db_error        = "<br />Comprueba que el permalink no haya sido ya utilizado.";
$admin_lang_imgedit_tags_edit       = "Etiquetas (coma, punto y coma y espacio para separar etiquetas; junta palabras con el gui&oacute;n bajo):";
$admin_lang_imgedit_alt_language  	= "Modificar titulo y descripci&oacute;n en el idioma alternativo";
$admin_lang_imgedit_masstag  	      = "Agregar/Eliminar etiquetas de las im&aacute;genes seleccionadas";
$admin_lang_imgedit_masstag_set     = "Agregar etiqueta(s)";
$admin_lang_imgedit_masstag_set2    = "Agregar etiqueta(s) para idioma alternativo";
$admin_lang_imgedit_masstag_unset   = "Borrar etiqueta(s)";
$admin_lang_imgedit_published          = "Publicado";
$admin_lang_imgedit_unpublished_cmnts  = "Imagen(es) previamente oculta(s).";


// Mass-Edit Categories
$admin_lang_imgedit_mass_1          = "Edici&oacute;n masiva de categor&iacute;as";
$admin_lang_imgedit_mass_2          = "Asignar";
$admin_lang_imgedit_mass_3          = "Deasignar";
$admin_lang_imgedit_mass_4          = "Actualizaci&oacute;n en masa";


// Categories
$admin_lang_cats_add_cat            = "Agregar Categor&iacute;a";
$admin_lang_cats_added              = "Categor&iacute;a agregada.";
$admin_lang_cats_add_cat_txt        = "Agregar categor&iacute;a para asignar a im&aacute;genes.";
$admin_lang_cats_add_cat_txt_altlang= "Escribe la traducci&oacute;n de &eacute;sta categor&iacute;a.";
$admin_lang_cats_edit_cat           = "Editar Categor&iacute;as";
$admin_lang_cats_edit_cat_txt       = "Editar una categor&iacute;a";
$admin_lang_cats_edit_cat_button    = "Editar Categor&iacute;a";
$admin_lang_cats_edit_tip           = "Editar el nombre de las siguientes categor&iacute;as para ambos idiomas.<br />Todas las im&aacute;genes pertenecientes al nombre antiguo pertenecer&aacute;n al nuevo nombre que introduzcas aqu&iacute;.";
$admin_lang_cats_delete_cat         = "Borrar Categor&iacute;as";
$admin_lang_cats_delete_cat_txt     = "Borrar una categor&iacute;a";
$admin_lang_cats_delete_cat2        = "Borrado:";
$admin_lang_cats_delete_cats_button = "Borrar Categor&iacute;a";
$admin_lang_cats_deleted            = "Categor&iacute;a borrada.";
$admin_lang_cats_update             = "Actualizar Categor&iacute;a";
$admin_lang_cats_update_cat_button  = "Actualizar Categor&iacute;a";
$admin_lang_cats_updated            = "Categor&iacute;a actualizada al nuevo nombre.";


// Comments
$admin_lang_cmnt_commentlist        = "Lista de Comentarios - Borrar o editar &nbsp;||&nbsp;Mostrando";
$admin_lang_cmnt_name               = "Nombre:";
$admin_lang_cmnt_email              = "Email:";
$admin_lang_cmnt_comment            = "Comentario:";
$admin_lang_cmnt_image              = "Imagen";
$admin_lang_cmnt_delete             = "Borrar";
$admin_lang_cmnt_deleted            = "Borrar un comentario.";
$admin_lang_cmnt_delete1            = "Borrado";
$admin_lang_cmnt_delete2            = "comentario(s) seleccionados.";
$admin_lang_cmnt_edit               = "Editar";
$admin_lang_cmnt_edited             = "Editar un comentario.";
$admin_lang_cmnt_check_all          = "Seleccionar todos";
$admin_lang_cmnt_clear_all          = "Borrar selecci&oacute;n";
$admin_lang_cmnt_invert_checks      = "Invertir selecci&oacute;n";
$admin_lang_cmnt_del_selected       = "Borrar seleccionados";
$admin_lang_cmnt_page               = "comentarios por p&aacute;gina.";
$admin_lang_cmnt_commenter          = "Comentario enviado:";
$admin_lang_cmnt_ip                 = "IP:";
$admin_lang_cmnt_save               = "Guardar";
$admin_lang_cmnt_massdelete_text    = "Selecciona varios comentarios para borrarlos a la vez";
$admin_lang_cmnt_js_del_comm        = "&iquest;Est&aacute;s seguro de querer borrar &eacute;ste comentario?";
$admin_lang_cmnt_publish_sel        = "Publicar Seleccionados";
$admin_lang_cmnt_unpublish_sel      = "A&ntilde;adir a la cola de moderaci&oacute;n";
$admin_lang_cmnt_published          = "Publicado";
$admin_lang_cmnt_unpublished_cmnts  = "comentario(s) previamente oculto(s).";
$admin_lang_cmnt_unpublished        = "Oculto";
$admin_lang_cmnt_published_cmnts    = "comentario(s) previamente publicado(s).";
$admin_lang_cmnt_error_blacklist    = "Error al actualizar la lista negra: ";
$admin_lang_cmnt_error_banlist      = "Error al actualizar la lista de referrers prohibidos: ";
$admin_lang_cmnt_moderation_que     = "Cola de Moderaci&oacute;n";
$admin_lang_cmnt_rep_spam           = 'Reportar Spam';


// Option
$admin_lang_optn_general            = "GENERAL";
$admin_lang_optn_template           = "ASPECTO";
$admin_lang_optn_thumbnails         = "MINIATURAS";
$admin_lang_optn_tip                = "No olvides la barra al final <b>'/'</b> e.g. <i>http://www.pixelpost.org/</i>";

$admin_lang_optn_update             = "ACTUALIZAR";
$admin_lang_optn_yes                = "Si";
$admin_lang_optn_no                 = "No";

$admin_lang_optn_title_url         = "T&Iacute;TULO Y URL";
$admin_lang_optn_title             = "T&iacute;tulo:";
$admin_lang_optn_url               = "URL:";
$admin_lang_optn_usr_pss           = "USUARIO ADMIN &amp; PASSWORD";
$admin_lang_optn_usr_pss_txt       = "&iquest;Cambiar nombre de usuario o password?";
$admin_lang_optn_usr               = "Usuario:";
$admin_lang_optn_pss               = "Password:";
$admin_lang_optn_pss_re            = "Confirmar Password:";
$admin_lang_optn_email             = "EMAIL";
$admin_lang_optn_fillit            = "Introd&uacute;celo. Ser&aacute; necesario si olvidas tu password.";
$admin_lang_optn_img_path          = "RUTA DE IM&Aacute;GENES";
$admin_lang_optn_tz                = "ZONA HORARIA";
$admin_lang_optn_tz_txt            = "Selecciona tu zona horaria local.";
$admin_lang_optn_sendemail         = "ENVIAR EMAIL PARA NUEVO COMENTARIO";
$admin_lang_optn_sendemail_txt     = "&iquest;Enviar una notificaci&oacute;n cuando se env&iacute;en nuevos comentarios?";
$admin_lang_optn_sendemail_html_txt = "&iquest;Usar HTML en los emails de notificaci&oacute;n?";
$admin_lang_optn_comment_setting 		= "AJUSTES GLOBALES DE COMENTARIOS";
$admin_lang_optn_comment_setting2		= "Configuraci&oacute;n de comentarios";
$admin_lang_optn_cmnt_mod_txt       = "Acci&oacute;n por defecto para comentarios:";
$admin_lang_optn_cmnt_mod_txt2      = "Acci&oacute;n para comentarios:";
$admin_lang_optn_cmnt_mod_allowed		=	"Publicar inmediatamente";
$admin_lang_optn_cmnt_mod_moderation=	"A la cola de moderaci&oacute;n";
$admin_lang_optn_cmnt_mod_forbidden	=	"Deshabilitar comentarios";

$admin_lang_optn_switch_template    = "CAMBIAR PLANTILLA";
$admin_lang_optn_lang_file           = "ARCHIVO DE LENGUAJE";
$admin_lang_optn_lang_file_admin          = "ADMIN PANEL LANGUAGE FILE";
$admin_lang_optn_dateformat          = "FORMATO DE FECHA";
$admin_lang_optn_dateformat_txt      = "El formato de fecha para mostrar en las im&aacute;genes y comentarios. La sintaxis utilizada es id&eacute;ntica que para la funci&oacute;n <a href='http://www.php.net/date' target='_blank'>date()</a> en PHP. &Eacute;stos son algunos ejemplos: Y:a&ntilde;o m:mes d:d&iacute;a H:hora i:minuto s:segundo";
$admin_lang_optn_gmt                 = "Ten en cuenta que el horario de verano no se gestiona autom&aacute;ticamente y tendras que ajustarlo manualmente.<br />Consulta <a href='http://www.worldtimeserver.com/current_time_in_UTC.aspx' target='__blank'> la hora actual GMT </a> si no est&aacute;s seguro de tu zona horaria.<br />";
$admin_lang_optn_cat_link_format     = "FORMATO PARA ENLACES A CATEGOR&Iacute;AS";
$admin_lang_optn_catlinkformat_select = "Selecciona un formato para los enlaces a categor&iacute;as";
$admin_lang_optn_cat_link_format_txt  = "El formato en que se muestran los enlaces a categor&iacute;as en la plantilla.";
$admin_lang_optn_catlinkformat_custom = "Formato personalizado de categor&iacute;s";
$admin_lang_optn_catlinkformat_custom_start = "Caracter(es) de inicio:";
$admin_lang_optn_catlinkformat_custom_end = "Caracter(es) de cierre:";
$admin_lang_optn_calendar_type       = "TIPO DE CALENDARIO";
$admin_lang_optn_thumb_row           = "FILA DE MINIATURAS";
$admin_lang_optn_thumb_row_txt       = "Cuantas miniaturas se mostrar&aacute;n en la fila.<br/>Introduce un n&uacute;mero impar para un mejor resultado, por ejemplo 7 o 9, no 6 u 8.";
$admin_lang_optn_crop_thumbs         = "&iquest;RECORTAR MINIATURAS?";
$admin_lang_optn_crop_thumbs_txt     = "Si deseas recortar las miniaturas a un tama&ntilde;o espec&iacute;fico: selecciona <b>SI.</b><br/>\n
                                        Si quieres mantener la proporci&oacute;n original, selecciona <b>NO.</b><br/>\n
                                        Si quieres recortar manualmente las miniaturas tras subir la imagen, selecciona <b>12CropImage.</b>";
$admin_lang_optn_thumb_size          = "TAMA&Ntilde;O DE MINIATURAS";
$admin_lang_optn_thumb_size_txt      = "Ajusta el tama&ntilde;o de las miniaturas, Anchura x Altura (Pixels).";
$admin_lang_optn_thumb_size_new      = "ajustar al nuevo tama&ntilde;o";
$admin_lang_optn_reg_thumbs_button   = "Regenerar miniaturas";
$admin_lang_optn_regen_thumbs_txt    = "&Eacute;sto generar&aacute; nuevas miniaturas a partir de todas las im&aacute;genes enviadas. Perder&aacute;s todas las miniaturas que hayas recortado manualmente y se generaran otras nuevas por defecto. Podras modificar las miniaturas m&aacute;s tarde al editar cada imagen con 12CropImage.";
$admin_lang_optn_img_compression     = "COMPRESI&Oacute;N PARA MINIATURAS";
$admin_lang_optn_img_compression_txt = "Selecciona el grado de compresi&oacute;n JPG. 10 es baja calidad y 100 es calidad m&aacute;xima (sin p&eacute;rdida)";
$admin_lang_optn_pass_chngd_txt      = "El password ha sido modificado.";
$admin_lang_optn_pass_notchngd_txt   = "El password no se ha modificado. Repite el mismo password en la casilla de confirmaci&oacute;n.";
$admin_lang_optn_title_url_text      = "Comprueba o modifica el t&iacute;tulo del sitio y la URL de tu instalaci&oacute;n";
$admin_lang_optn_thumb_updated       = "Miniaturas actualizadas.";
$admin_lang_optn_updated             = "miniaturas actualizadas.";
$admin_lang_optn_visitorbooking_title = 'RECORDAR VISITANTES';
$admin_lang_optn_visitorbooking_desc  = '&iquest;Guardar informaci&oacute;n de cada visitante?';
$admin_lang_optn_upd_done             = "Actualizaci&oacute;n Terminada.";
$admin_lang_optn_upd_error            = "Error de Actualizaci&oacute;n .";
$admin_lang_optn_upd_lang_error			  = "El idioma alternativo seleccionado es el mismo que el idioma por defecto.<br />Escoge un idioma alternativo diferenete o deshabilita la opci&oacute;n de idioma alternativo.";
$admin_lang_optn_markdown             = "HABILITAR MARKDOWN";
$admin_lang_optn_markdown_desc        = "&iquest;Habilitar la funci&oacute;n Markdown en la descripci&oacute;n de la imagen?";
$admin_lang_optn_exif			            = "HABILITAR EXIF";
$admin_lang_optn_exif_desc		        = "&iquest;Habilitar datos EXIF en la p&aacute;gina principal?";
$admin_lang_optn_token			          = "HABILITAR 'TOKEN' PARA FORMULARIOS";
$admin_lang_optn_token_desc		        = "Utilizar un token reducir&aacute; la probabilidad de ataques de tipo<a href=\"http://en.wikipedia.org/wiki/Cross-site_request_forgery\">Cross-Site Request Forgerie</a>.<br/><br/>\n
																				 Si el par&aacute;metro est&aacute; activdo, s&oacute;lo se guardar&aacute;n comentarios cuando el el token del formulario corresponda al usuario que ha iniciado sesi&oacute;n. Pra implementar &eacute;sto debes a&ntilde;adir <strong>&lt;TOKEN&gt;</strong> a la plantilla de comentarios entre las etiquetas <strong><i>&lt;form&gt;...&lt;/form&gt;</i></strong>.
																				 Si olvidas a&ntilde;adir la etiqueta <strong>&lt;TOKEN&gt;</strong>, los comentarios dejar&aacute;n de funcionar y se mostrar&aacute; un error al usuario.<br /><br/>\n
																				 &iquest;Habilitar &eacute;sta funci&oacute;n?";
$admin_lang_optn_token_time						= "Tiempo m&aacute;ximo entre la apertura de la ventana de comentarios y el env&iacute;o del comentario: ";
$admin_lang_optn_token_error					= "Atenci&oacute;n: los valores inferiores a 1 minuto para el Token no seon v&aacute;lidos. El valor del Token se ha ajustado a 1 minuto.";
$admin_lang_optn_dsbl_list 						= "AJUSTES DE 'DISTRIBUTED SENDER BLACKHOLE LIST' (http://www.dsbl.org)";
$admin_lang_optn_dsbl_list_desc 			= "La <a href=\"http://www.dsbl.org\" target=\"_blank\">Distributed Sender Blackhole List</a> contiene una lista de direcciones IP de servidores de acceso libre, proxys abiertos o que tienen otras vulnerabilidades. &Eacute;stos servidores son utilizados habitualmente por SPAMMERS para enviar e-mails, pero tambi&eacute;n para enviar comentarios.<br /> <br />
																				 &iquest;Comparar IP de comentarios con la lista DSBL?";
$admin_lang_optn_time_between_comments = "PREVENCI&Oacute;N ANTISPAM";
$admin_lang_optn_time_between_comments_desc = "N6uacute;mero de segundos antes de poder enviar un nuevo comentario (para prevenir avalanchas): ";
$admin_lang_optn_max_uri_comment			= "N&Uacute;MERO M&Aacute;XIMO DE URI's";
$admin_lang_optn_max_uri_comment_desc = "N&uacute;mero de enlaces permitidos por comentario: ";
$admin_lang_optn_rss_setting					= "AJUSTES DE SUSCRIPCI&Oacute;N RSS/ATOM";
$admin_lang_optn_rsstype_desc					= "Selecciona el estilo del 'feed' RSS/ATOM:";
$admin_lang_optn_rss_full							= "Mostrar im&aacute;genes a tamaño completo";
$admin_lang_optn_rss_thumbs						= "Mostrar miniaturas";
$admin_lang_optn_rss_thumbs_only					= "Mostrar s&oacute;lo miniaturas";
$admin_lang_optn_rss_text							= "Mostrar texto s&oacute;lo";
$admin_lang_optn_feeditems_desc				= "N&uacute;mero de elementos en el 'feed': ";
$admin_lang_optn_lang                  = "Base language settings: ";
$admin_lang_optn_alt_lang             = "Ajustes de idioma alternativo: ";
$admin_lang_optn_alt_lang_dis         = "deshabilitado";
$admin_lang_optn_alt_lang_no          = "deshabilitado";
$admin_lang_optn_img_display						="IMAGE DISPLAY ORDER";
$admin_lang_optn_img_display_desc				="Select the order in which images should be displayed. Start with: ";
$admin_lang_optn_img_display_default		="newest image (default)";
$admin_lang_optn_img_display_reversed		="oldest image (reversed)";

// Info
$admin_lang_info_gd                  = "No instalado. Pide a tu administrador que lo instale.";
$admin_lang_info_gd_jpg              = "con soporte JPEG";
$admin_lang_pp_version1              = "&Uacute;ltima versi&oacute;n de Pixelpost:";
$admin_lang_pp_forum                 = "Si buscas ayuda o para cualquier comentario, por favor, visita el foro de Pixelpost.";
$admin_lang_pp_min_php               = "Requisito m&iacute;nimo de Pixelpost: versi&oacute;n de PHP";
$admin_lang_pp_min_mysql             = "Requisito m&iacute;nimo de Pixelpost: MySQL";
$admin_lang_pp_exif1                 = "<b>EXIF</b> Pixelpost est&aacute; utilizando";
$admin_lang_pp_exif2                 = "para la informaci&oacute;n EXIF";
$admin_lang_pp_path                  = "Rutas";
$admin_lang_pp_imagepath             = "Ruta por defecto para im&aacute;genes:";
$admin_lang_pp_imagepath_conf        = "Ruta configurada para im&aacute;genes:";
$admin_lang_pp_img_chmod1            = "La carpeta de im&aacute;genes no tiene permisos de escritura.";
$admin_lang_pp_img_chmod2            = "Debes ajustar los permisos correctos en &eacute;sta carpeta o no podr&aacute;s subir ninguna imagen.";
$admin_lang_pp_img_chmod3            = "<br /> Cambia los permisos con <b>chmod 777</b> (permisos de lectura, escritura y ejecuci&oacute;n para propietario, grupo y otros).";
$admin_lang_pp_img_chmod4            = "&iquest;Es posible la escritura en el directorio? SI.";
$admin_lang_pp_img_chmod5            = "La carpeta de miniaturas no tiene permisos de escritura.";
$admin_lang_pp_imgfolder             = "Directorio de Im&aacute;genes:";
$admin_lang_pp_thumbfolder           = "Directorio de Miniaturas:";
$admin_lang_pp_langfolder            = "Directorio de Idiomas:";
$admin_lang_pp_addfolder             = "Directorio de Extras:";
$admin_lang_pp_incfolder             = "Directorio de Includes:";
$admin_lang_pp_tempfolder            = "Directorio de Plantillas:";
$admin_lang_pp_folder_missing        = "No Existe (deber&iacute;a";
$admin_lang_pp_ref_log_title         = "Referrers en los &uacute;ltimos 7 d&iacute;as";
$admin_lang_hostinfo                 = "Informaci&oacute;n del host";
$admin_lang_fileuploads              = "<b>Archivos Cargados</b> a Pixelpost en";
$admin_lang_serversoft               = "Software del Servidor";
$admin_lang_pixelpostinfo            = "Informaci&oacute;n sobre Pixelpost";
$admin_lang_pp_currversion           = "Se est&aacute; ejecutando la versi&oacute;n de Pixelpost: ";
$admin_lang_pp_check                 = "Comprobar";
$admin_lang_pp_sess_path             = "Ruta de la sesi&oacute;n";
$admin_lang_pp_sess_path_emp         = "est&aacute; vac&iacute;o";
$admin_lang_pp_fileupload_np         = 'NO es posible. Comprueba la variable file_upload en el archivo php.ini.';
$admin_lang_pp_fileupload_p          = 'posible.';
$admin_lang_pp_langs                 = 'Traducciones de Pixelpost';
$admin_lang_pp_lng_fname             = 'Nombre de Archivo';
$admin_lang_pp_lng_author            = 'Autor';
$admin_lang_pp_lng_ver               = 'Versi&oacute;n';
$admin_lang_pp_lng_email             = 'Email';
$admin_lang_pp_newest_ver            = 'Tienes la &uacute;ltima versi&oacute;n de Pixelpost.';

// AddOns
$admin_lang_addon_title              = "Extras Instalados";
$admin_lang_failed_addonstatus       = "Fallo al actualizar el estado del 'addon': ";
$admin_lang_addon_off                = "Click para OFF";
$admin_lang_addon_on                 = "Click para ON";

// Error Messages
$admin_lang_pp_up_error_0            = "La carga se realiz&oacute; sin errores.";
$admin_lang_pp_up_error_1            = "Tama&ntilde;o m&aacute;ximo de archivo excedido para &eacute;ste servidor web.";
$admin_lang_pp_up_error_2            = "Tama&ntilde;o m&aacute;ximo de archivo excedido.";
$admin_lang_pp_up_error_3            = "El archivo no se carg&oacute; completamente.";
$admin_lang_pp_up_error_4            = "No se subi&oacute; ning&uacute;n archivo.";
$admin_lang_pp_up_error_6            = "No se encuentra una carpeta temporal.";
$admin_lang_pp_up_error_7            = "Fallo al escribir el archivo en disco.";
$admin_lang_pp_addon_error								= "Pixelpost is not able to read the addon file. Please check the chmod settings and change them to 755";


// options >> time stamps
$admin_lang_optn_timestamps_title  = "TIME STAMPS";
$admin_lang_optn_timestamps_desc   = "Agregar 'time stamps' a los nombres de archivo evita que se sobreescriban im&aacute;genes con el mismo nombre. <br/>
                                     &iquest;Utilizar 'time stamps'? ";

// options >> fight spam
$admin_lang_spam            = "CONTROL DE SPAM";
$admin_lang_spam_change     = "Todas las listas de bloqueo";
$admin_lang_spam_err_1      = "Error al crear la tabla para la lista de bloqueo: ";
$admin_lang_spam_tableadd   = "La tabla para la lista de bloqueo se a&ntilde;ade para evitar el spam";
$admin_lang_spam_err_2      = "Error al actualizar la lista de moderaci&oacute;n: ";
$admin_lang_spam_err_3      = "Error al actualizar la lista negra: ";
$admin_lang_spam_err_4      = "Error al actualizar la lista de bloqueo de referrers: ";
$admin_lang_spam_err_5      = "Error al actualizar el n&uacute;mero m&aacute;ximo de enlaces en los comentarios: ";
$admin_lang_spam_upd        = "Todas las listas de bloqueo actualizadas con &eacute;xito";
$admin_lang_spam_err_6      = "Error al actualizar los comentarios compar&aacute;ndolos con la lista de moderaci&oacute;n: ";
$admin_lang_spam_com_upd    = "Past: los comentarios son comparados con la lista de moderaci&oacute;n ";
$admin_lang_spam_err_7      = "Error al borrar los comentarios compar&aacute;ndolos con la lista negra: ";
$admin_lang_spam_com_del    = "Past: los comentarios que contienen palabras/IPs de la lista negra son borrados.";
$admin_lang_spam_err_8      = "Error al borrar los visitantes al comparar con la lista de bloqueo de referrers: ";
$admin_lang_spam_visit_del  = "Los visitantes con palabras/IPs de la lista de bloqueo de referrers son borrados.";

// Spam
$admin_lang_spam_ban        = "Actualizar listas de bloqueo";
$admin_lang_spam_content    = "Agregar listas de palabras prohibidas, IPs, nombres... en las casillas inferiores, una palabra por l&iacute;nea.<br/>\n
                               Cualquier comentario con una palabra, IP o nombre en la lista de moderaci&oacute;n ser&aacute; enviado a la cola de moderaci&oacute;n.<br/>\n
                               Cualquier comentario con una palabra, IP o nombre en la lista negra no tendr&aacute; permisos para entrar en la lista de comentarios.<br/>
                               Cualquier visitante con una IP contenida en la <b>lista de referrers bloqueados</b> o una direcci&oacute;n que contenga palabras de esa lista,\n
                               no podr&aacute; acceder a tu fotolog (Debes a&ntilde;adir el c&oacute;digo al archivo .htaccess para que funcione.)";
$admin_lang_spam_modlist    = "Lista de Moderaci&oacute;n";
$admin_lang_spam_blacklist  = "Lista Negra";
$admin_lang_spam_reflist    = "Lista de Referrers Bloqueados";
$admin_lang_spam_blacklist_text = "Copia &eacute;ste c&oacute;difo (CTRL+A y CTRL+C en Windows) y p&eacute;galo en el archivo .htaccess de tu web para bloquear IPs y referrers.";
$admin_lang_spam_htaccess_text = "Obtener  c&oacute;difo .htaccess";
$admin_lang_spam_check_comm  = "Comprobar comentarios anteriores";
$admin_lang_spam_del_bad_comm = "Borrar Comentarios Malos";
$admin_lang_spam_del_bad_ref = "Borrar Referrers Malos";
$admin_lang_spam_updateblacklist = "Actualizar todas las listas de bloqueo";

// End of Admin-Language-File
?>
