<?php
require('controller/backend.php');

try {
        listContent();

}

catch(Exception $e) {
    $errorMessage = $e->getMessage();
}


