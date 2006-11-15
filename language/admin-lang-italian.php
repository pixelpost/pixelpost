<?php
/*

admin-lang-english.php : english (default) language file for Pixelpost-Admin-Section
===================================================================================
Pixelpost version 1.5

SVN file version:
$Id$

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, GeoS
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

VARIABILI PER L'INTERFACCIA DI AMMINISTRAZIONE IN ITALIANO:

Non modificare                    ||      Modificare                                   */

$admin_lang_isrtl             = "no"; // yes for right-to-left languages and no for left-to-right languages
$admin_lang_update            = "Aggiorna";
$admin_lang_reload            = "<br /> Potrebbe essere necessario ricaricare la pagina per vedere i cambiamenti.";
$admin_lang_error             = "Errore";
$admin_lang_post              = "post";
$admin_lang_page              = "pagina";
$admin_lang_of                = "di";
$admin_lang_next              = "Successiva";
$admin_lang_prev              = "Precedente";
$admin_lang_show              = "Mostra";
$admin_lang_go                = "Vai!";
$admin_lang_done              = "Fatto:";


// Admin Start
$admin_start_1                = "Non esiste la cartella <b>language</b> oppure il file";
$admin_start_2                = "&egrave; assente in quella cartella.\n<br />Assicurati di aver caricato tutti i file necessari, nominati esattamente come indicato.";
$admin_start_userpw           = "Username o Password errati.";
$admin_start_pw_forgot        = "Dimenticato la password?";
$admin_start_browser_title    = "ADMIN";
$admin_start_welcome          = "Benvenuto in Pixelpost Admin - Devi fare login.";
$admin_start_pp_name          = "Link al tuo sito Pixelpost:";
$admin_start_pp_tit           = "fai click qui per caricare il tuo photoblog";
$admin_start_cookie           = "Il login imposta un cookie";
$admin_start_username         = "Username";
$admin_start_pw               = "Password";
$admin_start_pw_button        = "Spediscimi la nuova password";
$admin_start_pw_recover       = "Purtroppo <span style='color:red;'><b>non esiste modo di recuperare la tua vecchia password</b></span> ma Pixelpost &egrave; in grado
                                 di creare una nuova password casuale per te.\n
                                 <br />Perfavore inserisci l'indirizzo email che hai indicato nel pannello di amministrazione.
                                 <br />Riceverai immediatamente una nuova password via email.";
$admin_start_email            = "Indirizzo Email:";
$admin_start_email_button     = "Inserisci il tuo indirizzo email";
$admin_start_admin_1          = "Amministrazione";
$admin_start_admin_2          = "per";
$admin_start_remember         =	"Fammi entrare automaticamente ad ogni visita:";

// Password Recovery

// Front Page
$admin_lang_pw_title           = "Pixelpost Recupero Password";
$admin_lang_pw_wronguser	   = "Lo username indicato non &egrave; quello dell&prime;amministratore di Pixelpost.";
$admin_lang_pw_back            = "Torna alla pagina di admin";
$admin_lang_pw_noemail         = "Non hai inserito alcun indirizzo email! \n<br />
				                 Se non hai idea della tua password, scrivi nel <a href='http://forum.pixelpost.org/'>forum di Pixelpost</a> 
				                 una richiesta di aiuto.\n<br />";
$admin_lang_pw_notsent         = "Nessun invio! \n<br /> L'indirizzo email inserito &egrave; diverso da quello che hai indicato nel pannello di amministrazione.<br />";
$admin_lang_pw_subject	       = "Messaggio di Recupero Password di Pixelpost";
$admin_lang_pw_usertext	 	   = "Il tuo username:"; 
$admin_lang_pw_mailtext		   = "Il tuo indirizzo email:";
$admin_lang_pw_newpw	       = "La tua nuova password:";
$admin_lang_pw_text_1		   = "Recupero password di Pixelpost";
$admin_lang_pw_text_2		   = "Da: sezione di amministrazione di Pixelpost";
$admin_lang_pw_text_3		   = "Il tuo username e la tua nuova password sono stati inviati al tuo indirizzo email. \n<br /> 
				                 Controlla il tuo indirizzo email ";
$admin_lang_pw_text_4 		   = "<span style='color:red;'>Errore! Qualcosa non ha funzionato! \n<br />
				                 Indirizzo email e username forniti sono OK ma non &egrave; stato possibile inviare la email! \n<br />
                                 Chiedi aiuto all'Amministratore del tuo host</span>";
$admin_lang_pw_text_5 		   = "Errore database:";
$admin_lang_pw_text_6		   = "<br />Aggiornamento della nuova password fallito.";
$admin_lang_pw_text_7          = "Questa email &egrave; inviata automaticamente dall'area LogIn del tuo Photoblog.\nQualcuno ha richiesto una nuova password per la Sezione di Amministrazione.\n\nDevi entrare nel tuo Photoblog\n\nall'indirizzo ";
$admin_lang_pw_text_8          = "\n\ne fare login con quella nuova password per resettare questa password automaticamente generata\n\nimmediatamente!";

// Admin Menu
$admin_lang_new_image          = "NUOVA IMMAGINE";
$admin_lang_images             = "IMMAGINI";
$admin_lang_categories         = "CATEGORIE";
$admin_lang_comments           = "COMMENTI";
$admin_lang_options            = "OPZIONI";
$admin_lang_general_info       = "INFORMAZIONI";
$admin_lang_addons             = "ADDONS";
$admin_lang_logout             = "ESCI";

// New Image
$admin_lang_ni_post_a_new_image   = "Pubblica una Nuova Immagine";
$admin_lang_ni_image              = "Immagine";
$admin_lang_ni_image_title        = "Titolo Immagine";
$admin_lang_ni_select_cat         = "Seleziona Categorie / Parole chiave";
$admin_lang_ni_description        = "Testo / descrizione immagine";
$admin_lang_ni_datetime           = "Data e Ora per la Pubblicazione";
$admin_lang_ni_post_now           = "Pubblica in data attuale";
$admin_lang_ni_post_one_day_after = "Pubblica un giorno dopo l'ultima pubblicazione";
$admin_lang_ni_post_spec_date     = "Pubblica in una data specifica. Imposta la data sotto:";
$admin_lang_ni_post_entry         = "Pubblica";
$admin_lang_ni_upload             = "Carica";
$admin_lang_ni_upload_error       = "Qualcosa non ha funzionato nel caricamento del file!";
$admin_lang_ni_posted             = "PUBBLICATO";
$admin_lang_ni_year               = "anno";
$admin_lang_ni_month              = "mese";
$admin_lang_ni_day                = "giorno";
$admin_lang_ni_hour               = "ora";
$admin_lang_ni_min                = "minuto";
$admin_lang_ni_markdown_text      = "Usa Markdown o HTML per formattare il testo in questo campo.";
$admin_lang_ni_markdown_hp        = "Homepage di Markdown";
$admin_lang_ni_markdown_element   = "Nozioni basilari";
$admin_lang_ni_markdown_syntax    = "Riferimenti per la sintassi";
$admin_lang_ni_missing_data       = "Dati insufficienti<br />\n
                                     Hai bisogno almeno di un titolo per l'immagine, e di una immagine.\n
                                     Tieni presente che nessuna immagine &egrave; stata caricata\n
                                     a causa di una informazione mancante!";
$admin_lang_ni_crop_nextstep      = "Ora devi scegliere il riquadro di ritaglio della miniatura:";
$admin_lang_ni_crop_background    = "Questo  lo sfondo dell'immagine da ritagliare";
$admin_lang_ni_post_exif_date     = "Usa la data exif";
$admin_lang_ni_db_error           = "si &egrave; verificato un errore durante la scrittura nel database";
$admin_lang_ni_tags               = "Tags";
$admin_lang_ni_alt_language				= "Provide an image title and description in the secondary language";

// Images
$admin_lang_imgedit_edit           = "Modifica";
$admin_lang_imgedit_title          = "Titolo:";
$admin_lang_imgedit_file_name      = "Nome file:";
$admin_lang_imgedit_dimensions     = "Dimensioni:";
$admin_lang_imgedit_tbpublished    = "Da pubblicare:";
$admin_lang_imgedit_category_plural = "Categorie:";
$admin_lang_imgedit_delete          = "Cancella";
$admin_lang_imgedit_deleted         = "Rimozione post&nbsp;/&nbsp;cancellazione immagine&nbsp;/&nbsp;cancellazione miniatura";
$admin_lang_imgedit_deleted1        = "Post cancellato.";
$admin_lang_imgedit_deleted2        = "Immagine cancellata.";
$admin_lang_imgedit_delete_error    = "Impossibile cancellare l'immagine.\n
                                       Devi farlo in altro modo, forse con un programma FTP.";
$admin_lang_imgedit_deleted3        = "Miniatura cancellata.";
$admin_lang_imgedit_delete_error2   = "Impossibile cancellare la miniatura.\n
                                       Devi farlo in altro modo, forse con un programma FTP.";
$admin_lang_imgedit_reupimg         = "Ricarica Immagine:";
$admin_lang_imgedit_file            = "Il file: ";
$admin_lang_imgedit_file_isuploaded = "&egrave; stato ricaricato!";
$admin_lang_imgedit_update          = "Aggiornamento immagine";
$admin_lang_imgedit_updated         = "Immagine aggiornata";
$admin_lang_imgedit_txt_desc        = "Testo/descrizione:";
$admin_lang_imgedit_dtime           = "Data e ora:";
$admin_lang_imgedit_img             = "Immmagine:";
$admin_lang_imgedit_fsize           = "Dimensione file:";
$admin_lang_imgedit_12cropimg       = "CropImage tool:";
$admin_lang_imgedit_12cropimg_txt   = "Per modificare la miniatura di questa immagine, trascina il riquadro di ritaglio con il mouse o espandilo/restringilo con i pulsanti '+'/'-'";
$admin_lang_imgedit_uthmb_button    = "Aggiorna Miniatura";
$admin_lang_imgedit_u_post_button   = "Aggiorna Post";
$admin_lang_imgedit_title1          = "Immagini - Ricarica, Modifica o Cancella immagini&nbsp;||&nbsp;";
$admin_lang_imgedit_title2          = " immagine(i) nel database \n<br /> Sto mostrando ";
$admin_lang_imgedit_title3          = " post, pagina ";
$admin_lang_imgedit_title4          = " di ";
$admin_lang_imgedit_12crop_opt      = "<strong>Attenzione:</strong> opzione 12CropImage non selezionata per il ritaglio delle miniature. Di conseguenza, le miniature non si possono cambiare.";
$admin_lang_imgedit_edit_post       = "MODIFICA POST";
$admin_lang_imgedit_img_page        = "immagini per pagina";
$admin_lang_imgedit_cropbg          = "Questo &egrave; il testo di sfondo di 12CropImage";
$admin_lang_imgedit_js_del_im       = "Sicuro di voler cancellare l'immagine?";
$admin_lang_imgedit_preview         = "Preview";
$admin_lang_imgedit_db_error        = "<br />Verifica che la stringa del permalink non sia attualmente in uso!";
$admin_lang_imgedit_tags            = $admin_lang_ni_tags;
$admin_lang_imgedit_alt_language  	= "Change the secondary language image title and description";

// Mass-Edit Categories
$admin_lang_imgedit_mass_1          = "Modifica di massa categoria";
$admin_lang_imgedit_mass_2          = "Assegna";
$admin_lang_imgedit_mass_3          = "Revoca";
$admin_lang_imgedit_mass_4          = "Aggiorna in massa";


// Categories
$admin_lang_cats_add_cat            = "Aggiungi Categoria";
$admin_lang_cats_added              = "Categoria aggiunta.";
$admin_lang_cats_add_cat_txt        = "Aggiungi una categoria alla quale assegnare immagini.";
$admin_lang_cats_edit_cat           = "Modifica Categorie";
$admin_lang_cats_edit_cat_txt       = "Modifica una categoria";
$admin_lang_cats_edit_cat_button    = "Modifica Categoria";
$admin_lang_cats_edit_tip           = "Modifica il nome della seguente categoria.<br />Tutte le immagini appartenenti al vecchio nome apparterranno al nuovo nome inserito.";
$admin_lang_cats_delete_cat         = "Cancella Categorie";
$admin_lang_cats_delete_cat_txt     = "Cancella una categoria";
$admin_lang_cats_delete_cat2        = "Cancellazione:";
$admin_lang_cats_delete_cats_button = "Cancella Categoria";
$admin_lang_cats_deleted            = "Categoria cancellata.";
$admin_lang_cats_update             = "Aggiorna Categoria";
$admin_lang_cats_update_cat_button  = "Aggiorna Categoria";
$admin_lang_cats_updated            = "Categoria aggiornata al nuovo nome.";


// Comments
$admin_lang_cmnt_commentlist        = "Elenco dei Commenti - cancella o modifica a piacere&nbsp;||&nbsp;Sto mostrando";
$admin_lang_cmnt_name               = "Name:";
$admin_lang_cmnt_email              = "Email:";
$admin_lang_cmnt_comment            = "Commento:";
$admin_lang_cmnt_image              = "Immagine";
$admin_lang_cmnt_delete             = "Cancella";
$admin_lang_cmnt_deleted            = "Cancellato un commento.";
$admin_lang_cmnt_delete1            = "Cancellato";
$admin_lang_cmnt_delete2            = "commento(i) selezionato(i).";
$admin_lang_cmnt_edit               = "Modifica";
$admin_lang_cmnt_edited             = "Modificato un commento.";
$admin_lang_cmnt_check_all          = "Seleziona tutto";
$admin_lang_cmnt_clear_all          = "Annulla selezioni";
$admin_lang_cmnt_invert_checks      = "Inverti selezioni";
$admin_lang_cmnt_del_selected       = "Cancella selezionati";
$admin_lang_cmnt_page               = "commenti per pagina.";
$admin_lang_cmnt_commenter          = "Commento fatto:";
$admin_lang_cmnt_ip                 = "Indirizzo ip:";
$admin_lang_cmnt_save               = "Salva";
$admin_lang_cmnt_massdelete_text    = "Seleziona tutti i commenti che vuoi cancellare in una volta sola";
$admin_lang_cmnt_js_del_comm        = "Sei sicuro di voler cancellare quel commento?";
$admin_lang_cmnt_publish_sel        = "Pubblica Selezionato";
$admin_lang_cmnt_unpublish_sel      = "Aggiungi alla coda di moderazione";
$admin_lang_cmnt_published          = "Pubblicato";
$admin_lang_cmnt_unpublished_cmnts  = "commento(i) precedentemente sospesi.";
$admin_lang_cmnt_unpublished        = "Sospesi";
$admin_lang_cmnt_published_cmnts    = "commento(i) precedentemente pubblicati.";
$admin_lang_cmnt_error_blacklist    = "Errore di aggiornamento della blacklist: ";
$admin_lang_cmnt_error_banlist      = "Errore di aggiornamento della ban list dei referer: ";
$admin_lang_cmnt_moderation_que     = "Coda di moderazione";
$admin_lang_cmnt_rep_spam 	        = 'Segnala Spam';


// Option
$admin_lang_optn_general            = "GENERALE";
$admin_lang_optn_template           = "TEMPLATE";
$admin_lang_optn_thumbnails         = "MINIATURE";
$admin_lang_optn_tip                = "Non dimenticare la barra alla fine <b>'/'</b> es. <i>http://www.pixelpost.org/</i>";

$admin_lang_optn_update             = "Aggiorna";
$admin_lang_optn_yes                = "Si";
$admin_lang_optn_no                 = "No";

$admin_lang_optn_title_url         = "TITOLO DEL SITO E URL";
$admin_lang_optn_title             = "Titolo:";
$admin_lang_optn_url               = "URL:";
$admin_lang_optn_usr_pss           = "UTENTE AMMINISTRATORE &amp; PASSWORD";
$admin_lang_optn_usr_pss_txt       = "Cambiare username o password?";
$admin_lang_optn_usr               = "User:";
$admin_lang_optn_pss               = "Password:";
$admin_lang_optn_pss_re            = "Conferma Password:";
$admin_lang_optn_email             = "EMAIL AMMINISTRATORE";
$admin_lang_optn_fillit            = "Riempilo. Servir&agrave; per il recupero password.";
$admin_lang_optn_img_path          = "PERCORSO IMMAGINI";
$admin_lang_optn_tz                = "FUSO ORARIO";
$admin_lang_optn_tz_txt            = "Seleziona il fuso orario della tua localit&agrave;.";
$admin_lang_optn_sendemail         = "NOTIFICA EMAIL DEI COMMENTI";
$admin_lang_optn_sendemail_txt     = "Desideri la notifica via email dei commenti?";
$admin_lang_optn_sendemail_html_txt = "utilizzare HTML nella email di notifica?";
$admin_lang_optn_comment_moderation = "MODERAZIONE DEI COMMENTI";
$admin_lang_optn_cmnt_mod_txt       = "Vuoi moderare i commenti prima della pubblicazione?";

$admin_lang_optn_switch_template       = "CAMBIA TEMPLATE";
$admin_lang_optn_lang_file             = "FILE DEL LINGUAGGIO";
$admin_lang_optn_dateformat            = "FORMATO DELLA DATA";
$admin_lang_optn_dateformat_txt        = "Il formato di visualizzazione per immagini e commenti. La sintassi usata &egrave; identica a quella della funzione <a href='http://www.php.net/date' target='_blank'>date()</a> di PHP. <br \>Ecco alcuni esempi di cosa sostituisce alcuni comuni parametri: Y:anno m:mese d:giorno H:ora i:minuti s:secondi";
$admin_lang_optn_gmt                   = "Il supporto all'ora legale non &egrave; automatico, devi agire manualmente.<br />Controlla su <a href='http://www.worldtimeserver.com/current_time_in_UTC.aspx' target='__blank'> GMT Current time </a> se non conosci il tuo fuso orario rispetto al GMT.<br />";
$admin_lang_optn_cat_link_format       = "FORMATO LINK CATEGORIE";
$admin_lang_optn_catlinkformat_select  = "Seleziona Formato Link Categorie";
$admin_lang_optn_cat_link_format_txt   = "Il formato di visualizzazione dei link alle categorie nel template.";
$admin_lang_optn_catlinkformat_custom  = "Formato personalizzato";
$admin_lang_optn_catlinkformat_custom_start = "Stringa di apertura:";
$admin_lang_optn_catlinkformat_custom_end   = "Stringa di chiusura:";
$admin_lang_optn_calendar_type         = "TIPO DI CALENDARIO";
$admin_lang_optn_thumb_row             = "STRISCIA DELLE MINIATURE";
$admin_lang_optn_thumb_row_txt         = "Quante miniature vanno mostrate nella striscia generata automaticamente.<br/>Per risultati migliori scegli un numero dispari, ad esempio 7 o 9, non 6 o 8.";
$admin_lang_optn_crop_thumbs           = "RITAGLIO MINIATURE?";
$admin_lang_optn_crop_thumbs_txt       = "Se vuoi che le miniature siano ritagliate con misure esatte: scegli <b>YES.</b><br/>\n
                                        Se vuoi mantenere le proporzioni originali, scegli <b>NO.</b><br/>\n
                                        Se vuoi ritagliare le miniature manualmente dopo il caricamento delle immagini, scegli <b>12CropImage.</b>";
$admin_lang_optn_thumb_size            = "DIMENSIONE MINIATURE";
$admin_lang_optn_thumb_size_txt        = "Imposta le dimensioni delle miniature, Larghezza x Altezza.";
$admin_lang_optn_thumb_size_new        = "Imposta le nuove dimensioni";
$admin_lang_optn_reg_thumbs_button     = "Rigenera miniature";
$admin_lang_optn_regen_thumbs_txt      = "Questo genera nuove miniature per tutte le immagini pubblicate.<br />Tutte le miniature ritagliate manualmente saranno riportate ai valori predefiniti.<br />Naturalmente, puoi cambiare le miniature una per una utilizzando 12CropImage durante la modifica di una immagine.";
$admin_lang_optn_img_compression       = "COMPRESSIONE MINIATURE";
$admin_lang_optn_img_compression_txt   = "Quanto forte vuoi che sia la compressione jpg?<br />10 significa bassa qualit&agrave; e 100 alta qualit&agrave; (nessun artefatto visibile).";
$admin_lang_optn_pass_chngd_txt        = "La password &egrave; cambiata.";
$admin_lang_optn_pass_notchngd_txt     = "La password non &egrave; cambiata. Digita la stessa password nel campo di conferma.";
$admin_lang_optn_title_url_text        = "Controlla o modifica il titolo del Sito e la URL della tua installazione";
$admin_lang_optn_thumb_updated         = "Miniature aggiornate!";
$admin_lang_optn_updated               = "miniature aggiornate.";
$admin_lang_optn_visitorbooking_title  = 'Registra visitatori';
$admin_lang_optn_visitorbooking_desc   = 'Vuoi che Pixelpost memorizzi informazioni per ogni visitatore?';
$admin_lang_optn_upd_done              = "Aggiornamento eseguito.";

// Info
$admin_lang_info_gd                   = "Non installato, chiedi all'Amministratore del tuo host di installarlo!";
$admin_lang_info_gd_jpg               = "con supporto JPEG";
$admin_lang_pp_version1               = "Ultima versione di Pixelpost:";
$admin_lang_pp_forum                  = "Se cerchi aiuto o vuoi esprimere opinioni, vai al forum di Pixelpost";
$admin_lang_pp_min_php                = "Requisiti minimi di Pixelpost: versione PHP";
$admin_lang_pp_min_mysql              = "Requisiti minimi di Pixelpost: MySQL";
$admin_lang_pp_exif1                  = "<b>EXIF</b> Pixelpost usa";
$admin_lang_pp_exif2                  = "per i dati EXIF";
$admin_lang_pp_path                   = "Percorsi";
$admin_lang_pp_imagepath              = "Percorso immagini stimato:";
$admin_lang_pp_imagepath_conf         = "Percorso immagini configurato:";
$admin_lang_pp_img_chmod1             = "La cartella immagini (default: images) &egrave; protetta da scrittura!";
$admin_lang_pp_img_chmod2             = "Devi impostare i permessi corretti per questa cartella o non potrai caricare le immagini.";
$admin_lang_pp_img_chmod3             = "<br /> Imposta la cartella a <b>chmod 777</b> (permessi di lettura, scrittura ed esecuzione per proprietario, gruppo e mondo).";
$admin_lang_pp_img_chmod4             = "Possiamo scrivere nella cartella? SI.";
$admin_lang_pp_img_chmod5             = "La cartella miniature (thumbnails) &egrave; protetta da scrittura!";
$admin_lang_pp_imgfolder              = "Cartella Immagini:";
$admin_lang_pp_thumbfolder            = "Cartella Miniature:";
$admin_lang_pp_langfolder             = "Cartella Lingua:";
$admin_lang_pp_addfolder              = "Cartella Addons:";
$admin_lang_pp_incfolder              = "Cartella Includes:";
$admin_lang_pp_tempfolder             = "Cartella Templates:";
$admin_lang_pp_folder_missing         = "Non Esiste (dovrebbe)";
$admin_lang_pp_ref_log_title          = "Referer negli Ultimi Sette Giorni";
$admin_lang_hostinfo		          = "Informazioni Host";
$admin_lang_fileuploads		          = "Gli <b>Upload</b> al sito Pixelpost sono";
$admin_lang_serversoft		          = "Server Software";
$admin_lang_Pixelpostinfo	          = "Informazioni Pixelpost";
$admin_lang_pp_currversion	          = "Stai utilizzando Pixelpost versione :";

// AddOns
$admin_lang_addon_title              = "Addon Installati";
$admin_lang_failed_addonstatus	     = "Fallito aggiornamento dello stato dell'addon: ";
$admin_lang_addon_off		         = "Click per DISATTIVARLO";
$admin_lang_addon_on		         = "Click per ATTIVARLO";

// Error Messages
$admin_lang_pp_up_error_0            = "Caricamento completato senza errori.";
$admin_lang_pp_up_error_1            = "Superata la dimensione massima del file gestibile dal server web.";
$admin_lang_pp_up_error_2            = "Superata la dimensione massima del file.";
$admin_lang_pp_up_error_3            = "Il file non &egrave; stato caricato completamente.";
$admin_lang_pp_up_error_4            = "Nessun file &egrave; stato caricato.";


// options >> time stamps
$admin_lang_optn_timestamps_title  = "Codici data/ora";
$admin_lang_optn_timestamps_desc   = "L'aggiunta di codici data/ora ai nomi dei file evita la sovrascrittura di immagini con lo stesso nome. <br/>
                                     Utilizzare codici data/ora? ";

// options >> fight spam
$admin_lang_spam            = "CONTROLLO SPAM";
$admin_lang_spam_change     = "Tutte le Liste di Esclusione (Ban List)";
$admin_lang_spam_err_1      = "Errore durante la creazione della tabella banlist: ";
$admin_lang_spam_tableadd   = "La tabella banlist &egrave; aggiunta per combattere lo spam alla radice";
$admin_lang_spam_err_2      = "Errore nell'aggiornamento della lista di moderazione: ";
$admin_lang_spam_err_3      = "Errore nell'aggiornamento della blacklist: ";
$admin_lang_spam_err_4      = "Errore nell'aggiornamento della ban list dei referer: ";
$admin_lang_spam_err_5      = "Errore nell'aggiornamento del numero accettabile di link nei commenti: ";
$admin_lang_spam_upd        = "Aggiornate con successo tutte le ban list";
$admin_lang_spam_err_6      = "Errore nell'aggiornamento dei commenti durante il confronto con la lista di moderazione: ";
$admin_lang_spam_com_upd    = "Passati: i commenti sono confrontati con la lista di moderazione ";
$admin_lang_spam_err_7      = "Errore nella cancellazione dei commenti durante il confronto con la blacklist: ";
$admin_lang_spam_com_del    = "Passati: i commenti che contengono parole/IP presenti in blacklist sono cancellati.";
$admin_lang_spam_err_8      = "Errore nella cancellazione dei visitatori durante il confronto con la ban list dei referer: ";
$admin_lang_spam_visit_del  = "I visitatori con parole/IP presenti nella bad-referer-list sono cancellati.";

// Spam 
$admin_lang_spam_ban        = "Aggiorna le Liste di Esclusione (Ban List)";
$admin_lang_spam_content    = "	Aggiungi liste di parole/IP/nomi da escludere nei box sottostanti, una parola per linea.<br/>\n
				Qualsiasi commento contenente una parola, un indirizzo IP, o un nome presente nella lista di moderazione sar&agrave; inviato alla coda di moderazione.<br/>\n
  				Qualsiasi commento contenente una parola, un indirizzo IP, o un nome presente nella blacklist non otterr&agrave; mai il permesso di entrare nella lista dei commenti.<br/>
  				Qualsiasi visitatore il cui IP sia presente nella <b>Ban List dei Referer</b> o con un indirizzo contenente parole presenti in quella lista\n
				non potr&agrave; accedere al tuo photoblog. (Devi aggiungere il codice fornito al file .htaccess per ottenere questa funzionalit&agrave;!)";
$admin_lang_spam_modlist    = "Lista di Moderazione";
$admin_lang_spam_blacklist  = "Black List";
$admin_lang_spam_reflist    = "Ban List dei Referer";
$admin_lang_spam_blacklist_text = "Copia il codice sottostante (CTRL+A oppure seleziona/CTRL+C in Windows) ed incolla nel file .htaccess del tuo sito per tenere fuori gli spammatori sulla base di IP e referer.";
$admin_lang_spam_htaccess_text = "Prendi il codice .htaccess";
$admin_lang_spam_check_comm  = "Controlla i Commenti Passati";
$admin_lang_spam_del_bad_comm = "Cancella i Commenti Cattivi";
$admin_lang_spam_del_bad_ref = "Cancella i Referer Cattivi";
$admin_lang_spam_updateblacklist = "Aggiorna tutte le Liste di Esclusione";
?>