<!DOCTYPE html>
<html>
<body>
<head>
  <title>Nimo</title>
  <style>
              body {
            font-size: 18px;
          }

          ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #8A2BE2;
            position: -webkit-sticky; /* Safari */
            position: sticky;
            top: 0;
          }

          li {
            float: left;
          }

          li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
          }

          li a:hover {
            background-color: #BA55D2;
          }
            .active {
          background-color: #BA55D3;
        }

        input[type=text], input[type=password], select {
          width: 30;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          box-sizing: border-box;
        }

        button {
          background-color: #8A2BE2;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 100%;
        }

        button:hover {
          background-color: #BA55D3;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 100%;
        }

        .cancelbtn {
          width: auto;
          padding: 10px 18px;
          background-color: #f44336;
        }


        img.avatar {
          width: 40%;
          border-radius: 50%;
        }

        .container {
          padding: 16px;
        }

        span.psw {
          float: right;
          padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
          span.psw {
            display: block;
            float: none;
          }
          .cancelbtn {
            width: 100%;
          }
        }
        table.center {
          margin-left: auto; 
          margin-right: auto;
        }
  </style>
</head>

<ul>

  <li><a href="http://localhost/nimo/signup.php">SignUp</a></li>
  <li><a class="active" href="http://localhost/nimo/login.php">LogIn</a></li>

</ul>


<form action="" method="post">
<div class="container">
  <table class="center">
 


        <tr>
        <td><label for="email">Email Id</label></td>
        <td><input type="text" placeholder="Email Id" name="email" required ></td>
        </tr>

        <tr>
        <td><label for="pwd">Password</label></td>
        <td><input type="password" placeholder="Password" name="pwd" required ></td>
        </tr>

        <tr>
        <td colspan="2"><button type="submit" name="submit">Log In</button></td>
        </tr>

  </table>
</div>


</form>

<?php
   
   session_start();

    $server="localhost";
    $username="root";
    $password="";
    $dbname="nimo";

    $con=mysqli_connect($server,$username,$password,$dbname);
   
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
      // username and password
      
      $name = mysqli_real_escape_string($con,$_POST['email']);
      $pwd  = mysqli_real_escape_string($con,$_POST['pwd']); 
      
      $sql = "SELECT id FROM signup WHERE email = '$name' and pwd = '$pwd'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) 
      {

        echo" <script>                
                    alert('Welcome To Nimo!');
              </script>";

         //session_register("myusername");
         //$_SESSION['login_user'] = $myusername;
         
         //header("location: welcome.php");
      }
      else 
      {
         echo "<script>                
                        alert('Error Login!');
               </script>";
      }
   }
?>


</body>
</html>