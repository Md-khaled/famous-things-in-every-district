<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
 ?>
<?php 
class User{
	private $db;
	private $fm;
	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();	

	}
	public function userRegtration($data){
		$name=mysqli_real_escape_string($this->db->link,$data['name']);
		$address=mysqli_real_escape_string($this->db->link,$data['address']);
		$city=mysqli_real_escape_string($this->db->link,$data['city']);
		$country=mysqli_real_escape_string($this->db->link,$data['country']);
		$zip=mysqli_real_escape_string($this->db->link,$data['zip']);
		$phone=mysqli_real_escape_string($this->db->link,$data['phone']);
		$email=mysqli_real_escape_string($this->db->link,$data['email']);
		$password=mysqli_real_escape_string($this->db->link,md5($data['password']));
		$typeofuser="General";
		if ($name==""||$address==""||$city==""||$country==""||$zip==""||$phone==""||$email==""||$password=="") {
			$msg= "<span class='error'> field must not be empty </span>";
			return $msg;
          }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		 	$msg="Invalid Email Address!";
		 	return $errmsgor;
		 }elseif (!preg_match('/^[0-9]{11}+$/', $phone)) {
		 	$msg="Invaild mobile number";
		 	return $msg;
	 	}
             $mailquery="select * from users where email='$email' limit 1";
             $mailcheck=$this->db->select($mailquery);
             if ($mailcheck <> false) {
             	$msg="<span class='error'>Email already exist !</span>";
             	return $msg;
             }else{
             	$query = "INSERT INTO users(name,address,city,country,zip,phone,email,password,typeofuser)
                VALUES('$name','$address','$city','$country','$zip', '$phone','$email','$password','$typeofuser')";

             $UserInsert=$this->db->insert($query);
		if ($UserInsert) {
			$msg="<span class='success'>user data insert successful</span>";
			return $msg;
		}else{
			$msg="<span class='error'>user data  not insert .</span>";
			return $msg;
		}
             }


	}
	public function userLogin($ldata){
		$email=mysqli_real_escape_string($this->db->link,$ldata['email']);
		$password=mysqli_real_escape_string($this->db->link,md5($ldata['password']));
		if (empty($email)||empty($password)){
			$msg= "<span class='error'> field must not be empty </span>";
			return $msg;
		}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	 	$msg="Invalid Email Address!";
	 	return $msg;
	 	}
		$query = "select * from users where email='$email' AND password='$password'";
		$result=$this->db->select($query);
		if ($result!=false) {
			$value=$result->fetch_assoc();
			Session::set("userlogin",true);
			Session::set("userId",$value['userId']);
			Session::set("userName",$value['name']);
			echo("<script>alert('Session::set(\"userId\"');</script>");
			header("Location: cart.php");
		}else{
			$msg= "<span class='error'> email or password not matched! </span>";
			return $msg;
		}

	}
	public function getUserData($id){
		$query="select * from address where id=$id";
		$result=$this->db->select($query);
		return $result;
	}
	public function updateUserData($data,$id){
		$name=mysqli_real_escape_string($this->db->link,$data['name']);
		$address=mysqli_real_escape_string($this->db->link,$data['address']);
		$city=mysqli_real_escape_string($this->db->link,$data['city']);
		$country=mysqli_real_escape_string($this->db->link,$data['country']);
		$zip=mysqli_real_escape_string($this->db->link,$data['zip']);
		$phone=mysqli_real_escape_string($this->db->link,$data['phone']);
		$email=mysqli_real_escape_string($this->db->link,$data['email']);
		if ($name==""||$address==""||$city==""||$country==""||$zip==""||$phone==""||$email=="") {
			$msg= "<span class='error'> field must not be empty </span>";
			return $msg;

             }else{

             $qury="update users 
             set 
             name='$name', 
             address='$address',
             city='$city',
             country='$country',
             zip='$zip',
             phone='$phone',
             email='$email'
             where userId='$id'";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
 		$msg="<span class='success'>user profile updated successful</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>user profile  not updated!</span>";
			return $msg;
 	}
             }


	}

	
	public function insertBillingAddress($data,$id)
	{
		//var_dump($data);
			//die();

		$id=mysqli_real_escape_string($this->db->link,$id);
		$name=mysqli_real_escape_string($this->db->link,$data['name']);
		$mobile=mysqli_real_escape_string($this->db->link,$data['mobile']);
		$email=mysqli_real_escape_string($this->db->link,$data['email']);
		$city=mysqli_real_escape_string($this->db->link,$data['city']);
		$zipcode=mysqli_real_escape_string($this->db->link,$data['zipcode']);
		$address=mysqli_real_escape_string($this->db->link,$data['address']);
		$payment=mysqli_real_escape_string($this->db->link,$data['payment']);
		$transactionid=mysqli_real_escape_string($this->db->link,$data['transactionid']);
		if ($name==""||$mobile==""||$email==""||$city==""||$zipcode==""||$address==""||$payment==""||($payment==='Bkash'? ($transactionid==null?true:false) : false)){
			$msg= "<span class='error'> field must not be empty </span>";
			return $msg;

             }else{
             	
             $qury="update users 
             set 
             name='$name', 
             address='$address',
             city='$city',
             country='$country',
             zip='$zip',
             phone='$phone',
             email='$email'
             where userId='$id'";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
 		$msg="<span class='success'>user profile updated successful</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>user profile  not updated!</span>";
			return $msg;
 	}
             }

	}
	public function getUserProfileData()
	{
		$adminid=Session::get("adminId");
		$adminRole=Session::get("adminRole");
		$query="select * from users where userId='$adminid' and role='$adminRole'";
         $result=$this->db->select($query);
         return $result;
	}
	public function updateUserProfile($data)
	{
		$adminid=Session::get("adminId");
		$adminRole=Session::get("adminRole");
	  $name=$this->fm->validation($data['name']);
      $typeofuser=$this->fm->validation($data['typeofuser']);
      $email=$this->fm->validation($data['email']);
      $details=$this->fm->validation($data['details']);
      
      $name=mysqli_real_escape_string($this->db->link,$name);
      $typeofuser=mysqli_real_escape_string($this->db->link,$typeofuser);
      $email=mysqli_real_escape_string($this->db->link,$email);
      $details=mysqli_real_escape_string($this->db->link,$details);
      $query="update users
               set
                name='$name',
                typeofuser='$typeofuser',
                email='$email',
                address='$details'
                where userId='$adminid' and role='$adminRole'";
      $updated_rows =$this->db->update($query);   
      Session::set("adminName",$name); 
      
      if ($updated_rows) {  
      	header("location: userprofile.php");
        // $msg ="<span class='success'>User updated Successfully.     </span>";    
     	return $msg;
      }else {   
        $msg= "<span class='error'>User Not updated !</span>"; 
        return $msg;  
       }
	}
	public function changePassword($data)
	{

		$old_pass=$this->fm->validation($data['old']);
       $new_pass=$this->fm->validation($data['new']);
        $old_pass=mysqli_real_escape_string($this->db->link,$old_pass);
        $new_pass=mysqli_real_escape_string($this->db->link,$new_pass);
	 if ($old_pass=="" ||$new_pass=="") {
          return "<span>Field must not empty</span> ";
       }else{
       	$old=md5($old_pass);
       	$new=md5( $new_pass);
       	$adminid=Session::get("adminId");
        $query="select * from users where userId='$adminid'";
        $result=$this->db->select($query)->fetch_assoc();
        $pass=$result['password'];
        if ($pass!=$old) {
            return "<span>Password not match</span>";
        }else{
            $query="update users
                 set
                  password='$new'
                 where userId='$adminid'";
          $updated_rows = $this->db->update($query);  
          if ( $updated_rows) {
               return 'success';
            }else{
                return "<span>Password Not Updated</span>";
            }  
        }
    }
	}
	public function contactUs($data)
	{
		$name=$this->fm->validation($data['name']);
		$mobile=$this->fm->validation($data['mobile']);
		$email=$this->fm->validation($data['email']);
		$body=$this->fm->validation($data['body']);
		$name=mysqli_real_escape_string($this->db->link,$name);
		$mobile=mysqli_real_escape_string($this->db->link,$mobile);
		$email=mysqli_real_escape_string($this->db->link,$email);
		$body=mysqli_real_escape_string($this->db->link,$body);
	   $error="";
	 if (empty($name)) {
	 	$error="name must not be empty";
	 	return $error;
	 }elseif (!filter_var($name,FILTER_SANITIZE_SPECIAL_CHARS)) {
	 	$error="Invalid Name!";
	 	return $error;
	 }elseif (empty($mobile)) {
	 	$error="mobile must not be empty";
	 	return $error;
	 }elseif (!preg_match('/^[0-9]{11}+$/', $mobile)) {
	 	$error="Invaild mobile number";
	 	return $error;
	 }elseif (empty($email)) {
	 	$error="emaile must not be empty";
	 	return $error;
	 }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	 	$error="Invalid Email Address!";
	 	return $error;
	 }elseif (empty($body)) {
	 	$error="message field must not be empty";
	 	return $error;
	 }else{
	 	 $query = "INSERT INTO contact(name,mobileNo,email,body)   
           VALUES('$name','$mobile','$email','$body')";  
        $inserted_rows = $this->db->insert($query);    
        if ($inserted_rows) {  
           $msg="message send successfully" ; 
           return 'success'; 
        }else {   
          $error="message not send " ;  
          return $error;
         }
	 }
	 
	}
	public function getAllComments()
	{
		$query = "select * from contact where status ='0' order by contactid desc";
		$result=$this->db->select($query);
		return $result;
	}
	public function getSingleComment($id)
	{
		 $query="select * from contact where contactid=$id";
		$result=$this->db->select($query);
		return $result;
	}
	public function passRecovery($data)
	{
		$email=$this->fm->validation($data['email']);
		$email=mysqli_real_escape_string($this->db->link,$email);
		 if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
         return $msg="<span class='error'>invalid email!</span>";
        }else{
		 $mailquery="select * from users where email='$email' limit 1";
         $checkmail=$this->db->select($mailquery);
		if ($checkmail !=false) {
			while ($value=$checkmail->fetch_assoc()) {
				$userid=$value['userId'];
				$name=$value['name'];
				$username=$value['typeofuser'];
			}
			$text=substr($email, 0,3);
			$rand=rand(10000,99999);
			$newpass="$text$rand";
			$pass=md5($newpass);
			$subject="your password";
            $message="Your username is " .$username.  " and Password "  .$newpass.  " plz visit website to login.";
            
			require_once '../vendor/autoload.php';
            require '../credential.php';
            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
              ->setUsername(EMAIL)
              ->setPassword(PASS)
            ;

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message($subject))
              ->setFrom([EMAIL => 'Recovery password'])
              ->setTo([$email])
              ->setBody($message)
              ;

             

            // Send the message
            $result = $mailer->send($message);
            if(!$result) {
                return 'Message could not be sent.';
                
            } else {
            	$query="update users
                    set
                     password='$pass'
                     where userId='$userid'";
            	 $updated_row=$this->db->update($query);

                return 'success';
            }
			
          }else{
			  return "<span>Email not exist!</span>";   
	  }
	}
	}
}
 ?>