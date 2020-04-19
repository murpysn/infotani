<?php
session_start();
if(session_destroy()) // Menghapus Sessions
{
header("Location: ../pages/frontend/login"); // Langsung mengarah ke Home index.php
}
?>
