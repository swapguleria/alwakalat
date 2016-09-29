<?php 
include 'database.php';
$pages_content				=	$obj->get_single_result('pages','pages_slug',$_GET['page']);
$pages_title				=	$pages_content['pages_name'];
$pages_meta_title			=	$pages_content['pages_meta_title'];
$pages_meta_description		=	$pages_content['pages_meta_description'];
$pages_meta_keywords		=	$pages_content['pages_meta_keywords'];
include 'header.php'; 
?>