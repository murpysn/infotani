<?php
session_start();
if(session_destroy()) // Menghapus Sessions
{
header("Location: index_login"); // Langsung mengarah ke Home index.php
}
?>