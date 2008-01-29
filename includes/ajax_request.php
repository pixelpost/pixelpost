<?php

// SVN file version:
// $Id$

if(isset($_GET['request']) AND $_GET['request'] == 'dateformat')
{
    /**
     * Send back the AJAX request for a formated PHP datetime string.
     * Request originates from:
     * admin >> options >> template >> DATE FORMAT
     *
     */
    $datetime = date(addslashes($_GET['format']));
    $datetime = stripslashes($datetime);
    
    echo 'df_preview|'.$datetime;
}

?>