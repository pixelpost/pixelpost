<?php
/*
Pixelpost version 1.7

SVN file version:
$Id: admin-lang-spanish.php 450 2007-10-22 00:00:42Z david.kozikowski $

Version 1.7:
Development Team:
Ramin Mehran, Will Duncan, Joseph Spurling,
Piotr "GeoS" Galas, Dennis Mooibroek, Karin Uhlig, Jay Williams, David Kozikowski

Former members of the Development Team:
Connie Mueller-Goedecke
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Contact: thecrew (at) pixelpost (dot) org
Copyright 2007 Pixelpost.org <http://www.pixelpost.org>

Pixelpost www:  	http://www.pixelpost.org/
Pixelpost wiki: 	http://wiki.pixelpost.org/
Pixelpost forum: 	http://forum.pixelpost.org
_____________________________________________________________________________

ADMIN PANEL LANGUAGE VARIABLES:

Dont edit                    ||      Edit                                   */

$_lang_file_translator        					= 'el Trauko - <a href="http://trauko.org/" target="_blank">http://trauko.org</a>';
$_lang_file_email             					= 'cesar@trauko.org';
$_lang_file_rev               					= '1.7';

$admin_lang_isrtl             					= "no"; // yes for right-to-left languages and no for left-to-right languages
$admin_lang_update            					= "Actualizar";
$admin_lang_reload            					= "<br /> Debes reiniciar PixelPost para ver los cambios.";
$admin_lang_error             					= "Error";
$admin_lang_post              					= "comentarios";
$admin_lang_page              					= "p&aacute;gina";
$admin_lang_of                					= "de";
$admin_lang_next              					= "Siguiente";
$admin_lang_prev              					= "Anterior";
$admin_lang_show              					= "Mostrar";
$admin_lang_go                					= "Ok";
$admin_lang_done              					= "Hecho:";
$admin_lang_example								= "Ejemplo";


// Admin Start
$admin_start_1                					= "La carpeta <b>language</b> no existe o el archivo";
$admin_start_2                					= "no esta en esta carpeta.\n<br />Aseg&uacute;rate de que has cargado todos los archivos correctamente.";
$admin_start_userpw           					= "Nombre de usuario o clave incorrecta.";
$admin_start_pw_forgot        					= "&iquest;Olvidaste la clave?";
$admin_start_browser_title    					= "ADMINISTRACI&Oacute;N";
$admin_start_welcome          					= "Bienvenido a Administraci&oacute;n de PixelPost - Debes registrarse.";
$admin_start_pp_name          					= "Enlace a tu fotolog de PixelPost:";
$admin_start_pp_tit           					= "pincha aca para ingresar";
$admin_start_cookie           					= "Se cargara una 'cookie'";
$admin_start_username         					= "Usuario";
$admin_start_pw               					= "Clave";
$admin_start_pw_button        					= "Env&iacute;ame una nueva clave";
$admin_start_pw_recover       					= "No hay forma de recuperar<span style='color:red;'><b> tu antigua clave</b></span> pero PixelPost puede crear una nueva clave para t&iacute;.\n<br />
                                 				Por favor ingresa el correo como lo has ingresado en el panel de administraci&oacute;n.
                                 				<br />Recibiras una nueva clave en tu correo de inmediato.";
$admin_start_email            					= "eMail:";
$admin_start_email_button     					= "Ingresa tu eMail";
$admin_start_admin_1          					= "Administraci&oacute;n";
$admin_start_admin_2          					= "para";
$admin_start_remember         					= "Ingresar autom&aacute;ticamente en cada visita:";

// Password Recovery

// Front Page
$admin_lang_pw_title            				= "Recuperaci&oacute;n de clave";

$admin_lang_pw_wronguser        				= "El usuario no es el administrador de PixelPost.";
$admin_lang_pw_back             				=  "Volver al panel de control";
$admin_lang_pw_noemail          				= "No has ingresado un eMail! \n<br />
                                   				Si no recuerdas tu clave, env&iacute;a un mensaje en <a href='http://forum.pixelpost.org/'>Pixelpost forum</a> solicitando ayuda.\n<br />";
$admin_lang_pw_notsent          				= "No se env&iacute;o nada! \n<br /> El e-Mail ingresado no coincide con la ingresade en el panel de administraci&oacute;n.<br />";
$admin_lang_pw_subject          				= "Mensaje de recuperaci&oacute;n de clave de PixelPost";
$admin_lang_pw_usertext         				= "Usuario:";
$admin_lang_pw_mailtext         				= "e-Mail:";
$admin_lang_pw_newpw            				= "Tu nueva clave:";
$admin_lang_pw_text_1           				= "Sistema de recuperaci&oacute;n de claves de PixelPost";
$admin_lang_pw_text_2           				= "De: Administraci&oacute;n de PixelPost";
$admin_lang_pw_text_3           				= "Se te env&iacute;o un correo con tu nombre de usuario y tu nueva clave. \n<br />  Revisa tu correo en ";
$admin_lang_pw_text_4           				= "<span style='color:red;'>Error! \n<br />El eMail ingresado y el nombre de usuario son correctos, pero no se pudo enviar un correo! \n<br />Consulta con tu administrador de host</span>";
$admin_lang_pw_text_5           				= "Error en la base de datos:";
$admin_lang_pw_text_6           				= "<br />Error al actualizar la clave.";
$admin_lang_pw_text_7           				= "Este eMail se env&iacute;o autom&aacute;ticamente desde el acceso a tu Fotolog.\nAlguien solicit&oacute; una nueva clave para el panel de administraci&oacute;n.\n\nPuedes ingresar a tu Fotolog\n\nen ";
$admin_lang_pw_text_8           				= "\n\ncon tu nueva clave\n\nde inmediato!";

// Admin Menu
$admin_lang_new_image          					= "Nueva imagen";
$admin_lang_images             					= "Im&aacute;genes";
$admin_lang_categories         					= "Categor&iacute;as";
$admin_lang_comments           					= "Comentarios";
$admin_lang_options            					= "Opciones";
$admin_lang_general_info       					= "Informaci&oacute;n";
$admin_lang_addons             					= "Addons";
$admin_lang_logout             					= "Terminar";

// New Image
$admin_lang_ni_post_a_new_image   				= "Nueva Imagen";
$admin_lang_ni_image              				= "Imagen";
$admin_lang_ni_image_title        				= "T&iacute;tulo";
$admin_lang_ni_select_cat         				= "Categor&iacute;a / claves";
$admin_lang_ni_description        				= "Descripc&iacute;&oacute;n / texto";
$admin_lang_ni_datetime           				= "Fecha y hora";
$admin_lang_ni_post_now           				= "Publicar ahora";
$admin_lang_ni_post_one_day_after 				= "Publicar un d&iacute;a despues de la ultima imagen";
$admin_lang_ni_post_spec_date     				= "Publicar el(ingresar fecha):";
$admin_lang_ni_post_entry         				= "Publicar";
$admin_lang_ni_upload             				= "Subir";
$admin_lang_ni_upload_error       				= "Error en el archivo!";
$admin_lang_ni_posted             				= "PUBLICADO";
$admin_lang_ni_year               				= "a&ntilde;o";
$admin_lang_ni_month              				= "mes";
$admin_lang_ni_day                				= "d&iacute;a";
$admin_lang_ni_hour               				= "hora";
$admin_lang_ni_min                				= "minuto";
$admin_lang_ni_markdown_text      				= "Usar Markdown o HTML para formatear el texto.";
$admin_lang_ni_markdown_hp        				= "Sitio de Markdown";
$admin_lang_ni_markdown_element   				= "B&aacute;sico";
$admin_lang_ni_markdown_syntax    				= "Sintaxis";
$admin_lang_ni_missing_data      				= "Falta informaci&oacute;n<br />\nSe necesita al menos un t&iacute;tulo para la imagen, y una imagen.\n
                                     			No se subi&oacute; ninguna imagen\n!";
$admin_lang_ni_crop_nextstep      				= "Selecciona la ventana de miniaturas:";
$admin_lang_ni_crop_background    				= "Este es el fondo de la imagen a recortar";
$admin_lang_ni_post_exif_date     				= "Usar datos EXIF";
$admin_lang_ni_db_error           				= "error al escribir en la base de datos";
$admin_lang_ni_tags               				= "Etiquetas";
$admin_lang_ni_tags_desc          				= "(coma, punto y coma, y espacio se usan para separar etiquetas; para unir palabras usa gui&oacute;n o gui&oacute;n bajo)";
$admin_lang_ni_alt_language						= "Ingresa el t&iacute;tulo y descripci&oacute;n en el idioma secundario";

// Images
$admin_lang_imgedit_edit           				= "Editar";
$admin_lang_imgedit_title          				= "T&iacute;tulo:";
$admin_lang_imgedit_alttitle          		= "T&iacute;tulo secundario:";
$admin_lang_imgedit_file_name      				= "Archivo:";
$admin_lang_imgedit_dimensions     				= "Tama&ntilde;o:";
$admin_lang_imgedit_tbpublished    				= "a publicar el:";
$admin_lang_imgedit_category_plural 			= "Categor&iacute;as:";
$admin_lang_imgedit_delete          			= "Borrar";
$admin_lang_imgedit_delete1         			= "Borrado";
$admin_lang_imgedit_delete2         			= "imagen(es).";
$admin_lang_imgedit_deleted         			= "Borrar publicaci&oacute;n / borrar imagen / borrar miniatura";
$admin_lang_imgedit_deleted1        			= "Publicaci&oacute;n borrada.";
$admin_lang_imgedit_deleted2        			= "Imagen borrada.";
$admin_lang_imgedit_delete_error    			= "No se pudo borrar el archivo de imagen.\n
                                       			Debes hacerlo por otro medio, por ejemplo con tu programa FTP.";
$admin_lang_imgedit_deleted3        			= "Miniatura borrada.";
$admin_lang_imgedit_delete_error2   			= "No se pudo borrar la miniatura.\n
                                       			Debes hacerlo por otro medio, por ejemplo con tu programa FTP.";
$admin_lang_imgedit_reupimg         			= "Re-Enviar Imagen:";
$admin_lang_imgedit_file            			= "Archivo: ";
$admin_lang_imgedit_file_isuploaded 			= "re-enviado!";
$admin_lang_imgedit_update          			= "Actualizar imagen";
$admin_lang_imgedit_updated         			= "Imagen actualizada";
$admin_lang_imgedit_txt_desc        			= "Texto/descripci&oacute;n:";
$admin_lang_imgedit_dtime           			= "Fecha-hora:";
$admin_lang_imgedit_img             			= "Imagen:";
$admin_lang_imgedit_fsize           			= "Tama&ntilde;o:";
$admin_lang_imgedit_12cropimg       			= "Recortar miniatura:";
$admin_lang_imgedit_12cropimg_txt   			= "Para editar la miniatura, arrastra la ventana de recorte con el mouse, exp&aacute;nde/contr&aacute;e con los botones '+'/'-':";
$admin_lang_imgedit_uthmb_button    			= "Actualizar miniatura";
$admin_lang_imgedit_u_post_button   			= "Actualizar publicaci&oacute;n";
$admin_lang_imgedit_title1          			= "Imagenes - Re-cargar, Editar o Borrar imagenes || ";
$admin_lang_imgedit_title2          			= " imagen(es) en la base de datos \n<br /> Mostrando ";
$admin_lang_imgedit_title3          			= " Notas, pag. ";
$admin_lang_imgedit_title4          			= " de ";
$admin_lang_imgedit_12crop_opt      			= "<strong>Nota:</strong> La opci&oacute;n 12CropImage no est&aacute; seleccionada. Las miniaturas no se modificaron.";
$admin_lang_imgedit_edit_post       			= "EDITAR NOTA";
$admin_lang_imgedit_img_page        			= "imagenes por pag.";
$admin_lang_imgedit_cropbg          			= "Este es texto de fondo de 12cropimage";
$admin_lang_imgedit_js_del_im       			= "&iquest;Seguro que deseas borrar la imagen?";
$admin_lang_imgedit_preview         			= "Vista previa";
$admin_lang_imgedit_db_error        			= "<br />Revisa que el permalinkno haya sido utilizado!";
$admin_lang_imgedit_tags_edit       			= "Etiquetas (coma, punto y coma, y espacio se usan para separar etiquetas; se unen palabras con gui&oacute;n bajo):";
$admin_lang_imgedit_alt_language  				= "Cambiar titulo de la imagen y descripcion en idioma alternativo";
$admin_lang_imgedit_masstag  	      			= "A&ntilde;adir/borrar etiquetas de imagenes seleccionadas";
$admin_lang_imgedit_masstag_set     			= "A&ntilde;adir etiqueta(s)";
$admin_lang_imgedit_masstag_set2    			= "A&ntilde;adir etiqueta(s) para idioma alternativo";
$admin_lang_imgedit_masstag_unset   			= "Borrar etiqueta(s)";
$admin_lang_imgedit_published          			= "Publicado";
$admin_lang_imgedit_unpublished_cmnts  			= "imagenes previamente enmascarada(s).";


// Mass-Edit Categories
$admin_lang_imgedit_mass_1          			= "Edici&oacute;n masiva de categor&iacute;as";
$admin_lang_imgedit_mass_2          			= "Asignar";
$admin_lang_imgedit_mass_3          			= "Deasignar";
$admin_lang_imgedit_mass_4          			= "Actualizaci&oacute;n en masa";


// Categories
$admin_lang_cats_add_cat            			= "Agregar Categor&iacute;a";
$admin_lang_cats_added              			= "Categor&iacute;a agregada";
$admin_lang_cats_add_cat_txt        			= "Agregar una categor&iacute;a para asignar imagenes.";
$admin_lang_cats_add_cat_txt_altlang			= "Escribe la traducci&oacute;n de &eacute;sta categor&iacute;a.";
$admin_lang_cats_edit_cat           			= "Editar Categor&iacute;as";
$admin_lang_cats_edit_cat_txt       			= "Editar una categor&iacute;a";
$admin_lang_cats_edit_cat_button    			= "Editar Categor&iacute;a";
$admin_lang_cats_edit_tip           			= "Editar el nombre de las siguientes categor&iacute;as para ambos idiomas.<br />Todas las imagenes perteneciente a la antigua categor&iacute;a seran movidas a la nueva.";
$admin_lang_cats_delete_cat         			= "Borrar Categor&iacute;as";
$admin_lang_cats_delete_cat_txt     			= "Borrar una categor&iacute;a";
$admin_lang_cats_delete_cat2        			= "Borrado";
$admin_lang_cats_delete_cats_button 			= "Borrar Categor&iacute;a";
$admin_lang_cats_deleted            			= "Categor&iacute;a borrada.";
$admin_lang_cats_update             			= "Actualizar Categor&iacute;a";
$admin_lang_cats_update_cat_button  			= "Actualizar Categor&iacute;a";
$admin_lang_cats_updated            			= "Categor&iacute;a actualizada al nuevo nombre.";


// Comments
$admin_lang_cmnt_commentlist        			= "Lista de Comentarios - Borrar o editar &nbsp;||&nbsp;Mostrando";
$admin_lang_cmnt_name               			= "Nombre:";
$admin_lang_cmnt_email              			= "eMail:";
$admin_lang_cmnt_comment            			= "Comentario:";
$admin_lang_cmnt_image              			= "Imagen";
$admin_lang_cmnt_delete             			= "Borrar";
$admin_lang_cmnt_deleted            			= "Borrar un comentario.";
$admin_lang_cmnt_delete1            			= "Borrado";
$admin_lang_cmnt_delete2            			= "comentario(s) seleccionados.";
$admin_lang_cmnt_edit               			= "Editar";
$admin_lang_cmnt_edited             			= "Editar un comentario.";
$admin_lang_cmnt_check_all          			= "Mass Select/Deselect";
$admin_lang_cmnt_invert_checks      			= "Invertir selecci&oacute;n";
$admin_lang_cmnt_del_selected       			= "Borrar seleccionados";
$admin_lang_cmnt_page               			= "comentarios por p&aacute;gina.";
$admin_lang_cmnt_commenter          			= "Comentario hecho:";
$admin_lang_cmnt_ip                 			= "desde IP:";
$admin_lang_cmnt_save               			= "Guardar";
$admin_lang_cmnt_massdelete_text    			= "Selecciona varios comentarios para borrarlos a la vez";
$admin_lang_cmnt_js_del_comm        			= "&iquest;&iquest;Est&aacute;s seguro de querer borrar &eacute;ste comentario?";
$admin_lang_cmnt_publish_sel        			= "Publicar Seleccionados";
$admin_lang_cmnt_unpublish_sel      			= "A&ntilde;adir a la cola de moderaci&oacute;n";
$admin_lang_cmnt_published          			= "Publicado";
$admin_lang_cmnt_unpublished_cmnts  			= "comentario(s) previamente enmascarado(s).";
$admin_lang_cmnt_unpublished        			= "Enmascarado";
$admin_lang_cmnt_published_cmnts    			= "comentario(s) previamente publicado(s).";
$admin_lang_cmnt_error_blacklist    			= "Error al actualizar la lista negra: ";
$admin_lang_cmnt_error_banlist      			= "Error al actualizar la lista de remitentes prohibidos: ";
$admin_lang_cmnt_moderation_que     			= "Cola de Moderaci&oacute;n";
$admin_lang_cmnt_rep_spam           			= 'Reportar Spam';
$admin_lang_cmnt_submenu1									= "COMENTARIOSS";
$admin_lang_cmnt_submenu2									= "ESPERANDO MODERACI&Oacute;N";

// Option
$admin_lang_optn_general            			= "GENERAL";
$admin_lang_optn_template           			= "PLANTILLA";
$admin_lang_optn_thumbnails         			= "MINIATURAS";
$admin_lang_optn_tip                			= "No olvides la barra al final <b>'/'</b> e.g. <i>http://www.pixelpost.org/</i>";

$admin_lang_optn_update             			= "ACTUALIZAR";
$admin_lang_optn_yes                			= "sI";
$admin_lang_optn_no                 			= "No";

$admin_lang_optn_title_url         				= "T&Iacute;TULO Y URL";
$admin_lang_optn_title             				= "T&iacute;tulo:";
$admin_lang_optn_sub_title         				= "Sub T&iacute;tulo:";
$admin_lang_optn_url               				= "URL:";
$admin_lang_optn_usr_pss           				= "USUARIO &amp; CLAVE";
$admin_lang_optn_usr_pss_txt       				= "&iquest;Cambiar nombre de usuario o password?";
$admin_lang_optn_usr               				= "USUARIO:";
$admin_lang_optn_pss               				= "cLAVE:";
$admin_lang_optn_pss_re            				= "Confirmar Clave:";
$admin_lang_optn_email             				= "eMail";
$admin_lang_optn_fillit            				= "Ingresalo. Ser&aacute; necesario para la recuperaci&oacute;n de clave.";
$admin_lang_optn_img_path          				= "RUTA DE IM&Aacute;GENES Y MINIATURAS";
$admin_lang_optn_tz                				= "ZONA HORARIA";
$admin_lang_optn_tz_txt            				= "Selecciona la zona horaria de tu localidad.";
$admin_lang_optn_sendemail         				= "NOTIFICAR COMENTARIOS POR eMAIL";
$admin_lang_optn_sendemail_txt    				= "&iquest;Enviar un eMail cuando se env&iacute;en nuevos comentarios?";
$admin_lang_optn_sendemail_html_txt 			= "&iquest;Usar HTML en los emails?";
$admin_lang_optn_comment_setting 				= "AJUSTES GENERALES DE COMENTARIOS";
$admin_lang_optn_comment_setting2				= "Configuraci&oacute;n de comentarios";
$admin_lang_optn_cmnt_mod_txt       			= "Acci&oacute;n por defecto para comentarios:";
$admin_lang_optn_cmnt_mod_txt2      			= "Acci&oacute;n para comentarios:";
$admin_lang_optn_cmnt_mod_allowed				= "Publicar inmediatamente";
$admin_lang_optn_cmnt_mod_moderation			= "A la cola de moderaci&oacute;n";
$admin_lang_optn_cmnt_mod_forbidden				= "Deshabilitar comentarios";

$admin_lang_optn_switch_template    			= "CAMBIAR PLANTILLA";
$admin_lang_optn_lang_file           			= "ARCHIVO DE LENGUAJE";
$admin_lang_optn_lang_file_admin          = "ARCHIVO DE LENGUAJE DEL PANEL DE CONTROL";
$admin_lang_optn_dateformat          			= "FORMATO DE FECHA";
$admin_lang_optn_dateformat_txt      			= "El formato de fecha para mostrar en las im&aacute;genes y comentarios. La sintaxis utilizada es id&eacute;ntica que para la funci&oacute;n <a href='http://www.php.net/date' target='_blank'>date()</a> en PHP. &Eacute;stos son algunos ejemplos: Y:a&ntilde;o m:mes d:d&iacute;a H:hora i:minuto s:segundo";
$admin_lang_optn_gmt                 			= "El horario de verano debe ser cambiado de forma manual.<br />Consulta <a href='http://www.worldtimeserver.com/current_time_in_UTC.aspx' target='__blank'> hora actual UTC </a> si no conoces tu zona horaria.<br />";
$admin_lang_optn_cat_link_format     			= "FORMATO PARA ENLACES A CATEGOR&Iacute;AS";
$admin_lang_optn_catlinkformat_select 			= "Selecciona un formato para los enlaces a categor&iacute;as";
$admin_lang_optn_cat_link_format_txt  			= "El formato en que se muestran los enlaces a categor&iacute;as en la plantilla.";
$admin_lang_optn_catlinkformat_custom 			= "Formato personalizado de categor&iacute;s";
$admin_lang_optn_catlinkformat_custom_start		= "Cadena inicial:";
$admin_lang_optn_catlinkformat_custom_end 		= "Cadena final:";
$admin_lang_optn_calendar_type       			= "CALENDARIO TIPO";
$admin_lang_optn_thumb_row           			= "FILA DE MINIATURAS";
$admin_lang_optn_thumb_row_txt       			= "Cuantas miniaturas se mostrar&aacute;n en la fila.<br/>Introduce un n&uacute;mero impar para un mejor resultado, por ejemplo 7 o 9, no 6 u 8.";
$admin_lang_optn_crop_thumbs         			= "&iquest;RECORTAR MINIATURAS?";
$admin_lang_optn_crop_thumbs_txt     			= "Si deseas recortar las miniaturas a un tama&ntilde;o espec&iacute;fico: selecciona <b>SI.</b><br/>\n
                                        Si quieres mantener la proporci&oacute;n original, selecciona <b>NO.</b><br/>\n
                                        Si quieres recortar manualmente las miniaturas tras subir la imagen, selecciona <b>12CropImage.</b>";
$admin_lang_optn_thumb_size          			= "TAMA&Ntilde;O DE MINIATURAS";
$admin_lang_optn_thumb_size_txt      			= "Define el tama&ntilde;o de las miniaturas, Anchura x Altura.";
$admin_lang_optn_thumb_size_new      			= "ajustar al nuevo tama&ntilde;o";
$admin_lang_optn_reg_thumbs_button   			= "Regenerar miniaturas";
$admin_lang_optn_regen_thumbs_txt    			= "&Eacute;sto generar&aacute; nuevas miniaturas a partir de todas las im&aacute;genes enviadas. Perder&aacute;s todas las miniaturas que hayas recortado manualmente y se generaran otras nuevas por defecto. Podras modificar las miniaturas m&aacute;s tarde al editar cada imagen con 12CropImage.";
$admin_lang_optn_img_compression     			= "COMPRESI&Oacute;N PARA MINIATURAS";
$admin_lang_optn_img_compression_txt 			= "Selecciona el grado de compresi&oacute;n JPG. 10 es baja calidad y 100 es calidad m&aacute;xima (sin p&eacute;rdida)";
$admin_lang_optn_thumb_sharp              = "SUAVIZADO DE MINIATURA";
$admin_lang_optn_thumb_sharp_txt          = "&iquest;Cuanto de suave deseas los bordes de miniaturas?";
$admin_lang_optn_thumb_sharp0             = 'Sin suavizado';
$admin_lang_optn_thumb_sharp1             = 'Poco';
$admin_lang_optn_thumb_sharp2             = 'Medio';
$admin_lang_optn_thumb_sharp3             = 'Alto';
$admin_lang_optn_thumb_sharp4             = 'Muy alto';
$admin_lang_optn_pass_chngd_txt      			= "Se cambi&oacute; la clave.";
$admin_lang_optn_pass_notchngd_txt   			= "No se cambi&oacute; la clave.Escriva la misma clave en el campo de confirmaci&oacute;n.";
$admin_lang_optn_title_url_text      			= "Revisa o modifica el nombre del sitio, sub-t&iacute;tulo, y URL";
$admin_lang_optn_thumb_updated       			= "&iexcl;Miniaturas actualizadas!";
$admin_lang_optn_updated             			= "miniaturas actulizadas.";
$admin_lang_optn_visitorbooking_title 			= 'LIBRO DE VISITAS';
$admin_lang_optn_visitorbooking_desc  			= '&iquest;PixelPost debe recordar cada visitante?';
$admin_lang_optn_upd_done             			= "Actualizado.";
$admin_lang_optn_upd_error            			= "Error de actualizaci&oacute;n.";
$admin_lang_optn_upd_lang_error		  			= "El idioma alternativo seleccionado es el mismo que el idioma por defecto.<br />Escoge un idioma alternativo diferente o deshabilita la opci&oacute;n de idioma alternativo.";
$admin_lang_optn_markdown             			= "HABILITAR MARKDOWN";
$admin_lang_optn_markdown_desc        			= "&iquest;Habilitar la funci&oacute;n Markdown en la descripci&oacute;n de la imagen?";
$admin_lang_optn_exif			        		= "HABILITAR EXIF";
$admin_lang_optn_exif_desc		        		= "&iquest;Habilitar datos EXIF en la p&aacute;gina principal?";
$admin_lang_optn_token			        		= "HABILITAR FICHAS EN FORMULARIOS";
$admin_lang_optn_token_desc		        		= "Utilizar fichas reducir&aacute; la probabilidad de ataques de tipo<a href=\"http://en.wikipedia.org/wiki/Cross-site_request_forgery\">Cross-Site Request Forgerie</a>.<br/><br/>\n
																				 Si el par&aacute;metro est&aacute; activdo, s&oacute;lo se guardar&aacute;n comentarios cuando el el token del formulario corresponda al usuario que ha iniciado sesi&oacute;n. Pra implementar &eacute;sto debes a&ntilde;adir <strong>&lt;TOKEN&gt;</strong> a la plantilla de comentarios entre las etiquetas <strong><i>&lt;form&gt;...&lt;/form&gt;</i></strong>.
																				 Si olvidas a&ntilde;adir la etiqueta <strong>&lt;TOKEN&gt;</strong>, los comentarios dejar&aacute;n de funcionar y se mostrar&aacute; un error al usuario.<br /><br/>\n
																				 &iquest;Habilitar &eacute;sta funci&oacute;n?";
$admin_lang_optn_token_time						= "Tiempo m&aacute;ximo entre la apertura de la ventana de comentarios y confirmar un comentario: ";
$admin_lang_optn_token_error					= "Atenci&oacute;n: los valores inferiores a 1 minuto para la Ficha no seon v&aacute;lidos. Se asigno 1 min&uacute;to com valor de la Ficha .";
$admin_lang_optn_dsbl_list 						= "AJUSTES PARA DSBL (http://www.dsbl.org)";
$admin_lang_optn_dsbl_list_desc 				= "La lista <a href=\"http://www.dsbl.org\" target=\"_blank\">DSBL</a> contiene direcciones IP de servidores con reles abiertos, proxys abiertos o tienen otras vulnerabilidades. &Eacute;stos servidores son utilizados habitualmente por SPAMMERS para enviar e-mails, pero tambi&eacute;n para enviar comentarios.<br /> <br />
																				 &iquest;Comparar IP's de comentarios en DSBL?";
$admin_lang_optn_time_between_comments 			= "PREVENCI&Oacute;N ANTISPAM";
$admin_lang_optn_time_between_comments_desc 	= "Segundos antes de aceptar un nuevo comentario (para evitar env&iacute;os masivos): ";
$admin_lang_optn_max_uri_comment				= "N&Uacute;MERO M&Aacute;XIMO DE URI's";
$admin_lang_optn_max_uri_comment_desc 			= "N&uacute;mero de enlaces permitidos por comentario: ";

$admin_lang_optn_rss_setting					= "OPCIONES DE SUSCRIPCI&Oacute;N RSS/ATOM";
$admin_lang_optn_rss_title  					= "T&iacute;tulo del alimentador";
$admin_lang_optn_rss_desc   					= "Descripci&oacute;n del alimentador";
$admin_lang_optn_rss_copyright					= "Derechos del alimentador";
$admin_lang_optn_rss_discovery					= "Busqueda de alimentadores";
$admin_lang_optn_rss_opt_both					= "RSS &amp; ATOM";
$admin_lang_optn_rss_opt_rss					= "RSS";
$admin_lang_optn_rss_opt_atom					= "ATOM";
$admin_lang_optn_rss_opt_ext					= "Externo";
$admin_lang_optn_rss_opt_none					= "Ninguno";
$admin_lang_optn_rss_ext_type					= "Tipo de alimentador externo";
$admin_lang_optn_rss_ext						= "Alimentador externo";
$admin_lang_optn_rss_enable_comment_feed		= "Activar alimentaci&oacute;n de comentarios";
$admin_lang_optn_rsstype_desc					= "Seleccionar estilo de alimentadores RSS/ATOM:";
$admin_lang_optn_rss_full						= "Mostrar imagenes completas";
$admin_lang_optn_rss_thumbs						= "Mostrar miniaturas";
$admin_lang_optn_rss_thumbs_only				= "Mostrar solo miniaturas";
$admin_lang_optn_rss_full_only					= "Mostrar solo imagenes";
$admin_lang_optn_rss_text						= "Mostrar solo texto";
$admin_lang_optn_feeditems_desc					= "N&uacute;mero de elementos en lista de alimentadores: ";
$admin_lang_optn_lang                  = "Opciones de idioma principal: ";
$admin_lang_optn_alt_lang             			= "Opciones de idioma alternativo: ";
$admin_lang_optn_alt_lang_dis         			= "desactivado";
$admin_lang_optn_alt_lang_no          			= "desactivado";
$admin_lang_optn_img_display						="ORDEN PARA MOSTRAR LAS IMAGENES";
$admin_lang_optn_img_display_desc				="Seleccione como se mostraran las imagenes. Ordenadas en: ";
$admin_lang_optn_img_display_default		="orden descendente";
$admin_lang_optn_img_display_reversed		="orden descendente";

// Info
$admin_lang_info_gd                  			= "No esta instalado, consulta con tu administrador de host.";
$admin_lang_info_gd_jpg              			= "con soporte JPG";
$admin_lang_pp_version1              			= "&Uacute;ltima versi&oacute;n PixelPost:";
$admin_lang_pp_forum                 			= "Si necesitas ayuda o deseas comentar algo, visita el foro Pixelpost.";
$admin_lang_pp_min_php               			= "Requerimientos minimos de PixelPost: PHP versi&oacute;n";
$admin_lang_pp_min_mysql             			= "Requerimientos minimos de PixelPost: MySQL";
$admin_lang_pp_exif1                 			= "<b>EXIF</b> Pixelpost usa";
$admin_lang_pp_exif2                 			= "para informaci&oacute;n EXIF";
$admin_lang_pp_path                  			= "Rutas";
$admin_lang_pp_imagepath             			= "Ruta encontrada de imagenes:";
$admin_lang_pp_imagepath_conf        			= "Ruta configurada de imagenes:";
$admin_lang_pp_img_chmod1            			= "&iexcl;Carpeta Images protegida contra escritura!";
$admin_lang_pp_img_chmod2            			= "Debes asignar los permisos correctos en esta carpeta o no podras subir imagenes.";
$admin_lang_pp_img_chmod3            			= "<br /> Asignar a la carpeta <b>chmod 777</b> (permisos para leer, escribir y ejecutar execute para propietario, el grupo y el mundo).";
$admin_lang_pp_img_chmod4            			= "&iquest;Podemos escribir en el directorio? SI.";
$admin_lang_pp_img_chmod5            			= "&iexcl;Carpeta Thumbnails protegida contra escritura!";
$admin_lang_pp_imgfolder             			= "Image Directory:";
$admin_lang_pp_thumbfolder           			= "Thumbnails Directory:";
$admin_lang_pp_langfolder            			= "Language Directory:";
$admin_lang_pp_addfolder             			= "Addons Directory:";
$admin_lang_pp_incfolder             			= "Includes Directory:";
$admin_lang_pp_tempfolder            			= "Templates Directory:";
$admin_lang_pp_folder_missing        			= "No existe (Deber&iacute;a ser";
$admin_lang_pp_ref_log_title         			= "Remitentes de los &uacute;ltimos siete d&iacute;as";
$admin_lang_hostinfo                 			= "Informaci&oacute;n del Host";
$admin_lang_fileuploads              			= "Los <b>archivos subidos</b> al sitio PixelPost son";
$admin_lang_serversoft               			= "Software del Servidor";
$admin_lang_pixelpostinfo            			= "Informaci&oacute;n de PixelPost";
$admin_lang_pp_currversion           			= "Se est&aacute; ejecutando PixelPost versi&oacute;n: ";
$admin_lang_pp_check                 			= "Revisar";
$admin_lang_pp_sess_path             			= "Ruta para guardar la sesi&oacute;n";
$admin_lang_pp_sess_path_emp         			= "est&aacute; vac&iacute;o";
$admin_lang_pp_fileupload_np         			= 'Imposible! &iexcl;Revisa la variable file_upload en el archivo php.ini!';
$admin_lang_pp_fileupload_p          			= 'posible.';
$admin_lang_pp_langs                 			= 'Idiomas de Pixelpost';
$admin_lang_pp_lng_fname             			= 'Archivo';
$admin_lang_pp_lng_author            			= 'Autor';
$admin_lang_pp_lng_ver               			= 'Versi&oacute;n';
$admin_lang_pp_lng_email             			= 'eMail';
$admin_lang_pp_newest_ver            			= 'Tienes la &uacute;ltima versi&oacute;n de PixelPost!';
$admin_lang_pp_thumbnailpath 				 = "Ruta de miniaturas encontrada";
$admin_lang_pp_thumbnailpath_conf 	 = "Ruta de miniaturas asignada"; 

// AddOns
$admin_lang_addon_title              			= "Opciones instaladas";
$admin_lang_failed_addonstatus       			= "Error al actualizar el estado de opciones: ";
$admin_lang_addon_off                			= "Pincha para desactivar";
$admin_lang_addon_on                 			= "Pincha para activar";

// Error Messages
$admin_lang_pp_up_error_0            			= "Subido sin error.";
$admin_lang_pp_up_error_1            			= "Sobrepasado el tama&ntilde;o maximo de archivo para el servidor.";
$admin_lang_pp_up_error_2            			= "Sobrepasado el tama&ntilde;o maximo de archivo.";
$admin_lang_pp_up_error_3            			= "El archivo no se subio completamente.";
$admin_lang_pp_up_error_4            			= "No se subi&oacute; ning&uacute;n archivo.";
$admin_lang_pp_up_error_6            			= "No existe la carpeta temporal.";
$admin_lang_pp_up_error_7            			= "Error al escribir al disco.";
$admin_lang_pp_addon_error								= "PixelPost no puede leer el archivo de opci&oacute;nes. Revise configuraci&oacute;n chmod y cambie por 755";


// options >> time stamps
$admin_lang_optn_timestamps_title  				= "MARCA DE FECHA/HORA";
$admin_lang_optn_timestamps_desc   				= "Agregar 'time stamps' a los nombres de archivo evita que se sobreescriban im&aacute;genes con el mismo nombre. <br/>
                                     			&iquest;Usar TimeStamps? ";

// options >> fight spam
$admin_lang_spam            					= "CONTROL DE SPAM";
$admin_lang_spam_change     					= "Todos los prohibidos";
$admin_lang_spam_err_1      					= "Error al crear una tabla de prohibidos: ";
$admin_lang_spam_tableadd   					= "Se agrego tabla de prohibidos para combatir spam desde el nucleo";
$admin_lang_spam_err_2      					= "Error al actualizar la lista de moderaci&oacute;n: ";
$admin_lang_spam_err_3      					= "Error al actualizar la lista negra: ";
$admin_lang_spam_err_4      					= "Error al actualizar la lista de remitentes prohibidos: ";
$admin_lang_spam_err_5      					= "Error al actualizar el numero permitido de enlaces por comentario : ";
$admin_lang_spam_upd        					= "Actualizados con exito todas las listas de baneo";
$admin_lang_spam_err_6      					= "Error al actualizar el comentario cuando se compar&oacute; con la lista de moderaci&oacute;n: ";
$admin_lang_spam_com_upd    					= "Pasado: comentarios se comparan con la lista de moderaci&oacute;n ";
$admin_lang_spam_err_7      					= "Error al borrar los comentarios cuando se comparan con la lista de moderaci&oacute;n: ";
$admin_lang_spam_com_del    					= "Pasado: comentarios con palabras/IPs en la lista negra se borran.";
$admin_lang_spam_err_8      					= "Error al borrar visitas cuando se comparan con la lista de remitentes prohibidos: ";
$admin_lang_spam_visit_del  					= "Visitas con palabras/IPs en la lista de remitentes prohibidos se borran.";

// Spam
$admin_lang_spam_ban        					= "Actualizar lista de prohibidos";
$admin_lang_spam_content    					= "Agregue listas de palabras prohibidas/IPs/nombres a continuaci&oacute;n, una palabra por linea.<br/>\n
                               					Comentarios con palabras/IPs/nombres que est&aacute;n en le lista de moderaci&oacute;n ser&aacute;n enviadas a la cloa de moderaci&oacute;n.<br/>\n
                               					Comentarios con palabras/IPs/nombres que est&aacute;n en la lista negra seran borrados.<br/>
                               					Visitas con IPs en <b>Lista de remitentes prohibidos</b> o con direcciones que contienen palabras en esta lista\n
                               					se les negara el acceso al fotoblog. (&iexcl;Se debe agregar el codigo entregado a .htaccess para que funcione!)";
$admin_lang_spam_modlist    					= "Lista de Moderaci&oacute;n";
$admin_lang_spam_blacklist  					= "Lista Negra";
$admin_lang_spam_reflist    					= "Lista de Remitentes Prohibidos";
$admin_lang_spam_blacklist_text 				= "Copiar el codigo abajo (CTRL+A y CTRL+C en Windows) y pegar en el archivo .htaccess de tu sitio web.";
$admin_lang_spam_htaccess_text 					= "Obtener codigo .htaccess";
$admin_lang_spam_check_comm  					= "Revisar comentarios anteriores";
$admin_lang_spam_del_bad_comm 					= "Borrar comentarios malos";
$admin_lang_spam_del_bad_ref 					= "Borrar remitentes malos";
$admin_lang_spam_updateblacklist 				= "Actualizar lista de prohibidos";

// Alternative language (PLEASE DO NOT TRANSLATE THESE!!!)
$admin_lang_dutch								="Nederlands";
$admin_lang_english								="English";
$admin_lang_french								="Fran&ccedil;ais";
$admin_lang_german								="Deutsch";
$admin_lang_italian								="Italiano";
$admin_lang_norwegian							="Norsk";
$admin_lang_persian								="Farsi";
$admin_lang_polish								="Polski";
$admin_lang_portuguese							="Portugu&egrave;s";
$admin_lang_simplified_chinese					="Chinese";
$admin_lang_spanish								="Espa&ntilde;ol";
$admin_lang_swedish								="Swedish";
$admin_lang_japanese							="Japanese";
$admin_lang_danish								="Dansk";
$admin_lang_romanian 							="Romana";
$admin_lang_hungarian							="Magyar";


// End of Admin-Language-File
?>