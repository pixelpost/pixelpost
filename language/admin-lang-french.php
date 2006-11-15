<?php
/*

admin-lang-fench.php : french language file for Pixelpost-Admin-Section
===================================================================================
Pixelpost version 1.5

SVN file version:
$Id$

Language file: french (F)
Author:  Philippe Durand
Contact: phdurand@yahoo.com
WWW: http://www.photofloue.net

Pixelpost www:  	http://www.pixelpost.org/
Pixelpost wiki: 	http://wiki.pixelpost.org/ 
Pixelpost forum: 	http://forum.pixelpost.org

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, GeoS
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Copyright 2006 Pixelpost.org <http://www.pixelpost.org>

Attention : conserver les fichiers admin-lang-english et lang-english dans le dossier language
______________________________________________________________________________

VARIABLES POUR L'INTERFACE D'ADMINISTRATION EN FRANCAIS :

Ne pas changer                ||      Changer                                   */

$admin_lang_isrtl             = "no"; // 'yes' pour les langues lues de droite a gauche, et 'no' pour les langues lues de gauche a droite.
$admin_lang_update            = "Actualiser";
$admin_lang_reload            = "<br /> Rechargez la page pour voir les modifications.";
$admin_lang_error             = "Erreur";
$admin_lang_post              = "publications";
$admin_lang_page              = "page";
$admin_lang_of                = "de";
$admin_lang_next              = "Suivante";
$admin_lang_prev              = "Pr&eacute;cedente";
$admin_lang_show              = "Voir";
$admin_lang_go                = "Envoyer";
$admin_lang_done              = "Fait :";


// Admin Start
$admin_start_1                = "Pas de dossier <b>language</b> trouv&eacute; ou le fichier";
$admin_start_2                = "est manquant dans ce dossier.<br />V&eacute;rifiez que vous avez transf&eacute;r&eacute; tous les fichiers en respectant leur nom d'origine.";
$admin_start_userpw           = "Nom ou mot de passe inconnu.";
$admin_start_pw_forgot        = "Mot de passe oubli&eacute; ?";
$admin_start_browser_title    = " | console d'administration";
$admin_start_welcome          = "Bienvenue sur la console d'administration de Pixelpost - Vous devez vous connecter.";
$admin_start_pp_name          = "Lien vers votre site Pixelpost :";
$admin_start_pp_tit           = "cliquez ici pour afficher votre photoblog";
$admin_start_cookie           = "Un cookie est envoy&eacute; &agrave; la connexion";
$admin_start_username         = "Nom";
$admin_start_pw               = "Mot de passe";
$admin_start_pw_button        = "Envoyez-moi mon nouveau mot de passe";
$admin_start_pw_recover       = "Il n'est pas possible de retrouver votre ancien mot de passe, mais Pixelpost peut
                                 vous cr&eacute;er un nouveau mot de passe.\n<br />
                                 Merci d'entrer l'adresse email que vous avez choisie pour la console d'administration
                                 <br />et le nouveau mot de passe vous sera envoy&eacute; imm&eacute;diatement.";
$admin_start_email            = "Adresse email :";
$admin_start_email_button     = "Entrez votre adresse email";
$admin_start_admin_1          = "Console d'administration";
$admin_start_admin_2          = "de";
$admin_start_remember         =	"Connectez-moi automatiquement &agrave; chaque visite :";

// Password Recovery

$admin_lang_pw_title          = "R&eacute;cup&eacute;ration de votre mot de passe Pixelpost";
$admin_lang_pw_wronguser      = "Le nom d'utilisateur que vous avez entr&eacute; n'est pas celui de l'administrateur de Pixelpost.";
$admin_lang_pw_back           =  "Retour &agrave; la page d'administration";
$admin_lang_pw_noemail        = "Vous n'avez pas entr&eacute; d'adresse email ! \n<br />
                                 Si vous n'avez aucune id&eacute;e de votre mot de passe, laissez un message dans le  <a href='http://forum.pixelpost.org/'>forum Pixelpost</a> 
                                 pour obtenir de l'aide.\n<br />";
$admin_lang_pw_notsent        = "Rien envoy&eacute; ! \n<br /> L'adresse email indiqu&eacute;e n'est pas celle de l'administrateur.<br />";
$admin_lang_pw_subject        = "Message de r&eacute;cup&eacute;ration de votre mot de passe Pixelpost";
$admin_lang_pw_usertext       = "Votre nom :"; 
$admin_lang_pw_mailtext       = "Votre adresse email :";
$admin_lang_pw_newpw          = "Votre nouveau mot de passe :";
$admin_lang_pw_text_1         = "R&eacute;cup&eacute;ration de votre mot de passe Pixelpost";
$admin_lang_pw_text_2         = "De : Administration de Pixelpost";
$admin_lang_pw_text_3         = "Un email est envoy&eacute; &agrave; votre adresse, avec votre nom d'utilisateur et un nouveau mot de passe. \n<br /> 
                                 V&eacute;rifiez votre boite aux lettres : ";
$admin_lang_pw_text_4         = "<span style='color:red;'>Erreur! Il y a eu un probl&egrave;me ! \n<br />
                                L'adresse email et le nom d'utilisateur sont les bons, mais il n'est pas possible d'envoyer un mail. \n<br />
                                Renseignez-vous aupr&egrave;s de votre administrateur ou h&eacute;bergeur.</span>";
$admin_lang_pw_text_5        = "Erreur dans la base de donn&eacute;es :";
$admin_lang_pw_text_6        = "<br />La mise &agrave; jour du mot de passe a &eacute;chou&eacute;.";
$admin_lang_pw_text_7         = "Cet email a &eacute;t&eacute; envoy&eacute; automatiquement apr&egrave;s une tentative de connexion &agrave; la console d'administration de votre photoblog.\nQuelqu'un a demand&eacute; un nouveau mot de passe pour y acceder.\n\nVous devriez vous connecter &agrave; votre photoblog \n\n &agrave; l'adresse ";
$admin_lang_pw_text_8         = "\n\net entrer ce nouveau mot de passe pour le remettre &agrave; jour.";

// Admin Menu
$admin_lang_new_image         = "NOUVELLE IMAGE";
$admin_lang_images            = "IMAGES";
$admin_lang_categories        = "MOTS-CLES";
$admin_lang_comments          = "COMMENTAIRES";
$admin_lang_options           = "OPTIONS";
$admin_lang_general_info      = "INFORMATIONS";
$admin_lang_addons            = "ADDONS";
$admin_lang_logout            = "DECONNEXION";

// New Image
$admin_lang_ni_post_a_new_image     = "Publier une nouvelle image";
$admin_lang_ni_image                = "Image";
$admin_lang_ni_image_title          = "Titre de l'image";
$admin_lang_ni_select_cat           = "S&eacute;lectionnez les mots-cl&eacute;s";
$admin_lang_ni_description          = "L&eacute;gende de l'image";
$admin_lang_ni_datetime             = "Date et heure de la publication";
$admin_lang_ni_post_now             = "Publier maintenant";
$admin_lang_ni_post_one_day_after   = "Publier 24 heures apr&egrave;s la pr&eacute;c&eacute;dente";
$admin_lang_ni_post_spec_date       = "Publier &agrave; une date pr&eacute;cise, indiqu&eacute;e ci-dessous:";
$admin_lang_ni_post_entry           = "Publier";
$admin_lang_ni_upload               = "T&eacute;l&eacute;charger";
$admin_lang_ni_upload_error         = "Il y a un probl&egrave;me avec le t&eacute;l&eacute;chargement !";
$admin_lang_ni_posted               = "Publi&eacute;";
$admin_lang_ni_year                 = "ann&eacute;e";
$admin_lang_ni_month                = "mois";
$admin_lang_ni_day                  = "jour";
$admin_lang_ni_hour                 = "heure";
$admin_lang_ni_min                  = "minute";
$admin_lang_ni_markdown_text        = "Utilisez les codes Markdown ou HTML pour formater le texte.";
$admin_lang_ni_markdown_hp          = "Guide de Markdown";
$admin_lang_ni_markdown_element     = "Notions de base";
$admin_lang_ni_markdown_syntax      = "R&eacute;f&eacute;rence de la syntaxe";
$admin_lang_ni_missing_data         = "Il manque quelque chose !<br />\n
                                      Au minimum, il faut une image et son titre.\n
                                      Rien n'a &eacute;t&eacute; envoy&eacute;\n
                                      &agrave; cause des informations incompl&egrave;tes !";
$admin_lang_ni_crop_nextstep        = "S&eacute;lectionnez la fen&ecirc;tre de la vignette :";
$admin_lang_ni_crop_background      = "Ceci est l'arri&egrave;re-plan de l'image recadr&eacute;e";
$admin_lang_ni_db_error             = "il y a eu une erreur d'&eacute;criture dans la base de donn&eacute;es";
$admin_lang_ni_post_exif_date       = "Utiliser la date exif de l'appareil photo";
$admin_lang_ni_tags               = "Tags";
$admin_lang_ni_alt_language				= "Provide an image title and description in the secondary language";

// Images
$admin_lang_imgedit_edit            = "Modifier";
$admin_lang_imgedit_title           = "Titre :";
$admin_lang_imgedit_file_name       = "Nom du fichier :";
$admin_lang_imgedit_dimensions      = "Dimensions :";
$admin_lang_imgedit_tbpublished     = "A publier :";
$admin_lang_imgedit_category_plural = "Mots-cl&eacute;s :";
$admin_lang_imgedit_delete          = "Supprimer";
$admin_lang_imgedit_deleted         = "Supprimer la page / Supprimer l'image / Supprimer la vignette";
$admin_lang_imgedit_deleted1        = "Page supprim&eacute;e.";
$admin_lang_imgedit_deleted2        = "Image supprim&eacute;e.";
$admin_lang_imgedit_delete_error    = "Impossible de supprimer le fichier de l'image.\n
                                       Il faut proc&eacute;der autrement, par exemple avec un logiciel ftp.";
$admin_lang_imgedit_deleted3        = "Vignette supprim&eacute;e.";
$admin_lang_imgedit_delete_error2   = "Impossible de supprimer la vignette.\n
                                       Il faut proc&eacute;der autrement, par exemple avec un logiciel ftp.";
$admin_lang_imgedit_reupimg         = "Remplacer l'image :";
$admin_lang_imgedit_file            = "Fichier : ";
$admin_lang_imgedit_file_isuploaded = "est recharg&eacute;e !";
$admin_lang_imgedit_update          = "Mise &agrave; jour de l'image";
$admin_lang_imgedit_updated         = "Image mise &agrave; jour";
$admin_lang_imgedit_txt_desc        = "L&eacute;gende :";
$admin_lang_imgedit_dtime           = "Date :";
$admin_lang_imgedit_img             = "Image :";
$admin_lang_imgedit_fsize           = "Taille du fichier :";
$admin_lang_imgedit_12cropimg       = "Outil de recadrage :";
$admin_lang_imgedit_12cropimg_txt   = "Pour recadrer la vignette, tracez un cadre avec la souris ou utilisez les boutons '+'/'-' :";
$admin_lang_imgedit_uthmb_button    = "Mise &agrave; jour de la vignette";
$admin_lang_imgedit_u_post_button   = "Mise &agrave; jour de la page";
$admin_lang_imgedit_title1          = "Modifier, remplacer ou supprimer une image\n<br /> ";
$admin_lang_imgedit_title2          = " images au total dans la base de donn&eacute;es\n<br /> ";
$admin_lang_imgedit_title3          = " images affich&eacute;es. Page ";
$admin_lang_imgedit_title4          = " sur ";
$admin_lang_imgedit_12crop_opt      = "<strong>Note :</strong><br />l'option 12CropImage n'est pas s&eacute;lectionn&eacute;e pour recadrer les vignettes.<br /> On ne peut donc pas les modifier.<br /> Pour l'activer aller dans le menu OPTIONS > VIGNETTES.";
$admin_lang_imgedit_edit_post       = "MODIFIER LA PAGE";
$admin_lang_imgedit_img_page        = "images par page";
$admin_lang_imgedit_cropbg          = "Ceci est le texte d'arri&egrave;re-plan de 12Cropimage";
$admin_lang_imgedit_js_del_im       = "Etes-vous certain de vouloir supprimer cette image ?";
$admin_lang_imgedit_db_error        = "<br />V&eacute;rifiez si le permalien n'est pas d&eacute;j&agrave; utilis&eacute; !";
$admin_lang_imgedit_preview         = "Pr&eacute;visualisation";
$admin_lang_imgedit_tags            = $admin_lang_ni_tags;
$admin_lang_imgedit_alt_language  	= "Change the secondary language image title and description";

// Mass-Edit Categories
$admin_lang_imgedit_mass_1           = "Modifier en masse les mots-cl&eacute;s";
$admin_lang_imgedit_mass_2           = "Attribuer";
$admin_lang_imgedit_mass_3           = "Retirer";
$admin_lang_imgedit_mass_4           = "Modifier en masse";


// Categories
$admin_lang_cats_add_cat             = "Ajouter un mot-cl&eacute;";
$admin_lang_cats_added               = "Mot-cl&eacute; ajout&eacute;.";
$admin_lang_cats_add_cat_txt         = "Ajouter un mot-cl&eacute; pour l'attribuer &agrave; des images.";
$admin_lang_cats_edit_cat            = "Modifier un mot-cl&eacute;";
$admin_lang_cats_edit_cat_txt        = "Modifier le mot-cl&eacute;";
$admin_lang_cats_edit_cat_button     = "Modifier";
$admin_lang_cats_edit_tip            = "Entrez le nouveau mot-cl&eacute;.<br />Toutes les images attribu&eacute;es &agrave; ce mot-cl&eacute; le seront au nouveau.";
$admin_lang_cats_delete_cat          = "Supprimer un mot-cl&eacute;";
$admin_lang_cats_delete_cat_txt      = "Supprimer le mot-cl&eacute;";
$admin_lang_cats_delete_cat2         = "Suppression";
$admin_lang_cats_delete_cats_button  = "Supprimer";
$admin_lang_cats_deleted             = "Mot-cl&eacute; supprim&eacute;.";
$admin_lang_cats_update              = "Mettre &agrave; jour le mot-cl&eacute;";
$admin_lang_cats_update_cat_button   = "Mettre &agrave; jour";
$admin_lang_cats_updated             = "Mot-cl&eacute; mis &agrave; jour.";

// Comments
$admin_lang_cmnt_commentlist         = "Liste des commentaires - supprimer ou modifier &agrave; volont&eacute;&nbsp;\n<br /> Affich&eacute;s :";
$admin_lang_cmnt_name                = "Nom :";
$admin_lang_cmnt_email               = "Email :";
$admin_lang_cmnt_comment             = "Commentaire :";
$admin_lang_cmnt_image               = "Image";
$admin_lang_cmnt_delete              = "Supprimer";
$admin_lang_cmnt_deleted             = "Supprim&eacute; un commentaire.";
$admin_lang_cmnt_delete1             = "Supprim&eacute;";
$admin_lang_cmnt_delete2             = "commentaire(s) s&eacute;lectionn&eacute;(s).";
$admin_lang_cmnt_edit                = "Modifier";
$admin_lang_cmnt_edited              = "Commentaire modifi&eacute;.";
$admin_lang_cmnt_check_all           = "Tout s&eacute;lectionner";
$admin_lang_cmnt_clear_all           = "Abandonner la s&eacute;lection";
$admin_lang_cmnt_invert_checks       = "Intervertir la s&eacute;lection";
$admin_lang_cmnt_del_selected        = "Supprimer la s&eacute;lection";
$admin_lang_cmnt_page                = "commentaires par page.";
$admin_lang_cmnt_commenter           = "Date du commentaire :";
$admin_lang_cmnt_ip                  = "Depuis l'adresse IP :";
$admin_lang_cmnt_save                = "Enregistrer";
$admin_lang_cmnt_massdelete_text     = "Cochez tous les commentaires que vous voulez supprimer.";
$admin_lang_cmnt_js_del_comm         = "Etes-vous certain de vouloir supprimer ce commentaire ?";
$admin_lang_cmnt_publish_sel         = "Publier la s&eacute;lection";
$admin_lang_cmnt_unpublish_sel       = "Ajouter &agrave; la liste de moderation";
$admin_lang_cmnt_published           = "Publi&eacute; :";
$admin_lang_cmnt_unpublished_cmnts   = "commentaire(s) masqu&eacute;(s) pr&eacute;c&eacute;demment.";
$admin_lang_cmnt_unpublished         = "Masqu&eacute;(s) :";
$admin_lang_cmnt_published_cmnts     = "commentaire(s) publi&eacute;(s) pr&eacute;c&eacute;demment.";
$admin_lang_cmnt_error_blacklist     = "Erreur dans la mise &agrave; jour de la liste noire : ";
$admin_lang_cmnt_error_banlist       = "Erreur dans la mise &agrave; jour de la liste des referers interdits :  ";
$admin_lang_cmnt_rep_spam            = "Marquer comme Spam";

// Option
$admin_lang_optn_general              = "GENERAL";
$admin_lang_optn_template             = "MODELE";
$admin_lang_optn_thumbnails           = "VIGNETTES";
$admin_lang_optn_tip                  = "N'oubliez pas la barre de fin <b>'/'</b> par ex. <i>http://www.pixelpost.org/</i>";
$admin_lang_optn_update               = "Mise &agrave; jour";
$admin_lang_optn_yes                  = "Oui";
$admin_lang_optn_no                   = "Non";
$admin_lang_optn_title_url            = "Nom du site et adresse URL";
$admin_lang_optn_title                = "Titre :";
$admin_lang_optn_url                  = "URL :";
$admin_lang_optn_usr_pss              = "Nom de l'administrateur &amp; mot de passe";
$admin_lang_optn_usr_pss_txt          = "Changer de nom ou de mot de passe ?";
$admin_lang_optn_usr                  = "Utilisateur :";
$admin_lang_optn_pss                  = "Mot de passe :";
$admin_lang_optn_pss_re               = "Confirmer le mot de passe :";
$admin_lang_optn_email                = "Email administrateur";
$admin_lang_optn_fillit               = "A remplir. Ce sera utilis&eacute; pour r&eacute;cup&eacute;rer le mot de passe.";
$admin_lang_optn_img_path             = "Chemin vers les images";
$admin_lang_optn_tz                   = "Zone horaire";
$admin_lang_optn_tz_txt               = "S&eacute;lectionnez le d&eacute;calage horaire qui vous correspond.";
$admin_lang_optn_sendemail            = "Envoi d'email en cas de commentaire";
$admin_lang_optn_sendemail_txt        = "Envoyer un email pour avertir d'un commentaire ?";
$admin_lang_optn_sendemail_html_txt   = "Utiliser l'HTML dans les emails ?";
$admin_lang_optn_comment_moderation   = "Validation des commentaires";
$admin_lang_optn_cmnt_mod_txt         = "Souhaitez-vous valider les commentaires avant publication ?";
$admin_lang_optn_switch_template      = "Changer de mod&egrave;le (templates)";
$admin_lang_optn_lang_file            = "Langue";
$admin_lang_optn_dateformat           = "Format de date";
$admin_lang_optn_dateformat_txt       = "Format de date pour les images et les commentaires.<br />Voici  les param&egrave;tres principaux : Y:ann&eacute;e m:mois d:jour H:heure i:minute s:seconde.<br />Cette syntaxe est celle de la fonction PHP <a href='http://www.php.net/date' target='_blank'>date()</a>.";
$admin_lang_optn_gmt                  = "<br />Les changements d'heure saisonniers ne sont pas pris en compte automatiquement, il faut la mettre &agrave; jour ici.<br />Voir <a href='http://www.worldtimeserver.com/current_time_in_UTC.aspx' target='__blank'> l'heure GMT actuelle </a> si vous ne connaissez pas votre d&eacute;calage local.<br />";
$admin_lang_optn_cat_link_format      = "Pr&eacute;sentation des mots-cl&eacute;s";
$admin_lang_optn_catlinkformat_select = "Selectionnez le format de la lsite de mots-cl&eacute;s";
$admin_lang_optn_cat_link_format_txt  = "S&eacute;lection du format de la liste des mots-cl&eacute;s.";
$admin_lang_optn_catlinkformat_custom = "Format personnalis&eacute;";
$admin_lang_optn_catlinkformat_custom_start = "Caract&egrave;res de d&eacute;but :";
$admin_lang_optn_catlinkformat_custom_end   = "Caract&egrave;res de fin :";
$admin_lang_optn_calendar_type        = "Style de calendrier";
$admin_lang_optn_thumb_row            = "Rang&eacute;e de vignettes";
$admin_lang_optn_thumb_row_txt        = "Nombre de vignettes &agrave; afficher dans la rang&eacute;e g&eacute;n&eacute;r&eacute;e automatiquement.<br />Nous vous conseillons un nombre impair, par ex. 7 ou 9.";
$admin_lang_optn_crop_thumbs          = "Recadrer les vignettes ?";
$admin_lang_optn_crop_thumbs_txt      = "Si vous souhaitez que les vignettes soient recadr&eacute;es &agrave; la taille exacte, choisissez <b>OUI</b>.<br />\n
                                         Si vous souhaitez garder les proportions originales, choisissez <b>NON</b>.<br />\n
                                         Si vous souhaitez les recadrer manuellement apr&egrave;s avoir charg&eacute; l'image, choisissez <b>12CropImage</b>.";
$admin_lang_optn_thumb_size           = "Taille des vignettes";
$admin_lang_optn_thumb_size_txt       = "R&eacute;glez la taille des vignettes, Largeur x Hauteur.";
$admin_lang_optn_thumb_size_new       = "nouveau format";
$admin_lang_optn_reg_thumbs_button    = "Recr&eacute;er les vignettes";
$admin_lang_optn_regen_thumbs_txt     = "Ceci cr&eacute;e de nouvelles vignettes &agrave; partir de toutes les images.<br />Vous perdez ainsi les recadrages &eacute;ventuellement effectu&eacute;s.<br />Pour recadrer manuellement, choisissez 12CropImage.";
$admin_lang_optn_img_compression      = "Compression des vignettes";
$admin_lang_optn_img_compression_txt  = "Quelle compression souhaitez-vous ? <strong>10</strong> est basse qualit&eacute; et <strong>100</strong> la qualit&eacute; maximum (sans perte)";
$admin_lang_optn_pass_chngd_txt       = "Le mot de passe est modifi&eacute;.";
$admin_lang_optn_pass_notchngd_txt    = "Le mot de passe n'est pas modifi&eacute;. Entrez-le &agrave; nouveau dans le champ pour le confirmer.";
$admin_lang_optn_title_url_text       = "V&eacute;rifier ou modifier le titre du site et l'adresse URL de votre installation";
$admin_lang_optn_thumb_updated        = "Vignettes mises &agrave; jour !";
$admin_lang_optn_updated              = "vignettes mises &agrave; jour.";
$admin_lang_optn_visitorbooking_title = "Enregistrer les visiteurs";
$admin_lang_optn_visitorbooking_desc  = "Souhaitez-vous que Pixelpost enregistre les informations de chaque visiteur ?";
$admin_lang_optn_upd_done             = "Mise &agrave; jour termin&eacute;e.";


// Info
$admin_lang_info_gd                  = "Pas r&eacute;ussi &agrave; l'installer, demandez &agrave; votre h&eacute;bergeur de le faire pour vous !";
$admin_lang_info_gd_jpg              = "avec support JPEG";
$admin_lang_pp_version1              = "Derni&egrave;re version de Pixelpost :";
$admin_lang_pp_forum                 = "Pour de l'aide ou faire vos commentaires, rendez-vous sur le forum de Pixelpost ";
$admin_lang_pp_min_php               = "Requis pour Pixelpost : PHP version";
$admin_lang_pp_min_mysql             = "Requis pour Pixelpost : MySQL";
$admin_lang_pp_exif1                 = "<b>EXIF</b> Pixelpost utilise";
$admin_lang_pp_exif2                 = "pour extraire les informations EXIF";
$admin_lang_pp_path                  = "Chemins de fichiers";
$admin_lang_pp_imagepath             = "Chemin vers les fichiers d'images par d&eacute;faut :";
$admin_lang_pp_imagepath_conf        = "Chemin vers les fichiers d'images configur&eacute; :";
$admin_lang_pp_img_chmod1            = "Impossible d'&eacute;crire dans le fichier images !";
$admin_lang_pp_img_chmod2            = "Vous devez r&eacute;gler correctement les autorisations d'acc&egrave;s &agrave; ce dossier, sinon vous ne pourrez pas charger d'image.";
$admin_lang_pp_img_chmod3            = "<br /> R&eacute;glage du dossier :<b>chmod 777</b> (read, write and execute permissions for owner, group and world).";
$admin_lang_pp_img_chmod4            = "Pouvons-nous &eacute;crire dans le dossier ? OUI - Autorisations ";
$admin_lang_pp_img_chmod5            = "Impossible d'&eacute;crire dans le dossier vignettes (Thumbnails) !";
$admin_lang_pp_imgfolder             = "Dossier Images / Images Directory:";
$admin_lang_pp_thumbfolder           = "Dossier Vignettes /Thumbnails Directory:";
$admin_lang_pp_langfolder            = "Dossier Langues / Language Directory:";
$admin_lang_pp_addfolder             = "Dossier Addons / Addons Directory:";
$admin_lang_pp_incfolder             = "Dossier Includes / Includes Directory:";
$admin_lang_pp_tempfolder            = "Dossier Mod&egrave;les / Templates Directory:";
$admin_lang_pp_folder_missing        = "N'existe pas";
$admin_lang_pp_ref_log_title         = "Liens entrants des sept derniers jours";
$admin_lang_hostinfo                 = "Informations sur le serveur";
$admin_lang_fileuploads              = "Les envois de fichiers vers le serveur sont";
$admin_lang_serversoft               = "Logiciel du serveur";
$admin_lang_Pixelpostinfo            = "Informations sur Pixelpost";
$admin_lang_pp_currversion           = "Votre version de Pixelpost : ";

// AddOns
$admin_lang_addon_title              = "ADDONS INSTALLES";
$admin_lang_failed_addonstatus       = "Erreur dans la mise &agrave; jour du statut de l'addon : ";
$admin_lang_addon_off                = "Cliquez pour DESACTIVER";
$admin_lang_addon_on                 = "Cliquez pour ACTIVER";

// Error Messages
$admin_lang_pp_up_error_0            = "Le chargement s'est pass&eacute; sans probl&egrave;me.";
$admin_lang_pp_up_error_1      = "Le poids du fichier est trop lourd pour le serveur web.";
$admin_lang_pp_up_error_2      = "Taille du fichier trop importante.";
$admin_lang_pp_up_error_3      = "Le fichier n'a pas &eacute;t&eacute; t&eacute;l&eacute;charg&eacute; enti&egrave;rement.";
$admin_lang_pp_up_error_4      = "Aucun fichier n'a &eacute;t&eacute; t&eacute;l&eacute;charg&eacute;.";

// newly added ones
$admin_lang_cmnt_moderation_que   = "File d&lsquo;attente de validation";


// options >> time stamps
$admin_lang_optn_timestamps_title = "Cachet de date";
$admin_lang_optn_timestamps_desc  = "Si vous ajoutez la date aux noms de fichiers, la publication d'une image ayant le m&ecirc;me nom qu'une image d&eacute;j&agrave; pr&eacute;sente ne l'effacera pas. <br />
                                      Utiliser le cachet de date ? ";

// options >> fight spam
$admin_lang_spam                = "CONTROLE DU SPAM";
$admin_lang_spam_err_1          = "Erreur en cr&eacute;ant le tableau des bannis : ";
$admin_lang_spam_tableadd       = "Le tableau des bannis est ajout&eacute; pour emp&ecirc;cher le spam";
$admin_lang_spam_err_2          = "Erreur dans la mise &agrave; jour de la liste de validation : ";
$admin_lang_spam_err_3          = "Erreur dans la mise &agrave; jour de la liste noire : ";
$admin_lang_spam_err_4          = "Erreur dans la mise &agrave; jour de la liste noire des referer : ";
$admin_lang_spam_err_5          = "Erreur dans la mise &agrave; jour du nombre de liens acceptable dans les commentaires : ";
$admin_lang_spam_upd            = "Mise &agrave; jour r&eacute;ussie de toutes les listes noires.";
$admin_lang_spam_err_6          = "Erreur dans la mise &agrave; jour des commentaires lors de la comparaison avec la liste de validation : ";
$admin_lang_spam_com_upd        = "Commentaires compar&eacute;s avec la liste de validation ";
$admin_lang_spam_err_7          = "Erreur dans la suppression des commentaires lors de la comparaison avec la liste noire : ";
$admin_lang_spam_com_del        = "Les commentaires qui contiennent certains mots ou adresse IP sont supprim&eacute;s.";
$admin_lang_spam_err_8          = "Erreur dans la suppression des visiteurs lors de la comparaison avec la liste noire :";
$admin_lang_spam_visit_del      = "Les visiteurs ayant fait des commentaires avec des mots ou adresse IP de la liste noire sont supprim&eacute;s.";
$admin_lang_spam_ban            = "Listes de banissement";
$admin_lang_spam_content        = "Ajoutez aux listes les termes bannis (mots, adresses IP, noms), un mot par ligne.<br />\n
				                  Tout commentaire avec un mot, adresse IP, ou nom dans la <strong>liste de validation</strong> sera mis dans la file d'attente.<br />\n
  				                  Tout commentaire avec un mot, adresse IP, ou nom dans la <strong>liste noire</strong> sera interdit.<br />
  				                  Tout visiteur dont l'adresse IP correspond &agrave; un num&eacute;ro dans la <strong>liste des Referers (liens entrants) bannis</strong>, ou avec une adresse mail qui contient un des mots de la liste\n
				                  n'aura pas acc&egrave;s &agrave; votre photoblog. ( Pour que cela fonctionne, vous devez ajouter le code donn&eacute; au fichier .htaccess sur le serveur de votre site)";
$admin_lang_spam_modlist         = "Liste de validation";
$admin_lang_spam_blacklist       = "Liste noire";
$admin_lang_spam_reflist         = "Liste des Referers bannis";
$admin_lang_spam_blacklist_text  = "Copiez le code ci-dessous (CTRL+A et CTRL+C avec Windows, pomme A et pomme C avec Mac) et collez-le dans le fichier .htaccess de votre site pour interdire les adresses spammeuses.";
$admin_lang_spam_htaccess_text   = "Obtenir le code .htaccess";
$admin_lang_spam_check_comm      = "V&eacute;rifier les commentaires";
$admin_lang_spam_del_bad_comm    = "Supprimer les commentaires bannis";
$admin_lang_spam_del_bad_ref     = "Supprimer les Referers bannis";
$admin_lang_spam_updateblacklist = "Mettre &agrave; jour toutes les listes";

// Error Message
$lang_nothing_to_show            = "Revenez bient&ocirc;t, il n'y a pas encore d'image ici !";

// End of Admin-Language file 
?>