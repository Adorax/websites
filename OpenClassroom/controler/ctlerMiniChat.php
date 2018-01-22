<?php
    require('../model/connectDB.php');
    
    $qMsg = getMessage();
    
    $qNbMsg = getNbMsg();
    
    require('../view/vMiniChat.php');   

