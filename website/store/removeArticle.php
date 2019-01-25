<?php session_start();

if(isset($_POST['Id_Article']))
{
    $idArticle = $_POST['Id_Article'];
    include("../scripts/setConnexionLocalBDD.php");
    $query = $local_bdd->query("call orleans_bde.spd_delete_article_from_store($idArticle);");
} ?>