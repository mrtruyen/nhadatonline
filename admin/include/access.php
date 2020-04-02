<?php
if (!isset($_SESSION['adminSession'])) {
    @header("location:login.php");
}

