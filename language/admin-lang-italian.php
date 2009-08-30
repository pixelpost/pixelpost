<?php
/*
Pixelpost version 1.7

SVN file version:
$Id: admin-lang-italian.php 450 2007-10-22 00:00:42Z david.kozikowski $

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

VARIABILI PER L'INTERFACCIA DI AMMINISTRAZIONE IN ITALIANO:

Non modificare                    ||      Modificare                                   */

$_lang_file_translator        = 'Cristiano Gazzi (kroom) - <a href="http://www.roomk.it/" target="_blank">www.roomk.it</a>';
$_lang_file_email             = 'unknown';
$_lang_file_rev               = '1.7';

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
$admin_lang_example			  = "Esempio";


// Admin Start
$admin_start_1                = "Non esiste la cartella <b>language</b> oppure il file";
$admin_start_2                = "&egrave; assente in quella cartella.\n<br />Assicurati di aver caricato tutti i file necessari, nominati esattamente come indicato.";
$admin_start_userpw           = "Username o Password errati.";
$admin_start_pw_forgot        = "Hai dimenticato la password?";
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
                                 <br />Inserisci l'indirizzo email che hai indicato nel pannello di amministrazione.
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
$admin_lang_ni_crop_background    = "Questo &egrave; lo sfondo dell'immagine da ritagliare";
$admin_lang_ni_post_exif_date     = "Usa la data exif";
$admin_lang_ni_db_error           = "si &egrave; verificato un errore durante la scrittura nel database";
$admin_lang_ni_tags               = "Tags";
$admin_lang_ni_tags_desc          = "(usare virgola, punto e virgola o spazio per separare i tag; utilizzare il trattino o il trattino basso per tenere unite le parole)";
$admin_lang_ni_alt_language				= "Inserire titolo immagine e descrizione nella lingua alternativa";

// Images
$admin_lang_imgedit_edit           = "Modifica";
$admin_lang_imgedit_title          = "Titolo:";
$admin_lang_imgedit_alttitle          		= "Titolo Alt.:";
$admin_lang_imgedit_file_name      = "Nome file:";
$admin_lang_imgedit_dimensions     = "Dimensioni:";
$admin_lang_imgedit_tbpublished    = "Da pubblicare:";
$admin_lang_imgedit_category_plural = "Categorie:";
$admin_lang_imgedit_delete          = "Cancella";
$admin_lang_imgedit_deleted         = "Rimozione post&nbsp;/&nbsp;cancellazione immagine&nbsp;/&nbsp;cancellazione miniatura";
$admin_lang_imgedit_deleted1        = "Post cancellato.";
$admin_lang_imgedit_deleted2        = "Immagine cancellata.";
$admin_lang_imgedit_delete_error    = "Impossibile cancellare l'immagine.\n
                                       Devi farlo in altro modo, ad esempio con un programma FTP.";
$admin_lang_imgedit_deleted3        = "Miniatura cancellata.";
$admin_lang_imgedit_delete_error2   = "Impossibile cancellare la miniatura.\n
                                       Devi farlo in altro modo, ad esempio con un programma FTP.";
$admin_lang_imgedit_reupimg         = "Ricarica Immagine:";
$admin_lang_imgedit_file            = "Il file: ";
$admin_lang_imgedit_file_isuploaded = "&egrave; stato ricaricato!";
$admin_lang_imgedit_update          = "Aggiornamento immagine";
$admin_lang_imgedit_updated         = "Immagine aggiornata";
$admin_lang_imgedit_txt_desc        = "Testo/descrizione:";
$admin_lang_imgedit_dtime           = "Data e ora:";
$admin_lang_imgedit_img             = "Immmagine:";
$admin_lang_imgedit_fsize           = "Dimensione file:";
$admin_lang_imgedit_12cropimg       = "Strumento CropImage:";
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
$admin_lang_imgedit_tags_edit       = "Tag (usare virgola, punto e virgola o spazio per separare i tag; utilizzare il trattino o il trattino basso per tenere unite le parole):";
$admin_lang_imgedit_alt_language    = "Cambia titolo immagine e descrizione per la lingua alternativa";
$admin_lang_imgedit_masstag         = "Aggiungi/rimuovi tag alle immagini selezionate";
$admin_lang_imgedit_masstag_set     = "Aggiungi uno o pi&ugrave; tag";
$admin_lang_imgedit_masstag_set2    = "Aggiungi uno o pi&ugrave; tag per la lingua alternativa";
$admin_lang_imgedit_masstag_unset   = "Rimuovi tag";
$admin_lang_imgedit_published          = "Pubblicato";
$admin_lang_imgedit_unpublished_cmnts  = "immagini precedentemente nascoste.";

// Mass-Edit Categories
$admin_lang_imgedit_mass_1          = "Modifica in massa categoria";
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
$admin_lang_cmnt_check_all          			= "Seleziona/Deseleziona in Massa";
$admin_lang_cmnt_invert_checks      = "Inverti selezioni";
$admin_lang_cmnt_del_selected       = "Cancella selezionati";
$admin_lang_cmnt_page               = "commenti per pagina.";
$admin_lang_cmnt_commenter          = "Commento fatto:";
$admin_lang_cmnt_ip                 = "Indirizzo IP:";
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
$admin_lang_cmnt_submenu1									= "COMMENTI";
$admin_lang_cmnt_submenu2									= "IN ATTESA DI MODERAZIONE";


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
$admin_lang_optn_sub_title         = "Sottotitolo:";
$admin_lang_optn_url               = "URL:";
$admin_lang_optn_usr_pss           = "UTENTE AMMINISTRATORE &amp; PASSWORD";
$admin_lang_optn_usr_pss_txt       = "Cambiare username o password?";
$admin_lang_optn_usr               = "User:";
$admin_lang_optn_pss               = "Password:";
$admin_lang_optn_pss_re            = "Conferma Password:";
$admin_lang_optn_email             = "EMAIL AMMINISTRATORE";
$admin_lang_optn_fillit            = "Compilalo. Servir&agrave; per il recupero password.";
$admin_lang_optn_img_path          = "PERCORSO IMMAGINI & MINIATURE";
$admin_lang_optn_tz                = "FUSO ORARIO";
$admin_lang_optn_tz_txt            = "Seleziona il fuso orario della tua localit&agrave;.";
$admin_lang_optn_sendemail         = "NOTIFICA EMAIL DEI COMMENTI";
$admin_lang_optn_sendemail_txt     = "Desideri la notifica via email dei commenti?";
$admin_lang_optn_sendemail_html_txt = "utilizzare HTML nella email di notifica?";
$admin_lang_optn_switch_template       = "CAMBIA TEMPLATE";
$admin_lang_optn_lang_file             = "FILE DELLA LINGUA";
$admin_lang_optn_lang_file_admin          = "FILE DELLA LINGUA PER IL PANNELLO DI AMMINISTRAZIONE";
$admin_lang_optn_dateformat            = "FORMATO DELLA DATA";
$admin_lang_optn_dateformat_txt        = "Il formato di visualizzazione per immagini e commenti. La sintassi usata &egrave; identica a quella della funzione <a href='http://www.php.net/date' target='_blank'>date()</a> di PHP. <br \>Ecco alcuni esempi di cosa sostituisce alcuni comuni parametri: Y:anno m:mese d:giorno H:ora i:minuti s:secondi";
$admin_lang_optn_gmt                   = "Il supporto all'ora legale non &egrave; automatico, devi agire manualmente.<br />Controlla su <a href='http://www.worldtimeserver.com/current_time_in_UTC.aspx' target='__blank'> UTC Current time </a> se non conosci il tuo fuso orario rispetto al UTC.<br />";
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
$admin_lang_optn_thumb_sharp              = "NITIDEZZA MINIATURE";
$admin_lang_optn_thumb_sharp_txt          = "Che livello di nitidezza desideri per le miniature?";
$admin_lang_optn_thumb_sharp0             = 'Nessun intervento';
$admin_lang_optn_thumb_sharp1             = 'Leggero';
$admin_lang_optn_thumb_sharp2             = 'Medio';
$admin_lang_optn_thumb_sharp3             = 'Alto';
$admin_lang_optn_thumb_sharp4             = 'Ultra-Alto';
$admin_lang_optn_pass_chngd_txt        = "La password &egrave; cambiata.";
$admin_lang_optn_pass_notchngd_txt     = "La password non &egrave; cambiata. Digita la stessa password nel campo di conferma.";
$admin_lang_optn_title_url_text        = "Controlla o modifica il titolo del Sito e la URL della tua installazione";
$admin_lang_optn_thumb_updated         = "Miniature aggiornate!";
$admin_lang_optn_updated               = "miniature aggiornate.";
$admin_lang_optn_visitorbooking_title  = 'Registra visitatori';
$admin_lang_optn_visitorbooking_desc   = 'Vuoi che Pixelpost memorizzi informazioni per ogni visitatore?';
$admin_lang_optn_upd_done              = "Aggiornamento eseguito.";
$admin_lang_optn_upd_error            = "Errore durante Aggiornamento.";
$admin_lang_optn_upd_lang_error			  = "La lingua alternativa selezionata &egrave; uguale a quella di default.<br />La cosa non ha senso, quindi scegli una diversa lingua alternativa o disabilita la lingua alternativa.";
$admin_lang_optn_markdown              = "Abilita Markdown";
$admin_lang_optn_markdown_desc         = "Vuoi che Pixelpost abiliti Markdown feature nella descrizione immagine?";
$admin_lang_optn_exif			            = "Abilita Exif";
$admin_lang_optn_exif_desc		        = "Vuoi che Pixelpost abiliti le funzioni Exif sulla pagina principale?";
$admin_lang_optn_token			          = "Abilita i token nei form";
$admin_lang_optn_token_desc		        = "L'utilizzo dei token riduce la possibilità di attacco di tipo <a href=\"http://en.wikipedia.org/wiki/Cross-site_request_forgery\">Cross-Site Request Forgeries</a>.<br/><br/>\n
																				 Attivando questa impostazione i commenti sono salvati solo quando il token del form corrisponde a quello nella sessione utente. Per implementare questa funzione devi aggiungere <strong>&lt;TOKEN&gt;</strong> al template dei commenti da qualche parte tra i tag <strong><i>&lt;form&gt;...&lt;/form&gt;</i></strong>.
																				 If you forget the <strong>&lt;TOKEN&gt;</strong> tag commenting will not work anymore and the user is presented with an error message.<br /><br/>\n
																				 Abilitare questa impostazione?";
$admin_lang_optn_token_time						= "Intervallo massimo in minuti tra l'apertura della finestra per i commenti e la possibilit&agrave; di inviare commenti: ";
$admin_lang_optn_token_error					= "Attenzione: valori inferiori ad 1 minuto per la durata del Token non sono possibili. La durata del Token &egrave; stata impostata ad 1 minuto.";
$admin_lang_optn_dsbl_list 						= "Impostazione per la lista Distributed Sender Blackhole List (http://www.dsbl.org)";
$admin_lang_optn_dsbl_list_desc 			= "La lista <a href=\"http://www.dsbl.org\" target=\"_blank\">Distributed Sender Blackhole List</a> contiene gli indirizzi IP dei server che sono in open relay, open proxy o presentano altre vulnerabilit&agrave;. Questi server sono spesso sfruttati dagli SPAMMERS per l'invio di e-mail ma sono anche utilizzati per l'invio di commenti.<br /> <br />
																				 Should the comment IP address be checked against the Distributed Sender Blackhole List?";
$admin_lang_optn_time_between_comments = "Prevenzione degli SPAM flood";
$admin_lang_optn_time_between_comments_desc = "Numero di secondi prima di poter inviare un nuovo commento (prevenzione flood): ";
$admin_lang_optn_max_uri_comment			= "MASSIMO NUMERO DI URI";
$admin_lang_optn_max_uri_comment_desc = "Numero di URI consentite in ciascun commento: ";


$admin_lang_optn_comment_setting 		   = "IMPOSTAZIONI GLOBALI PER I COMMENTI";
$admin_lang_optn_comment_setting2			 = "Impostazione commenti";
$admin_lang_optn_cmnt_mod_txt          = "Azione predefinita per i commenti: ";
$admin_lang_optn_cmnt_mod_txt2         = "Azione per i commenti:";
$admin_lang_optn_cmnt_mod_allowed		   =	"Pubblica subito";
$admin_lang_optn_cmnt_mod_moderation   =	"Invia alla coda di moderazione";
$admin_lang_optn_cmnt_mod_forbidden	   =	"Disabilita i commenti";
$admin_lang_optn_rss_setting					= "Impostazioni per i feed RSS/ATOM";
$admin_lang_optn_rss_title  					= "Titolo feed";
$admin_lang_optn_rss_desc   					= "Descrizione feed";
$admin_lang_optn_rss_copyright					= "Copyright feed";
$admin_lang_optn_rss_discovery					= "Ricerca feed";
$admin_lang_optn_rss_opt_both					= "RSS &amp; ATOM";
$admin_lang_optn_rss_opt_rss					= "RSS";
$admin_lang_optn_rss_opt_atom					= "ATOM";
$admin_lang_optn_rss_opt_ext					= "Esterno";
$admin_lang_optn_rss_opt_none					= "Nessuno";
$admin_lang_optn_rss_ext_type					= "Tipo di feed esterno";
$admin_lang_optn_rss_ext						= "Feed esterno";
$admin_lang_optn_rss_enable_comment_feed		= "Abilita i comment feed";
$admin_lang_optn_rsstype_desc					= "Sleziona lo stile del feed RSS/ATOM:";
$admin_lang_optn_rss_full							= "Mostra immagini a grandezza piena";
$admin_lang_optn_rss_thumbs						= "Mostra miniature";
$admin_lang_optn_rss_thumbs_only					= "Mostra solo miniature";
$admin_lang_optn_rss_full_only						= "Mostra solo immagini a grandezza piena";
$admin_lang_optn_rss_text							= "Mostra solo testo";
$admin_lang_optn_feeditems_desc				= "Numero di voci nella feedlist: ";
$admin_lang_optn_lang                  = "Impostazioni lingua base: ";
$admin_lang_optn_alt_lang             = "Impostazioni lingua alternativa: ";
$admin_lang_optn_alt_lang_dis         = "disabilitato";
$admin_lang_optn_alt_lang_no          = "disabilitato";
$admin_lang_optn_img_display						="ORDINE VISUALIZZAZIONE IMMAGINI";
$admin_lang_optn_img_display_desc				="Seleziona il tipo diordinamento per la visualizzazione. Ordina secondo: ";
$admin_lang_optn_img_display_default		="ordine discendente";
$admin_lang_optn_img_display_reversed		="ordine ascendente";


// Info
$admin_lang_info_gd                   = "Non installato, chiedi all'Amministratore del tuo host di installarlo!";
$admin_lang_info_gd_jpg               = "con supporto JPEG";
$admin_lang_pp_version1               = "Ultima versione di Pixelpost:";
$admin_lang_pp_forum                  = "Se cerchi aiuto o vuoi esprimere opinioni, vai sul forum di Pixelpost";
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
$admin_lang_pp_currversion	          = "Stai utilizzando Pixelpost versione:";
$admin_lang_pp_check                 = "Verifica";
$admin_lang_pp_sess_path             = "Percorso per il salvataggio della sessione";
$admin_lang_pp_sess_path_emp         = "&egrave; vuoto";
$admin_lang_pp_fileupload_np         = 'NON possibile! Controlla la variabile file_upload nel file php.ini!';
$admin_lang_pp_fileupload_p          = 'possibile.';
$admin_lang_pp_langs                 = 'Traduzioni di Pixelpost';
$admin_lang_pp_lng_fname             = 'Nome file';
$admin_lang_pp_lng_author            = 'Autore';
$admin_lang_pp_lng_ver               = 'Versione';
$admin_lang_pp_lng_email             = 'Email';
$admin_lang_pp_newest_ver            = 'Hai la versione pi&ugrave; recente di Pixelpost!';
$admin_lang_pp_thumbnailpath 				 = "Percorso miniature stimato";
$admin_lang_pp_thumbnailpath_conf 	 = "Percorso miniature configurato"; 

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
$admin_lang_pp_up_error_6            = "Manca una cartella temporanea.";
$admin_lang_pp_up_error_7            = "Non sono riuscito a scrivere il file su disco.";
$admin_lang_pp_addon_error								= "Pixelpost non &egrave; in grado di leggere il file dell'addon. Controllare i permessi chmod e cambiarli in 755";

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

?>