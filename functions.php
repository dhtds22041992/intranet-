<html><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Funçoes</title>
</head>
<body>
<?php

function getAvisos($user_id){
	$connection = connection_checker();
	// CHECA SE A SENHA DO USUARIO É PROVISÓRIA
	$query = "SELECT senha_prov FROM users WHERE user_id = '{$user_id}'";
	$result = mysqli_query($connection, $query);
	if (mysqli_num_rows($result) > 0){
		$array_avisos = array();
		$result = mysqli_fetch_array($result)[0];
		if ($result == "1"){
			$array_avisos[] = "Ei! Não esqueca de trocar sua senha, <br/><a href='#' id='trocarSenha'> Clique aqui para fazer isso já! </a>";
		}
	}
	return $array_avisos;
}

// verifica se o banco existe
function connection_checker() {
	$connection = mysqli_connect('localhost', 'root', '', 'localhost');
	if ( mysqli_connect_error() ) {
		//echo '<h1> Algo está errado =\ </h1> <p>' . mysqli_connect_error() . '<br/>Verifique o servior MySQL </p>';
		die("Connection failed: " . mysqli_connect_error());
	} else {
		return $connection;
	}

}

function getUserType($id){
	$connection = connection_checker();
	$query = "SELECT user_tipo FROM users WHERE user_id = '{$id}'";
	$result = mysqli_query($connection, $query);
	if (mysqli_num_rows($result) > 0){
		return mysqli_fetch_array($result);;
	} else {
		return "erro";
	}
}

function getBotoes($id){
	$user_type = getUserType($id)[0];
	$result = [];
	$result[] = '<ul class="botoes">';
	$result[] = '<li><a   href="home.php"><div class="button inicio">Início</div></a></li>';
	switch ($user_type){
		case "admin":
			$result[] = '<li><a   href="form_cadastrar.php"><div class="button cadastrar">Cadastrar usuário</div></a></li>';
			$result[] = '<li><a   href="list_users.php"><div class="button usuarios">Usuários</div></a></li>';
			break;
		case "professor":
			$result[] = '<li><a   href="form_cadastrar_aluno.php"><div class="button cadastrar-aluno">Cadastrar Aluno</div></a></li>';
			$result[] = '<li><a   href="calendario.php"><div class="button calendario">Meu calendario</div></a></li>';
			$result[] = '<li><a   href="list_users.php"><div class="button meus-alunos">Meus Alunos</div></a></li>';
			break;
		case "aluno":
			$result[] = '<li><a   href="calendario.php"><div class="button calendario">Meu calendario</div></a></li>';

			break;
	}
	$result[] = '<li><a   href="arquivos.php"><div class="button arquivos">Arquivos</div></a></li>';
	$result[] = '<li><a   href="ajustes.php"><div class="button ajustes">Ajustes</div></a></li>';
	$result[] = '<li><a   href="sair.php"><div class="sair" style="color: white;"> Sair </div></a></li>';

	$result[] = '</ul>';
	return $result;
}

function stringAleatoria($length = 8) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

function existeUsuario($user, $email){
	if (mysqli_num_rows(mysqli_query(connection_checker(), "SELECT user_id FROM users WHERE username = '{$user}' AND email = '{$email}'")) > 0){
		return 3; // ambos
	}
	if (mysqli_num_rows(mysqli_query(connection_checker(), "SELECT user_id FROM users WHERE email = '{$email}'")) > 0){
		return 2; // email
	}
	if (mysqli_num_rows(mysqli_query(connection_checker(), "SELECT user_id FROM users WHERE username = '{$user}'")) > 0){
		return 1; //username
	}
	return 0;
}
function get_file_ext($mime_type){
	$mime_types = array(
		'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx', 'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx', 'application/postscript' => 'ai', 'audio/x-aiff' => 'aif', 'audio/x-aiff' => 'aifc', 'audio/x-aiff' => 'aiff', 'text/plain' => 'asc', 'application/atom+xml' => 'atom', 'audio/basic' => 'au', 'video/x-msvideo' => 'avi', 'application/x-bcpio' => 'bcpio', 'application/octet-stream' => 'bin', 'image/bmp' => 'bmp', 'application/x-netcdf' => 'cdf', 'image/cgm' => 'cgm', 'application/octet-stream' => 'class', 'application/x-cpio' => 'cpio', 'application/mac-compactpro' => 'cpt', 'application/x-csh' => 'csh', 'text/css' => 'css', 'text/csv' => 'csv', 'application/x-director' => 'dcr', 'application/x-director' => 'dir', 'image/vnd.djvu' => 'djv', 'image/vnd.djvu' => 'djvu', 'application/octet-stream' => 'dll', 'application/octet-stream' => 'dmg', 'application/octet-stream' => 'dms', 'application/msword' => 'doc', 'application/xml-dtd' => 'dtd', 'application/x-dvi' => 'dvi', 'application/x-director' => 'dxr', 'application/postscript' => 'eps', 'text/x-setext' => 'etx', 'application/octet-stream' => 'exe', 'application/andrew-inset' => 'ez', 'image/gif' => 'gif', 'application/srgs' => 'gram', 'application/srgs+xml' => 'grxml', 'application/x-gtar' => 'gtar', 'application/x-hdf' => 'hdf', 'application/mac-binhex40' => 'hqx', 'text/html' => 'htm', 'text/html' => 'html', 'x-conference/x-cooltalk' => 'ice', 'image/x-icon' => 'ico', 'text/calendar' => 'ics', 'image/ief' => 'ief', 'text/calendar' => 'ifb', 'model/iges' => 'iges', 'model/iges' => 'igs', 'image/jpeg' => 'jpe', 'image/jpeg' => 'jpeg', 'image/jpeg' => 'jpg', 'application/x-javascript' => 'js', 'application/json' => 'json', 'audio/midi' => 'kar', 'application/x-latex' => 'latex', 'application/octet-stream' => 'lha', 'application/octet-stream' => 'lzh', 'audio/x-mpegurl' => 'm3u', 'application/x-troff-man' => 'man', 'application/mathml+xml' => 'mathml', 'application/x-troff-me' => 'me', 'model/mesh' => 'mesh', 'audio/midi' => 'mid', 'audio/midi' => 'midi', 'application/vnd.mif' => 'mif', 'video/quicktime' => 'mov', 'video/x-sgi-movie' => 'movie', 'audio/mpeg' => 'mp2', 'audio/mpeg' => 'mp3', 'video/mpeg' => 'mpe', 'video/mpeg' => 'mpeg', 'video/mpeg' => 'mpg', 'audio/mpeg' => 'mpga', 'application/x-troff-ms' => 'ms', 'model/mesh' => 'msh', 'video/vnd.mpegurl' => 'mxu', 'application/x-netcdf' => 'nc', 'application/oda' => 'oda', 'application/ogg' => 'ogg', 'image/x-portable-bitmap' => 'pbm', 'chemical/x-pdb' => 'pdb', 'application/pdf' => 'pdf', 'image/x-portable-graymap' => 'pgm', 'application/x-chess-pgn' => 'pgn', 'image/png' => 'png', 'image/x-portable-anymap' => 'pnm', 'image/x-portable-pixmap' => 'ppm', 'application/vnd.ms-powerpoint' => 'ppt', 'application/postscript' => 'ps', 'video/quicktime' => 'qt', 'audio/x-pn-realaudio' => 'ra', 'audio/x-pn-realaudio' => 'ram', 'image/x-cmu-raster' => 'ras', 'application/rdf+xml' => 'rdf', 'image/x-rgb' => 'rgb', 'application/vnd.rn-realmedia' => 'rm', 'application/x-troff' => 'roff', 'application/rss+xml' => 'rss', 'text/rtf' => 'rtf', 'text/richtext' => 'rtx', 'text/sgml' => 'sgm', 'text/sgml' => 'sgml', 'application/x-sh' => 'sh', 'application/x-shar' => 'shar', 'model/mesh' => 'silo', 'application/x-stuffit' => 'sit', 'application/x-koan' => 'skd', 'application/x-koan' => 'skm', 'application/x-koan' => 'skp', 'application/x-koan' => 'skt', 'application/smil' => 'smi', 'application/smil' => 'smil', 'audio/basic' => 'snd', 'application/octet-stream' => 'so', 'application/x-futuresplash' => 'spl', 'application/x-wais-source' => 'src', 'application/x-sv4cpio' => 'sv4cpio', 'application/x-sv4crc' => 'sv4crc', 'image/svg+xml' => 'svg', 'image/svg+xml' => 'svgz', 'application/x-shockwave-flash' => 'swf', 'application/x-troff' => 't', 'application/x-tar' => 'tar', 'application/x-tcl' => 'tcl', 'application/x-tex' => 'tex', 'application/x-texinfo' => 'texi', 'application/x-texinfo' => 'texinfo', 'image/tiff' => 'tif', 'image/tiff' => 'tiff', 'application/x-troff' => 'tr', 'text/tab-separated-values' => 'tsv', 'text/plain' => 'txt', 'application/x-ustar' => 'ustar', 'application/x-cdlink' => 'vcd', 'model/vrml' => 'vrml', 'application/voicexml+xml' => 'vxml', 'audio/x-wav' => 'wav', 'image/vnd.wap.wbmp' => 'wbmp', 'application/vnd.wap.wbxml' => 'wbxml', 'text/vnd.wap.wml' => 'wml', 'application/vnd.wap.wmlc' => 'wmlc', 'text/vnd.wap.wmlscript' => 'wmls', 'application/vnd.wap.wmlscriptc' => 'wmlsc', 'model/vrml' => 'wrl', 'image/x-xbitmap' => 'xbm', 'application/xhtml+xml' => 'xht', 'application/xhtml+xml' => 'xhtml', 'application/vnd.ms-excel' => 'xls', 'application/xml' => 'xml', 'image/x-xpixmap' => 'xpm', 'application/xml' => 'xsl', 'application/xslt+xml' => 'xslt', 'application/vnd.mozilla.xul+xml' => 'xul', 'image/x-xwindowdump' => 'xwd', 'chemical/x-xyz' => 'xyz', 'application/zip' => 'zip',


	);
	if (!array_key_exists($mime_type, $mime_types)){
		return "outro";
	}else{
		return $mime_types[$mime_type];
	}

}



?>
</body>
</html></html>
