<?php

require_once('includes/core/init.php');

$session->logout();
redirect_to('index.php');