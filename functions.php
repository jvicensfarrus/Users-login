<?php
//normally I work in two differents files of php for process the datas.
//One only for functions (like this one) an the other one just for process the datas that one page sent to me(process.php).


//I used a PDO connection but I know how to use on another ways like mysqli or even the classic mysql

//FUNCTION FOR CONNECT THE DATEBASE
function connect(){
  //datas necessaries for the data base. If it fail with XAMP, try to change the port of the host to 3306(its the predeterminated one)
  $db = new PDO('mysql:host=localhost:3307;dbname=regisuser;charset=utf8', 'root', 'usbw');
  return $db;
}
//FUNCTION FOR DISCONNECT THE DATABASE
function disconnect($connect){
  $connect=null;
}
//Function for fetch all the users and print it on the webpage.
function fetch_all_users(){
  $connect=connect();
  $sql="SELECT * FROM users";
  if($execution=$connect->query($sql)){
      while($position=$execution->fetch(PDO::FETCH_NUM)){
        $birlist = explode("-", $position[6]);
        $position[6] = $birlist[2]."/".$birlist[1]."/".$birlist[0];
            echo '
              <tr value="'.$position[0].'">
                <td><a>'.$position[1].'</a></td>
                <td><a>'.$position[2].'</a></td>
                <td><a>'.$position[3].'</a></td>
                <td><a>'.$position[4].'</a></td>
                <td><a>'.$position[5].'</a></td>
                <td><a>'.$position[6].'</a></td>
                <td><a>'.$position[7].'</a></td>
              </tr>';

      }
  }
  else{
      echo "error a la connexio o consulta";
  }
  disconnect($connect);
}

 ?>
