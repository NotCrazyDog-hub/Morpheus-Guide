<?php
if (!isset($_SESSION['id_usuario'])) {
    header('Location: ../index.php');
    exit;
}
