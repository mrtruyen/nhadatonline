<?php
if (!isset($_SESSION['adminSession_avoy'])) {
    @header("location:login.php");
}

