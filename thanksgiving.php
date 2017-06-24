<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
    <title>Test Finer Vision</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">

    //JQUERY
    //Just for toggle the div(show/hide)
    $(document).ready(function(){
      $("#showhide").click(function(event){
        event.preventDefault();
        $("#bot1").toggle("slow");
       });
    });


    </script>
  </head>
<body>
  <div class="principal-box">

    <!--  STEP 1  -->
    <div class="step-box">
        <div class="top">
            <p><a href="#" id="showhide">All users</a></p>
        </div>
        <div class="bot" id="bot1" style="width: auto;display:none">
          <table>
            <tr>
              <td><h3>Name</h3></td>
              <td><h3>Surname</h3></td>
              <td><h3>Email</h3></td>
              <td><h3>Telephone</h3></td>
              <td><h3>Gender</h3></td>
              <td><h3>Birthdate</h3></td>
              <td><h3>Comment</h3></td>
            </tr>
          <?php
            include("functions.php");
            fetch_all_users();
           ?>
         </table>
        </div>
    </div>

    <!--  STEP 2  -->
    <div class="step-box">
        <div class="top" style="text-align:center;">
            <p>Thanks giving</p>
        </div>
        <div class="bot" id="bot2" name="bot2" style="width: auto;display:block">
          <label style="margin:10px;">
            <?php
              $error=0;
              if(isset($_GET["error"])){
                $error=$_GET['error'];
              }
              //Just for control if the datas was been updated into the database correctly
              if ($error==0) {
                echo "The registration was successfully. Thank you for registering.";
              }
              else {
                echo "The registration was wrongly. Please, try it again.";
              }
             ?>

          </label>
        </div>
    </div>

    <!--  STEP 3  -->
    <div class="step-box">
        <div class="top" style="text-align:right;">
            <p>Developed by Jordi Vicens Farrús.</p>
        </div>
        <div class="bot" id="bot3" name="bot3" style="width: auto;display:none">

        </div>
    </div>
  </div>
</body>
</html>
