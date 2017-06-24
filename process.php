<?php
//Normally I work in two differents files of php for process the datas.
//One only for functions (functions.php) an the other one just for process the datas that one page sent to me(like this one).

include("functions.php");
//Function for make the insert of the user into the database
if($_GET["action"]=="new_insert"){

      $name = $_POST["first_name"];
      $surname = $_POST["surname"];
      $email = $_POST["email_adress"];
      $gender = $_POST["gender"];
      $birthdate = $_POST["date_of_birth"];
      $telephone = $_POST["telephone_number"];
      $comments = $_POST["comments"];

      //I modify the date just like how it want the database (YYYY (/ or -) MM (/ or -) DD)
      $birlist=explode("/", $birthdate);
      $birthdate = $birlist[2]."/".$birlist[1]."/".$birlist[0];

		  $sql="INSERT INTO users VALUES(?,?,?,?,?,?,?,?)";
      $connection=connect();

		  $ready=$connection->prepare($sql);
		  $ready->bindValue(1,"dummy",PDO::PARAM_STR);
		  $ready->bindValue(2,$name,PDO::PARAM_STR);
		  $ready->bindValue(3,$surname,PDO::PARAM_STR);
		  $ready->bindValue(4,$email,PDO::PARAM_STR);
      $ready->bindValue(5,$telephone,PDO::PARAM_STR);
      $ready->bindValue(6,$gender,PDO::PARAM_STR);
      $ready->bindValue(7,$birthdate,PDO::PARAM_STR);
      $ready->bindValue(8,$comments,PDO::PARAM_STR);
		  $ready->execute();
      //I inserted all the values into the database
          if($filesAfectades=$ready->rowCount()>0 ){
            disconnect($connection);
            header("Location: thanksgiving.php");
          }
          else{
            disconnect($connection);
            header("Location: thanksgiving.php?error=1");
          }
	}
  else{
    echo "You don't have permision for stay here.";
  }

?>
