<?php

class Users_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function getUser($userName = null)
	{
		if ($userName == null) {
			$sql = 'SELECT * FROM visagelivre._user;';
			$query = $this->db->query($sql);

		} else {
			$sql = 'SELECT * FROM visagelivre._user WHERE nickname = ?';
			$query = $this->db->query($sql, array($userName));

		}
		return $query->result_array();
	}

	public function setUserByEmail($email)
	{
		$sql = 'SELECT nickname, email FROM visagelivre._user WHERE email = ?';
		$query = $this->db->query($sql, array($email));

		return $query->result_array();
	}

	public function confirmConnect()
	{

		$connection = true;

		$sql = 'SELECT * FROM visagelivre._user WHERE pass = ? AND email = ?';
		echo password_hash($_POST['inputPassword'], PASSWORD_DEFAULT) . $_POST['inputEmail'];
		$query = $this->db->query($sql, array(md5($_POST['inputPassword']), $_POST['inputEmail']));

		if (empty($query->result_array())) {
			$connection = false;
			print_r($query->result_array());
		} else {
			print_r($tab = $this->setUserByEmail($_POST['inputEmail']));
			$_SESSION['user']['nickname'] = $tab[0]['nickname'];
			$_SESSION['user']['email'] = $tab[0]['email'];
		}

		return $connection;
	}


	public function addUser($userName, $userPass, $userEmail)
	{
		$data = array(
			'nickname' => $userName, // Argument given to the method
			'pass' => md5($userPass), // Argument given to the method
			'email' => $userEmail // Argument given to the method
		);
		return $this->db->insert('_user', $data);
		// produce ' INSERT INTO todo ( title ) VALUES (...) ;'
	}



	public function getPostByUser($nickname){

		$sql = 'SELECT * FROM post NATURAL JOIN visagelivre._user WHERE nickname = ?';

		$query = $this->db->query($sql, array($nickname));

		$dataReturned = $query->result_array();

		return $dataReturned;
	}
    
    
	public function getCommentByIdPost($idPost){

		$sql = 'SELECT commentaires(?);';

		$query = $this->db->query($sql, array($idPost));

		$dataReturned = $query->result_array();

		return $dataReturned;
	}
    
    
    
    
    
    public function addPost($content, $nickname){

		$sql = 'INSERT INTO post (content, auteur) VALUES (?, ?)';

		$query = $this->db->query($sql, array($content, $nickname));
	}

    
    
    
    public function addComment($content, $nickname, $ref){

		$sql = 'INSERT INTO vu_comment (content, auteur, ref) VALUES (?, ?, ?)';

		$query = $this->db->query($sql, array($content, $nickname, $ref));
	}
    
    
    
    
    
	public function getFriends($nickname){

		$sql = 'SELECT * FROM visagelivre._friendof WHERE nickname = ?';

		$query = $this->db->query($sql, array($nickname));

		$dataReturned = $query->result_array();

		return $dataReturned;
	}
    
    
       
	public function getFriendsRequestToUser($nickname){

		$sql = 'SELECT * FROM visagelivre._friendrequest WHERE target = ?';

		$query = $this->db->query($sql, array($nickname));

		$dataReturned = $query->result_array();

		return $dataReturned;
	}
    
    
        
	public function addFriendsRequestToUser($nickname, $target){

		$sql = 'INSERT INTO visagelivre._friendrequest (nickname, target) VALUES (?, ?) ';

		$query = $this->db->query($sql, array($nickname, $target));

		$dataReturned = $query->result_array();

		return $dataReturned;
	}
    
    
    
    
    
    
    
    
       
	public function getFriendsRequestFromUser($nickname){

		$sql = 'SELECT * FROM visagelivre._friendrequest WHERE nickname = ?';

		$query = $this->db->query($sql, array($nickname));

		$dataReturned = $query->result_array();

		return $dataReturned;
	}
    
    
    
           
	public function getUnknownUser($nickname){

		$sql = 'SELECT * FROM visagelivre._user LEFT JOIN visagelivre._friendof on visagelivre._user.nickname = visagelivre._friendof.nickname LEFT JOIN visagelivre._friendrequest on visagelivre._friendrequest.nickname = visagelivre._friendof.nickname EXCEPT (SELECT * FROM visagelivre._user LEFT JOIN visagelivre._friendof on visagelivre._user.nickname = visagelivre._friendof.nickname LEFT JOIN visagelivre._friendrequest on visagelivre._friendrequest.nickname = visagelivre._friendof.nickname WHERE target = ? OR visagelivre._user.nickname != ? OR friend != ?);';

		$query = $this->db->query($sql, array($nickname, $nickname, $nickname));

		$dataReturned = $query->result_array();

		return $dataReturned;
	}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

?>
