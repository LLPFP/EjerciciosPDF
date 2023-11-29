<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
    
mysqli_select_db($db, 'poems') or die(mysqli_error($db));

//create the reviews table
$query = 'CREATE TABLE users (
        user_id         INTEGER(11) UNSIGNED    NOT NULL, 
        first_name      VARCHAR(50)             NOT NULL, 
        last_name       VARCHAR(50)             NOT NULL, 
        email           VARCHAR(100)            NOT NULL, 
        username        VARCHAR(30)             NOT NULL, 
        pass_phrase     VARCHAR(500)            NOT NULL, 
        is_admin        TINYINT(4) UNSIGNED     NOT NULL  DEFAULT 0, 
        date_registered DATETIME                NOT NULL, 
        profile_pic     VARCHAR(30)             NOT NULL, 
        registration_confirmed TINYINT(4) UNSIGNED  NOT NULL  DEFAULT 0, 

        KEY (user_id)
    )
    ENGINE=MyISAM';
mysqli_query($db, $query) or die (mysqli_error($db));



$query2 = 'CREATE TABLE poems(

        poems_id        INTEGER(11) UNSIGNED    NOT NULL, 
        title           VARCHAR(200)            NOT NULL, 
        poem            TEXT                    NOT NULL, 
        date_submitted  VARCHAR(100)            NOT NULL, 
        username        VARCHAR(30)             NOT NULL, 
        date_approved   DATETIME                NOT NULL
        

        KEY (poems_id)

    )
    ENGINE=MyISAM';
mysqli_query($db, $query2) or die (mysqli_error($db));

?>