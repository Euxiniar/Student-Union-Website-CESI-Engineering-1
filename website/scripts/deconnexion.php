<?php

if (isset($_SESSION)) {
    session_destroy();
    $_SESSION = null;
}
echo $_SESSION;

?>
