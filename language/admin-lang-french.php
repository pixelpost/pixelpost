<?php
/*
Pixelpost version 1.7

SVN file version:
$Id: admin-lang-french.php 450 2007-10-22 00:00:42Z david.kozikowski $

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

VARIABLES POUR L'INTERFACE D'ADMINISTRATION EN FRANCAIS :

Ne pas changer                ||      Changer                                   */

$_lang_file_translator        = 'Philippe Durand | <a href="http:///www.photofloue.net/" target="_blank">www.photofloue.net</a>';
$_lang_file_email             = 'thecrew@pixelpost.org';
$_lang_file_rev               = '1.7';

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
$admin_lang_example			  = "Example";


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

// Front Page
$admin_lang_pw_title          = "R&eacute;cup&eacute;ration de votre mot de passe Pixelpost";

$admin_lang_pw_wronguser      = "Le nom d'utilisateur que vous avez entr&eacute; n'est pas celui de l'administrateur de Pixelpost.";
$admin_lang_pw_back           =  "Retour &agrave; la page d'administration";
$admin_lang_pw_noemail        = "Vous n'avez pas entr&eacute; d'adresse email ! \n<br />
                                 Si vous n'avez aucune id&eacute;e de votre mot de passe, laissez un message dans le <a href='http://forum.pixelpost.org/'>forum Pixelpost</a> pour obtenir de l'aide.\n<br />";
$admin_lang_pw_notsent        = "Rien envoy&eacute; ! \n<br /> L'adresse email indiqu&eacute;e n'est pas celle de l'administrateur.<br />";
$admin_lang_pw_subject        = "Message de r&eacute;cup&eacute;ration de votre mot de passe Pixelpost";
$admin_lang_pw_usertext       = "Votre nom :";
$admin_lang_pw_mailtext       = "Votre adresse email :";
$admin_lang_pw_newpw          = "Votre nouveau mot de passe :";
$admin_lang_pw_text_1         = "R&eacute;cup&eacute;ration de votre mot de passe Pixelpost";
$admin_lang_pw_text_2         = "De : Administration de Pixelpost";
$admin_lang_pw_text_3         = "Un email est envoy&eacute; &agrave; votre adresse, avec votre nom d'utilisateur et un nouveau mot de passe. \n<br /> V&eacute;rifiez votre boite aux lettres : ";
$admin_lang_pw_text_4         = "<span style='color:red;'>Erreur! Il y a eu un probl&egrave;me ! \n<br />L'adresse email et le nom d'utilisateur sont les bons, mais il n'est pas possible d'envoyer un mail. \n<br />Renseignez-vous aupr&egrave;s de votre administrateur ou h&eacute;bergeur.</span>";
$admin_lang_pw_text_5         = "Erreur dans la base de donn&eacute;es :";
$admin_lang_pw_text_6         = "<br />La mise &agrave; jour du mot de passe a &eacute;chou&eacute;.";
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
$admin_lang_ni_missing_data         = "Il manque quelque chose !<br />\nAu minimum, il faut une image et son titre.\n
                                      Rien n'a &eacute;t&eacute; envoy&eacute;\n&agrave; cause des informations incompl&egrave;tes !";
$admin_lang_ni_crop_nextstep        = "S&eacute;lectionnez la fen&ecirc;tre de la vignette :";
$admin_lang_ni_crop_background      = "Ceci est l'arri&egrave;re-plan de l'image recadr&eacute;e";
$admin_lang_ni_db_error             = "il y a eu une erreur d'&eacute;criture dans la base de donn&eacute;es";
$admin_lang_ni_post_exif_date       = "Utiliser la date exif de l'appareil photo";
$admin_lang_ni_tags                 = "Tags";
$admin_lang_ni_tags_desc            = "(virgule, point-virgule et espace peuvent &ecirc;tre utilis&eacute;s pour s&eacute;parer les tags; pour joindre deux mots, utiliser le tiret ou un espace blanc soulign&eacute;)";
$admin_lang_ni_alt_language			= "Donnez un titre et une description dans la seconde langue";

// Images
$admin_lang_imgedit_edit            = "Modifier";
$admin_lang_imgedit_title           = "Titre :";
$admin_lang_imgedit_alttitle        = "Titre seconde langue :";
$admin_lang_imgedit_file_name       = "Nom du fichier :";
$admin_lang_imgedit_dimensions      = "Dimensions :";
$admin_lang_imgedit_tbpublished     = "Publication le :";
$admin_lang_imgedit_category_plural = "Mots-cl&eacute;s :";
$admin_lang_imgedit_delete          = "Supprimer";
$admin_lang_imgedit_delete1         = "Supprim&eacute;e(s)";
$admin_lang_imgedit_delete2         = "Image(s) s&eacute;lectionn&eacute;e(s)";
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
$admin_lang_imgedit_preview         = "Pr&eacute;visualisation";
$admin_lang_imgedit_db_error        = "<br />V&eacute;rifiez si le lien permanent n'est pas d&eacute;j&agrave; utilis&eacute; !";
$admin_lang_imgedit_tags_edit       = "Tags (virgule, point-virgule ou espace  pour s&eacute;parer les tags; pour joindre deux mots, utiliser le tiret ou un espace blanc soulign&eacute;) :";
$admin_lang_imgedit_alt_language    = "Modifier le titre et la l&eacute;gende dans la seconde langue";
$admin_lang_imgedit_masstag         = "Ajouter / supprimer des tags pour les images s&eacute;lectionn&eacute;es";
$admin_lang_imgedit_masstag_set     = "Ajouter des tags";
$admin_lang_imgedit_masstag_set2    = "Ajouter des tags pour la seconde langue";
$admin_lang_imgedit_masstag_unset   = "Retirer des tags";
$admin_lang_imgedit_published          = "Publi&eacute;";
$admin_lang_imgedit_unpublished_cmnts  = "image(s) auparavant masqu&eacute;e(s).";


// Mass-Edit Categories
$admin_lang_imgedit_mass_1           = "Modifier en nombre les mots-cl&eacute;s";
$admin_lang_imgedit_mass_2           = "Attribuer";
$admin_lang_imgedit_mass_3           = "Retirer";
$admin_lang_imgedit_mass_4           = "Modifier en nombre";


// Categories
$admin_lang_cats_add_cat             = "Ajouter un mot-cl&eacute;";
$admin_lang_cats_added               = "Mot-cl&eacute; ajout&eacute;.";
$admin_lang_cats_add_cat_txt         = "Ajouter un mot-cl&eacute; pour l'attribuer &agrave; des images.";
$admin_lang_cats_add_cat_txt_altlang = "Donnez la traduction du mot-cl&eacute; ci-dessus.";
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
$admin_lang_cmnt_check_all           = "S&eacute;lectionner / D&eacute;s&eacute;lectionner en nombre";
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
$admin_lang_cmnt_error_banlist       = "Erreur dans la mise &agrave; jour de la liste des liens entrants interdits :  ";
$admin_lang_cmnt_moderation_que      = "File d'\'attente de mod&eacute;ration  ";
$admin_lang_cmnt_rep_spam            = "Marquer comme Spam";
$admin_lang_cmnt_submenu1			 = "COMMENTAIRES";
$admin_lang_cmnt_submenu2			 = "EN ATTENTE DE MODERATION";

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
$admin_lang_optn_sub_title         	  = "Sous-titre :";
$admin_lang_optn_url                  = "URL :";
$admin_lang_optn_usr_pss              = "Nom de l'administrateur &amp; mot de passe";
$admin_lang_optn_usr_pss_txt          = "Changer de nom ou de mot de passe ?";
$admin_lang_optn_usr                  = "Utilisateur :";
$admin_lang_optn_pss                  = "Mot de passe :";
$admin_lang_optn_pss_re               = "Confirmer le mot de passe :";
$admin_lang_optn_email                = "Email administrateur";
$admin_lang_optn_fillit               = "A remplir. Ce sera utilis&eacute; pour r&eacute;cup&eacute;rer le mot de passe.";
$admin_lang_optn_img_path          		= "Chemin vers les images et vignettes";
$admin_lang_optn_tz                   = "Zone horaire";
$admin_lang_optn_tz_txt               = "S&eacute;lectionnez le d&eacute;calage horaire qui vous correspond.";
$admin_lang_optn_sendemail            = "Envoi d'email en cas de commentaire";
$admin_lang_optn_sendemail_txt        = "Envoyer un email pour avertir d'un commentaire ?";
$admin_lang_optn_sendemail_html_txt   = "Utiliser l'HTML dans les emails ?";
$admin_lang_optn_comment_setting 		   = "REGLAGES GLOBAUX COMMENTAIRES";
$admin_lang_optn_comment_setting2			 = "R&eacute;glages commentaires";
$admin_lang_optn_cmnt_mod_txt          = "Action par d&eacute;faut pour les commentaires : ";
$admin_lang_optn_cmnt_mod_txt2         = "Action par d&eacute;faut pour les commentaires :";
$admin_lang_optn_cmnt_mod_allowed		   =	"Publier imm&eacute;diatement";
$admin_lang_optn_cmnt_mod_moderation   =	"Mettre dans la file d'attente pour mod&eacute;ration";
$admin_lang_optn_cmnt_mod_forbidden	   =	"Interdire les commentaires";

$admin_lang_optn_switch_template      = "Changer de mod&egrave;le (template)";
$admin_lang_optn_lang_file            = "Langue";
$admin_lang_optn_lang_file_admin      = "Langue de la console d'administration";
$admin_lang_optn_dateformat           = "Format de date";
$admin_lang_optn_dateformat_txt       = "Format de date pour les images et les commentaires.<br />Voici  les param&egrave;tres principaux : Y:ann&eacute;e m:mois d:jour H:heure i:minute s:seconde.<br />Cette syntaxe est celle de la fonction PHP <a href='http://www.php.net/date' target='_blank'>date()</a>.";
$admin_lang_optn_gmt                  = "<br />Les changements d'heure saisonniers ne sont pas pris en compte automatiquement, il faut la mettre &agrave; jour ici.<br />Voir <a href='http://www.worldtimeserver.com/current_time_in_UTC.aspx' target='__blank'> l'heure UTC actuelle </a> si vous ne connaissez pas votre d&eacute;calage local.<br />";
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
$admin_lang_optn_thumb_sharp          = "Nettet&eacute; des vignettes";
$admin_lang_optn_thumb_sharp_txt      = "Quel niveau de nettet&eacute; souhaitez-vous pour les vignettes ?";
$admin_lang_optn_thumb_sharp0         = 'Pas d\'accentuation';
$admin_lang_optn_thumb_sharp1         = 'L&eacute;g&egrave;re';
$admin_lang_optn_thumb_sharp2         = 'Moyenne';
$admin_lang_optn_thumb_sharp3         = 'Forte';
$admin_lang_optn_thumb_sharp4         = 'Tr&egrave;s forte';
$admin_lang_optn_pass_chngd_txt       = "Le mot de passe est modifi&eacute;.";
$admin_lang_optn_pass_notchngd_txt    = "Le mot de passe n'est pas modifi&eacute;. Entrez-le &agrave; nouveau dans le champ pour le confirmer.";
$admin_lang_optn_title_url_text       = "V&eacute;rifier ou modifier le titre du site et l'adresse URL de votre installation";
$admin_lang_optn_thumb_updated        = "Vignettes mises &agrave; jour !";
$admin_lang_optn_updated              = "vignettes mises &agrave; jour.";
$admin_lang_optn_visitorbooking_title = "Enregistrer les visiteurs";
$admin_lang_optn_visitorbooking_desc  = "Souhaitez-vous que Pixelpost enregistre les informations de chaque visiteur ?";
$admin_lang_optn_upd_done             = "Mise &agrave; jour termin&eacute;e.";
$admin_lang_optn_upd_error            = "Erreur dans la mise &agrave; jour.";
$admin_lang_optn_upd_lang_error		  = "La seconde langue choisie est la même que la langue par d&eacute;faut.<br />Choisissez donc une autre langue ou d&eacute;sactivez la seconde langue.";
$admin_lang_optn_markdown             = "Activer le code Markdown";
$admin_lang_optn_markdown_desc        = "Pixelpost doit-il activer le code Markdown dans la l&eacute;gende des images ? (<a href=\"http://fr.wikipedia.org/wiki/Markdown\">plus d'info</a>)";
$admin_lang_optn_exif			      = "Activer Exif";
$admin_lang_optn_exif_desc		      = "Pixelpost doit-il activer l'affichage des donn&eacute;es Exif sur la page principale ?";
$admin_lang_optn_token			      = "Autoriser les jetons dans les formulaires";
$admin_lang_optn_token_desc		      = "Autoriser l'usage d'un jeton (token) r&eacute;duira la possibilit&eacute; d'un piratage (<a href=\"http://en.wikipedia.org/wiki/Cross-site_request_forgery\">Cross-Site Request Forgeries</a>).<br/><br/>\n
								Si cette option est activ&eacute;e, les commentaires ne seront enregistr&eacute;s que si le jeton du formulaire correspond &agrave; la session du visiteur. Pour mettre en oeuvre cette fonctionnalit&eacute;, il vous faut ajouter <strong>&lt;TOKEN&gt;</strong> au fichier comments de votre mod&egrave;le, quelque part entre les balises  <strong><i>&lt;form&gt;...&lt;/form&gt;</i></strong>.
								Si vous oubliez d'inclure la balise <strong>&lt;TOKEN&gt;</strong>, la saisie de commentaires n'est pas possible et le visiteur voit s'afficher un message d'erreur.<br /><br/>\n
								Souhaitez-vous activer cette option ?";
$admin_lang_optn_token_time		= "Temps maximum (en minutes) entre l'ouverture de la fenêtre de commentaires et l'envoi d'un commentaire : ";
$admin_lang_optn_token_error	= "Attention: pas moins d'une minute. La dur&eacute;e a &eacute;t&eacute; fix&eacute;e &agrave; 1 minute.";
$admin_lang_optn_dsbl_list 		= "R&eacute;glages antispam [Distributed Sender Blackhole List (http://www.dsbl.org)]";
$admin_lang_optn_dsbl_list_desc = "La liste <a href=\"http://www.dsbl.org\" target=\"_blank\">Distributed Sender Blackhole List</a> contient les adresses IP des serveurs ou r&eacute;seaux connus pour transmettre des spams ou les relayer, via le courrier &eacute;lectronique ou les commentaires.<br /> <br />
								Souhaitez-vous v&eacute;rifier si l'adresse IP de l'exp&eacute;diteur figure dans cette liste ?";
$admin_lang_optn_time_between_comments = "Anti-pollution spam";
$admin_lang_optn_time_between_comments_desc = "Dur&eacute;e (en secondes) avant que le visiteur puisse publier un nouveau commentaire (pour &eacute;viter les commentaires automatiques) : ";
$admin_lang_optn_max_uri_comment	= "Nombre maximum de liens";
$admin_lang_optn_max_uri_comment_desc = "Nombre de liens autoris&eacute;s dans un commentaire : ";

$admin_lang_optn_rss_setting		= "R&eacute;glage des flux d'abonnement RSS/ATOM";
$admin_lang_optn_rss_title  		= "Titre du flux";
$admin_lang_optn_rss_desc   		= "Description";
$admin_lang_optn_rss_copyright		= "Copyright";
$admin_lang_optn_rss_discovery		= "D&eacute;tection du flux";
$admin_lang_optn_rss_opt_both		= "RSS &amp; ATOM";
$admin_lang_optn_rss_opt_rss		= "RSS";
$admin_lang_optn_rss_opt_atom		= "ATOM";
$admin_lang_optn_rss_opt_ext		= "Externe";
$admin_lang_optn_rss_opt_none		= "Aucun";
$admin_lang_optn_rss_ext_type		= "Type de flux externe";
$admin_lang_optn_rss_ext			= "Flux externe";
$admin_lang_optn_rss_enable_comment_feed		= "Autoriser les abonnements aux commentaires";
$admin_lang_optn_rsstype_desc		= "S&eacute;lectionnez le type de flux RSS/ATOM :";
$admin_lang_optn_rss_full			= "Afficher les grandes images";
$admin_lang_optn_rss_thumbs			= "Afficher les vignettes";
$admin_lang_optn_rss_thumbs_only	= "Afficher seulement les vignettes";
$admin_lang_optn_rss_full_only		= "Afficher seulement les grandes images";
$admin_lang_optn_rss_text			= "Afficher seulement le texte";
$admin_lang_optn_feeditems_desc		= "Nombre d'articles dans le flux : ";
$admin_lang_optn_lang               = "R&eacute;glages de la langue principale : ";
$admin_lang_optn_alt_lang           = "R&eacute;glages de la seconde langue : ";
$admin_lang_optn_alt_lang_dis       = "d&eacute;sactiv&eacute;e";
$admin_lang_optn_alt_lang_no        = "d&eacute;sactiv&eacute;e";
$admin_lang_optn_img_display		="Ordre d'affichage des images";
$admin_lang_optn_img_display_desc	="Choisissez dans quel ordre les images sont tri&eacute;es pour l'affichage. Trier par : ";
$admin_lang_optn_img_display_default	="la plus r&eacute;cente en premier";
$admin_lang_optn_img_display_reversed	="la plus ancienne en premier";

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
$admin_lang_pp_check                 = "V&eacute;rifier";
$admin_lang_pp_sess_path             = "Chemin de sauvegarde de la session";
$admin_lang_pp_sess_path_emp         = "est vide";
$admin_lang_pp_fileupload_np         = 'PAS POSSIBLE ! V&eacute;rifiez la variable  file_upload variable dans le fichier php.ini !';
$admin_lang_pp_fileupload_p          = 'possible.';
$admin_lang_pp_langs                 = 'Traductions de Pixelpost';
$admin_lang_pp_lng_fname             = 'Nom du fichier';
$admin_lang_pp_lng_author            = 'Auteur';
$admin_lang_pp_lng_ver               = 'Version';
$admin_lang_pp_lng_email             = 'Email';
$admin_lang_pp_newest_ver            = 'Vous avez une version de Pixelpost &agrave; jour !';
$admin_lang_pp_thumbnailpath 		 = "Chemin pr&eacute;sum&eacute; vers les vignettes";
$admin_lang_pp_thumbnailpath_conf 	 = "Chemin configur&eacute; vers les vignettes"; 

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
$admin_lang_pp_up_error_6      = "Il manque un dossier temporaire.";
$admin_lang_pp_up_error_7      = "Impossible d\'enregistrer le fichier sur le disque.";
$admin_lang_pp_addon_error	   = "Pixelpost ne peut pas lire le fichier de l\'addon. V&eacute;rifiez les autorisations d\'&eacute;criture pour les fixer &agrave; 755.";


// options >> time stamps
$admin_lang_optn_timestamps_title = "Cachet de date";
$admin_lang_optn_timestamps_desc  = "Si vous ajoutez la date aux noms de fichiers, la publication d'une image ayant le m&ecirc;me nom qu'une image d&eacute;j&agrave; pr&eacute;sente ne l'effacera pas. <br />
                                      Utiliser le cachet de date ? ";

// options >> fight spam
$admin_lang_spam                = "CONTROLE DU SPAM";
$admin_lang_spam_change         = "Toutes les listes des bannis";
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

// Spam
$admin_lang_spam_ban            = "Listes de banissement";
$admin_lang_spam_content        = "Ajoutez aux listes les termes bannis (mots, adresses IP, noms), un mot par ligne.<br />\n
			Tout commentaire avec un mot, adresse IP, ou nom dans la <strong>liste de validation</strong> sera mis dans la file d'attente.<br />\n
  			Tout commentaire avec un mot, adresse IP, ou nom dans la <strong>liste noire</strong> sera interdit.<br />
  			Tout visiteur dont l'adresse IP correspond &agrave; un num&eacute;ro dans la <strong>liste des liens entrants (liens entrants) bannis</strong>, ou avec une adresse mail qui contient un des mots de la liste\n
			n'aura pas acc&egrave;s &agrave; votre photoblog. ( Pour que cela fonctionne, vous devez ajouter le code donn&eacute; au fichier .htaccess sur le serveur de votre site)";
$admin_lang_spam_modlist         = "Liste de validation";
$admin_lang_spam_blacklist       = "Liste noire";
$admin_lang_spam_reflist         = "Liste des liens entrants bannis";
$admin_lang_spam_blacklist_text  = "Copiez le code ci-dessous (CTRL+A et CTRL+C avec Windows, pomme A et pomme C avec Mac) et collez-le dans le fichier .htaccess de votre site pour interdire les adresses spammeuses.";
$admin_lang_spam_htaccess_text   = "Obtenir le code .htaccess";
$admin_lang_spam_check_comm      = "V&eacute;rifier les commentaires";
$admin_lang_spam_del_bad_comm    = "Supprimer les commentaires bannis";
$admin_lang_spam_del_bad_ref     = "Supprimer les liens entrants bannis";
$admin_lang_spam_updateblacklist = "Mettre &agrave; jour toutes les listes";

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


// End of Admin-Language file
?>