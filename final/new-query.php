<?php
include("connection.php");
class  foo
{
	public $conn;
	public $db;
	public function __construct()
	{
        $this->db = Database::getInstance();
     
	$this->conn = $this->db->getConnection(); 
        }
}
class Account extends  foo
{
	
	public function get_UserName()
	{       $name='';
		   $sql = "SELECT UserName FROM Account WHERE Email=   '".$_SESSION["mail"]."'";
            $result = mysqli_query($this->conn, $sql);
			
			if (mysqli_num_rows($result) > 0) 
        {
			
          while($row = mysqli_fetch_assoc($result)) 
	      {
		
			$name= $row["UserName"];
           break;
		  }
		}
		 return $name;
	}
	
	
	
	
	
  
  
  public function creat_Account($UserName,$password ,$Email)
	{
		$sql="INSERT INTO Account (UserName,password ,Email) Values ('$UserName','$password' ,'$Email')";
            $result = mysqli_query($this->conn, $sql);
			if($result)
					echo "Account created successfully";
	//mysqli_close($conn);
	}
	public function Get_Emails($email)
	{
		
            $sql = "SELECT email FROM Account where Email='".$email."'";
            $result = mysqli_query($this->conn, $sql);
			$numResults = mysqli_num_rows($result);
		
		
            return $numResults;
	}
	
	public function Log_In($mymail,$mypassword)
	{
		  $sql = "SELECT Id FROM account WHERE  password = '".$mypassword."' AND   Email = '".$mymail."'";
            $result = mysqli_query($this->conn, $sql);
			if($result)
			{
				
		$row = mysqli_fetch_array($result);
      //$active = $row['active'];
      $count = mysqli_num_rows($result);
		
      if($count == 1) 
	  {
		 
        
         $_SESSION['login_user'] = $mymail;
         $message = "You are logged in ";
		 header("location: After_Login.php");
		 echo $message;
         
      }
	  else 
	  {
          $error = "Sorry Your Login Name or Password is invalid , try again";
		 
		 echo "<script type='text/javascript'>alert('$error');</script>";
				
				

	}
}
	
  
}





public function View_Acc()
	{
		
         
		//echo $_SESSION["mail"];
		$name=''; $id=''; $mail=''; $pass='';
		$sql = "SELECT * "  . " FROM account" . "   WHERE Email = '".$_SESSION["mail"]."'";               //'$_SESSION['username']'";
	
        $result = mysqli_query( $this->conn , $sql);
        $rowcount=mysqli_num_rows($result);
		////////////////////////////////
	
        if (mysqli_num_rows($result) > 0) 
        {
		
				
          while($row = mysqli_fetch_assoc($result)) 
	      {
		
			$name= $row["UserName"];
			//echo $name;
			$id=$row["Id"];	
			$mail=$row["Email"];
             //echo $mail;			
			$pass=$row["password"];	
		
			
			
	      }
		}
	    
		 
		 return array($name, $pass ,$mail,$id); 
		 
		 
	}
	public function Update_Acc()
	{
		$myusername=''; $email=''; $password='';
		if(isset($_POST['action']))
      {    
      
        if($_POST['action']=="submit")
        {
		 
	     $myusername= $_POST["name"];
		
         //$email= $_POST["mail"];
		  //echo  $email;
         $password=$_POST["pass"]; 
		  //echo  $password;
		 //$id = $_POST["id"];
		}
		
	  }
	  
	  //$_SESSION['username']= $username;

		$sql = "UPDATE account 
        SET    UserName='$myusername' ,     password =  '$password' 
        WHERE Email=   '".$_SESSION["mail"]."'";
        mysqli_query($this->conn, $sql);
		$result = mysqli_query($this->conn, $sql);
		?>
		
 
	<?php
	}	











}
class Product extends  foo
{
  public function View_Products()
	{
		
            $sql = "SELECT * FROM Product";
            $result = mysqli_query($this->conn, $sql);
            //mysqli_close($conn);
			return $result;
	}
  
  public function Add_Product($Name ,$Description ,$Price,$Num ,$Rate , $P_Type,$Country,$Company_Id,$img )
	{
		    
            $sql = "INSERT INTO Product (Name ,Description ,Price,Num ,Rate , P_Type,Country,Company_Id,img  ) Values ('$Name' ,'$Description' ,'$Price','$Num','$Rate' , '$P_Type','$Country','$Company_Id','$img' )";
            $result = mysqli_query($this->conn, $sql);
		   
			 return $result;
	}
	public function Get_Product_Names()
	{
		
            $sql ="SELECT Name FROM Product";
            $result = mysqli_query($this->conn,$sql);
			return $result;
	}
	public function Delete_Product($name)
	{
		
            $sql ="delete FROM Product where Name='".$name."'";
            $result = mysqli_query($this->conn,$sql);
			return $result;
	}
	
	public function Edit_Product($Name ,$Description ,$Price,$Num  , $P_Type,$Country,$Company_Id ,$Id,$img)
	{
		    
            $sql ="UPDATE Product SET Name ='$Name',Description ='$Description' ,Price ='$Price',Num ='$Num' ,P_Type='$P_Type' ,Country='$Country',Company_Id='$Company_Id',img='$img' where Id='".$Id."'";
            $result = mysqli_query($this->conn,$sql);
	     	return $result;
	}
	public function Get_Product_Id($name)
	{
		
            $sql ="select Id FROM Product where Name='".$name."'";
            $result = mysqli_query($this->conn,$sql);
			$row = mysqli_fetch_assoc($result);
			return $row["Id"];
	}
	
	public function Get_Product_info($Id)
	{
		
            $sql ="select * FROM Product where Id='".$Id."'";
            $result = mysqli_query($this->conn,$sql);
			
			return $result;
	}
		public function Get_Product_info2($name)
	{
		
            $sql ="select * FROM Product where Name='".$name."'";
            $result = mysqli_query($this->conn,$sql);
			
			return $result;
	}
	
}

class Company extends  foo
{
  public function View_Company()
	{
		
            $sql = "SELECT Name FROM Company";
            $result= mysqli_query($this->conn, $sql);
         
			return $result;
	}
	public function View_s_Company($Name)
	{	
            $sql = "SELECT * FROM Company where Name='".$Name."'";
            $result= mysqli_query($this->conn, $sql);
         
			return $result;
		
		
	}
	public function Get_Company_Id($Name)
	{
		
            $sql = "SELECT Id FROM company where Name='".$Name."'";
            $result = mysqli_query($this->conn, $sql);
	        
         $row=mysqli_fetch_assoc($result);
	       return $row["Id"];
	}
	
	public function Delete_Company($name)
	{
		
            $sql ="delete FROM company where Name='".$name."'";
            $result = mysqli_query($this->conn,$sql);
			return $result;
	}
	
	public function Edit_Company($Name ,$Phone ,$Email,$old_name,$img,$desc)
	{       echo $Name;
	        echo $Phone;
			echo $Email;
			echo $old_name;
		    
            $sql ="UPDATE Company SET Name ='$Name',Phone_Num ='$Phone',Email='$Email',img='$img',description='$desc' where Name='".$old_name."'";
            $result = mysqli_query($this->conn,$sql);
	     	return $result;
	}
	
	public function Add_Company($Name,$Phone_Num,$Email,$Describtion,$img)
	{ 
		
            $sql = "INSERT INTO Company (Name,Phone_Num,Email,description,img  ) Values ('$Name'  ,'$Phone_Num','$Email','$Describtion','$img' )";
            $result = mysqli_query($this->conn, $sql);
		     
			 return $result;
	}
	
	
		
}
class Offer extends  foo
{}
class Gallary extends  foo
{}
class Pipes extends  foo
{}
?>