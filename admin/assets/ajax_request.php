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
    $datetime = date(trim($_GET['format']));
    
    echo '<span class="notice tiny">'.$datetime.'</span>';
}

?>