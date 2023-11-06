<?php
define('HOMEDIR', __DIR__);
date_default_timezone_set('America/Mexico_City');
$page = isset($_GET['page']) ? $_GET['page'] : 'login';
$folder = isset($_GET['folder']) ? $_GET['folder'] : '';

if ($folder === '') {
	include "views/page_data.php";
	include 'views/' . $page . '.php';
	
} else {
	include "views/page_data.php";
	if ($folder === 'usuario'){
		include 'views/header.php';
	
	if($page === 'toolbar') $page='floreria';
	
	include 'views/' . $folder . '/' . $page . '.php';
	include 'views/footer.php';
}else if ($folder === 'users' || $folder === 'email'){
	include 'views/admin/page_data.php';
	include 'views/admin/header.php';
	include 'views/admin/toolbar.php';
	if (isset($_POST['btnSearch'])) {
		$search = true;
		$dataSearch = $_POST['dataSearch'];
	}
include 'views/admin/'.$folder.'/'.$page.'.php';
include 'views/footer.php';
}

}

