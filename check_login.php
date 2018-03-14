<?php
	require_once ('modele/Dal/PdoDao.class.php');
	
	function checkLogin($pseudo, $mdp) {
		$cnx = new PdoDao();
		$qry = 'CALL sp_checkLogin(?)';
		$res = $cnx->getRows($qry,array($pseudo),0);
		if (is_a($res,'PDOException')) {
			return PDO_EXCEPTION_VALUE;
		}
		elseif(empty($res)){
			return 0;
		}
		else{
			$user = $res[0];
			$hash = $user['mdp'];
			if(password_verify($mdp, $hash)){
				return $user;
			}
			else{
				return 0;
			}
		}
	} 	
	
	if(isset($_POST['id']) and isset($_POST['pw'])){
		$login = $_POST['id'];
		$pass = $_POST['pw'];
		$check = checkLogin($login, $pass);
		if(empty($check)){
			echo '<script>document.location.href="/Login"</script>';
		}
		else{
			$_SESSION['login'] = $check['pseudo'];
			$_SESSION['role'] = $check['role'];
			echo '<script>document.location.href="/"</script>';
		}
	}
	else{
			echo '<script>document.location.href="/Login"</script>';
	}
?>