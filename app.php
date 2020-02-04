<?php
    session_start();
    
    require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/database.php");
    require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/select.php");
    require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/TreeMenu.php");
    require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/wndType.php");
    require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/User.php");
    
    $user = new User($dbh);
    $treeMenu = new treeMenu($dbh);
    $SelectMenu = new SelectMenu($dbh);
    $wndMenu = new wndMenu($dbh);

?>