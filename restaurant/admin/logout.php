<?php

include('../config/constants.php');

//destroy session
session_destroy();

//redirected to login page
header('location:'.SITEURL.'home.php');




?>