<?php

class database{
  private $servername = "172.31.22.43";
  private $username   = "Ansh200514694";
  private $password   = "sVGO0Xf6n5";
  private $database   = "Ansh200514694";
  public  $con;


  // Database Connection
  public function __construct()
  {
    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
    if(mysqli_connect_error()) {
      trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
    }else{
      return $this->con;
    }
  }

  // Insert profile data into profile table
  public function insertData($post)
  {

    $name = $this->con->real_escape_string($_POST['name']);
    $email = $this->con->real_escape_string($_POST['email']);
      $profession = $this->con->real_escape_string($_POST['profession']);
      $username = $this->con->real_escape_string($_POST['username']);
      $address = $this->con->real_escape_string($_POST['address']);
      $phone = $this->con->real_escape_string($_POST['phone']);
      $mobile = $this->con->real_escape_string($_POST['mobile']);

    $query="INSERT INTO profile(name,email,profession,username,address,phone,mobile) VALUES('$name','$email','$profession','$username','$address','$phone','$mobile')";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg1=insert");
    }else{
      echo "Registration failed try again!";
    }
  }

  // Fetch profile records for show listing
  public function displayData()
  {
    $query = "SELECT * FROM profile";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }else{
      echo "No found records";
    }
  }

  // Fetch single data for edit from profile table
  public function displyaRecordById($id)
  {
    $query = "SELECT * FROM profile WHERE id = '$id'";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    }else{
      echo "Record not found";
    }
  }

  // Update profile data into profile table
  public function updateRecord($postData)
  {


      $name = $this->con->real_escape_string($_POST['uname']);
    $email = $this->con->real_escape_string($_POST['uemail']);
      $profession = $this->con->real_escape_string($_POST['uprofession']);
      $address = $this->con->real_escape_string($_POST['uaddress']);
      $phone = $this->con->real_escape_string($_POST['uphone']);
      $mobile = $this->con->real_escape_string($_POST['umobile']);
      $username = $this->con->real_escape_string($_POST['uusername']);

    if (!empty($id) && !empty($postData)) {
      $query = "UPDATE profile SET name = '$name', email = '$email',profession = '$profession', username = '$username', address = '$address', phone='$phone', mobile = '$mobile' WHERE id = '$id'";
      $sql = $this->con->query($query);
      if ($sql==true) {
        header("Location:index.php?msg2=update");
      }else{
        echo "Registration updated failed try again!";
      }
    }

  }

  // Delete profile data from profile table
  public function deleteRecord($id)
  {
    $query = "DELETE FROM profile WHERE id = '$id'";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg3=delete");
    }else{
      echo "Record does not delete try again";
    }
  }
}
