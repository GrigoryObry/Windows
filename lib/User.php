<?php
/**
 * Класс пользователя
 */
class User {
    private $dbh;
 
    function __construct($dbh) {
      $this->dbh = $dbh;
    }
 
    public function register($fields) {
		try {
			$password = password_hash($fields['password'], PASSWORD_DEFAULT);

			$stmt = $this->dbh->prepare("INSERT INTO user(name, email, password) 
													   VALUES(:name, :email, :password)");
			  
			$stmt->bindparam(":name", $fields['name']);
			$stmt->bindparam(":email", $fields['email']);
			$stmt->bindparam(":password", $password);            
			$stmt->execute(); 

			return $stmt; 
		} catch(PDOException $e) {
			echo $e->getMessage();
		}    
    }
 
    public function login($fields) {
		try {
			$stmt = $this->dbh->prepare("SELECT * FROM user WHERE email=:email LIMIT 1");
			$stmt->execute(array(
				':email' => $fields['email']
			));
			$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
			
			if($stmt->rowCount() > 0) {
				if(password_verify($fields['password'], $userRow['password'])) {
					$_SESSION['user_session'] = $userRow['id'];
					$_SESSION['user']['name'] = $userRow['name'];
					$_SESSION['user']['email'] = $userRow['email'];
					return true;
				} else {
					return false;
				}
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
    }
 
	public function isLoggedin() {
		if(isset($_SESSION['user_session'])) {
			return true;
		}
	}
	
	public function getId() {
		if(isset($_SESSION['user_session'])) {
			return $_SESSION['user_session'];
		} else {
			return false;
		}
	}
	
	public function getName() {
		if(isset($_SESSION['user_session'])) {
			return $_SESSION['user']['name'];
		}
	}

	public function getEmail() {
		if(isset($_SESSION['user_session'])) {
			return $_SESSION['user']['email'];
		}
	}
 
	public function redirect($url) {
	   header("Location: $url");
	}
 
   public function logout()
   {
		session_destroy();
        unset($_SESSION['user_session']);
        unset($_SESSION['user']);
        return true;
   }
}