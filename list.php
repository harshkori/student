<?php session_start(); ?>
<?php  if (isset($_SESSION['username'])) { $_SESSION['error']=NULL;?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    thead {
      background-color:black;
      color:white
    }
    input[type="search"]
    {
      height:35px;
      width:350px;
     
    }
    body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password],input[type=email],input[type=date] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password],:focus ,input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
input[type="date"]::-webkit-calendar-picker-indicator {
  cursor: pointer;
  border-radius: 4px;
  margin-right: 2px;
  opacity: 0.6;
}
/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 500px; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #282727b5;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}

.swal-modal{
  border:2px solid rgb(126, 124, 124);
  
}
.swal-overlay{
  background-color: rgba(26, 25, 25, 0.541);
}
.swal-title{
  font-weight: bold;
}
.swal-icon--success__hide-corners{
  background-color: transparent;
}
.swal-button{
  background-color: red;
  color:white;
}


.swal-text{
  color:gray;
  font-size: 15px;
  font-weight: bold;
}
.swal-icon--success:after, .swal-icon--success:before {
  background-color:rgba(235, 226, 226); 
}
.swal-icon--success:after, .swal-icon--success:before{
  background-color:transparent;
}

  </style>
  </head>
  <body>
    <a href="logout.php"  style="right:10px;position:fixed;color:red;font-weight:bold;font-size:30px">Logout </a>
    <!-- Optional JavaScript -->
    <center><label style="color:red;font-size:40px;margin:10px;font-weight:bold">Welcome <?php  echo ($_SESSION['username']); ?>
</label></center>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <br> 
  <button class="btn btn-primary" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"> Add Student</button>
  <br>
  <br>
  <center>
  <div class="alert alert-success alert-dismissible fade show" id="alert-danger" role="alert" style="display:none">
           
           </div>
</center>
  <div id="id01" class="modal">
  <div class="alert alert-danger alert-dismissible fade show" id="alert-danger" role="alert" style="display:none;">
           
           </div>
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      

   
      <h1>Add Student</h1>
      <p>Please fill in this form to create an  student account.</p>
      <hr>
      <label for="username"><b>Username*</b></label>
      <input type="text" placeholder="Enter Username" name="username"id="username" required>
      <p id="s" style="display:none;"></p>


      <label for="email"><b>Email*</b></label>
      <input type="email" placeholder="Enter Email" name="email" id="email" required>
      <p id="e" style="display:none;"></p>

      <label for="password"><b>Password*</b></label>
      <input type="password" placeholder="Enter Password" name="password" id="password" required>

      <label for="psw-repeat"><b>Date Of Birth*</b></label>
      <input type="date" name="psw-repeat" id="dob" required>
      <label for="mobile"><b>Mobile No.*</b></label>
      <input type="text" placeholder="Enter Mobile No." name="mobile" id="mobile" required>
      <p id="m" style="display:none;"></p>


      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="button" id="signups" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
  </div>

<table id="customersTable" class="display" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date Of Birth</th>
            <th>Mobile Number </th>

        </tr>
    </thead>
</table>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>
<script>
    $(document).ready(function() {
    $('#customersTable').dataTable({
        "processing": true,
        "ajax": "data.php",
        "bPaginate":true,
        "bProcessing": false,
        "pageLength": 5,
        "columns": [
            {data: 'id'},
            {data: 'name'},
            {data: 'email'},
            {data:'dob'},
            {data: 'phone'}
        ]
    });
    setInterval(function(){
    $('#customersTable').DataTable().ajax.reload();
}, 3000);
});

</script>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script>
//This is signup process
$(document).ready(function()
{

  $('#signups').click(function()
  {
  var username=$('#username').val();
  var mobile=$('#mobile').val();
  var password=$('#password').val();
  var email=$('#email').val();
  var dob=$('#dob').val();
  if(username == "" || email == "" || password == "" || dob == "" || mobile == "" )
  {
    swal({
          title:"Warning.....!",
          text:"Any field is empty",
          icon: "error",
          buttons:{
          Ok: true,
                        
        },
        }); 	    
    window.setTimeout(function () { 
    $(".alert-danger").hide(); 
    }, 2000);
  }
  

  else
  {
   $.ajax
    ({
        url:"store.php",
        type:"POST",
        data:
        {
          "signup":1,
          username:username,
          password:password,
          email:email,
          mobile:mobile,
          dob:dob
        },
        success:function(data)
        {
          var dataResult = JSON.parse(data);
          $("#id01").css("display","none");

          if(dataResult.statusCode==200)
          {
          swal({
                title:"Yahh.....!",
                text:"Student added successfully",
                icon: "success",
                buttons:{
                Ok: true,
                        
                },
              });					
          }
          else if(dataResult.statusCode==201)
          {
             alert("Error occured !");
          }
        }
    });
  }
  });
});
</script>
<script>
        //email check 
        $(document).ready(function()
        {
          $("#email").keyup(function(e)
          {
            var email=$("#email").val();
            $.ajax({
              type:"POST",
              url:"check.php",
              data:
              {
                "check_submit_btn":1,
                "email_id":email,

              },
              success:function(response)
              { 
                var response=JSON.parse(response);
                if(response.status == 0)
                {
                  // $('#i').text("email is fine");
                  $('#e').text("email is fine").css("display","block").css("color","#22d522");
                  $('#signups').attr('disabled', false);;

                }
                if(response.status == 1)
                {
                  $('#e').text("email is already taken").css("display","block").css("color","red");
                  $('#signups').attr('disabled', true);;
                }
                
              }

      
            });
          });
        });
      </script>
      <script>
        $(document).ready(function()
        {
          $("#password").keyup(function()
          {
            var password=$('#password').val();
            if(($(this).val().length > 9)
            {
              alert("enter only 5 characters");
            }
          });

        });
      </script>
      
         <script>
        $(document).ready(function()
        {
          $("#username").keyup(function(e)
          {
            var username=$("#username").val();
            $.ajax({
              type:"POST",
              url:"check.php",
              data:
              {
                "submit_btn":1,
                "username":username,

              },
              success:function(response)
              { 
                var response=JSON.parse(response);
                if(response.status == 0)
                {
                  // $('#i').text("email is fine");
                  $('#s').text("Username is fine").css("display","block").css("color","#22d522");
                  $('#signups').attr('disabled', false);;

                }
                if(response.status == 1)
                {
                  $('#s').text("Username is already taken").css("display","block").css("color","red");
                  $('#signups').attr('disabled', true);;

                }
                
              }

      
            });
          });
        });
      </script>
       <script>
        $(document).ready(function()
        {
          $("#mobile").keyup(function(e)
          {
            var mobile=$("#mobile").val();
            $.ajax({
              type:"POST",
              url:"check.php",
              data:
              {
                "submit":1,
                "mobile":mobile,

              },
              success:function(response)
              { 
                var response=JSON.parse(response);
                if(response.status == 0)
                {
                  // $('#i').text("email is fine");
                  $('#m').text("Mobile no. is fine").css("display","block").css("color","#22d522");
                  $('#signups').attr('disabled', false);;

                }
                if(response.status == 1)
                {
                  $('#m').text("Mobile no. is already taken").css("display","block").css("color","red");
                  $('#signups').attr('disabled', true);;

                }
                
              }

      
            });
          });
        });
      </script>

</body>
</html>
<?php } 
else
{
$_SESSION['error']='Access Denied';
header("location:process.php");
} 
 ?>