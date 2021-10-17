
<?php session_start(); ?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login and Registration Form in HTML | CodingNepal</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
    <div class="wrapper">
        
    <script>
   
    </script>
    <?php if(isset($_SESSION['error'])) { ?>
     <div class="alert alert-danger alert-dismissible fade show" id="alert-danger" role="alert" >
            <strong>Alert!</strong> <?php echo $_SESSION['error']; ?> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
    <?php } ?>
      <div class="alert alert-danger alert-dismissible fade show" id="alert-danger" role="alert" style="display:none">
            <strong>Alert!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
         <div class="title-text">
            <div class="title login" style="color: white;">
               Login Form
            </div>
            <div class="title signup" style="color: white;">
               Signup Form
            </div>
         </div>
         
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form   method="POST" class="login" onsubmit="return false">
                <div class="field">
                     <input type="text" name="username" id="usernames" placeholder="Enter Username" required>
                  </div>
                  <div class="field">
                     <input type="password" name="password" id="passwords" placeholder="Enter Password" required>
                  </div>
                
                  <div class="pass-link">
                  </div>
                  <div class="field btn">
                      <div class="btn-layer"></div>

                     <input type="submit" id="logins" value="Login" >
                  </div>
                  
                  <div class="signup-link">
                     Not a member? <a href="">Signup now</a>
                  </div>
               </form>
               <form  class="signup" method="POST" id="form2" onsubmit="return false">
                <div class="field">
                     <input type="text" placeholder="Enter Username" name='username' id='username' required>
                     <p id="s" style="display:none;"></p>

                  </div>
                  <div class="field">
                     <input type="text" placeholder="Email Address" name='email' id='email' required>
                     <p id="e" style="display:none;"></p>

                  </div>
                  <div class="field">
                     <input type="password" placeholder="Enter Password" name='password' id='password' required>
                     <p id="p" style="display:none;"></p>

                    </div>
                    <div class="field">
                    <input type="date" placeholder="Enter Date Of Birth" name='dob' id='dob' required>
                 </div>
              
                 
                 
                  <div class="field">
                    <input type="text" placeholder="Enter Mobile Number" name='mobile'  id='mobile' required>
                    <p id="m" style="display:none;"></p>

                 </div>
                 
                 <div class="field btn" id="op">
                      <div class="btn-layer"></div>

                     <input type="submit" id="signups" value="save" >
                  </div>
               </form>
               
            </div>
         </div>
                 
      </div>

      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

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
          $(".alert-danger").css("display","block").text('Any field is empty');
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
				
					      if(dataResult.statusCode==200)
                {
                  swal({
                        title:"Yah...!",
                        text:"Data Added Successfully",
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
        $('#signups').attr("disabled",true);
        }
        });
      });
      </script>
       <script>
      //This is login process
      $(document).ready(function()
      {

        $('#logins').click(function()
        {
        var username=$('#usernames').val();
     
        var password=$('#passwords').val();
     
        if(username == "" ||  password == ""  )
        {
          $(".alert-danger").css("display","block").text('Any field is empty');
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
                "login":1,
                username:username,
                password:password,


               
              },
              success:function(data)
              {
                var dataResult = JSON.parse(data);
				
					      if(dataResult.statusCode==200)
                {
                  window.location="list.php";						
			          }
					      if(dataResult.statusCode==201)
                {
                  $(".alert-danger").css("display","block").text('Username or Password Invalid');
                   window.setTimeout(function () { 
                   $(".alert-danger").hide(); 
                   }, 2000);
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
                if(email == "")
                {
                  $('#e').css("display","none");

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
          //username check
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
                if(username == "")
                {
                  $('#s').css("display","none");

                }
                if(response.strlen >= 10)
                {
                  $('#s').text("Username length must be 10 charector").css("display","block").css("color","red");
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
          //password length  check
          $("#password").keyup(function(e)
          {
            var password=$("#password").val();
            $.ajax({
              type:"POST",
              url:"check.php",
              data:
              {
                "password_check":1,
                "password":password,

              },
              success:function(response)
              { 
                var response=JSON.parse(response);

                if(response.strlen >= 10)
                {
                  $('#p').text("Password length must be 10 charector").css("display","block").css("color","red");
                  $('#signups').attr('disabled', true);



                }
                else
                {
                  $('#p').css("display","none");
                  $('#signups').attr('disabled', false);


                }
              
                
              }

      
            });
          });
        });
      </script>
       <script>
         //this for mobile no. check
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
                if(mobile == "")
                {
                  $('#m').css("display","none");

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
   <style>
       @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
.swal-modal{
  background-color: rgb(15, 15, 15);
  border:2px solid rgb(126, 124, 124);
  
}
.swal-overlay{
  background-color: rgba(26, 25, 25, 0.541);
}
.swal-title{
  color:rgb(255, 60, 0);
  font-weight: bold;
}
.swal-icon--success__hide-corners{
  background-color: transparent;
}
.swal-button{
  background-color: rgba(100, 11, 11, 0.507);
}


.swal-text{
  color: rgb(58, 160, 58);
  font-size: 20px;
  font-weight: bold;
}
.swal-icon--success:after, .swal-icon--success:before {
  background-color:rgba(235, 226, 226); 
}
.swal-icon--success:after, .swal-icon--success:before{
  background-color:transparent;
}
  
html,body{
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  background: -webkit-linear-gradient(left, #312d2d, #1a1618);
  background-size:cover;
  justify-content:center;
  display:flex;
}
::selection{
  background: #fa4299;
  color: #fff;
}
.wrapper{
  overflow: hidden;
  max-width: 390px;
  background: rgba(8, 7, 7, 0.884);
  padding: 30px;
  margin-top:100px;
  border-radius: 15px;
  box-shadow: 0px 0px 8px 5px #cc8f24;
}
.wrapper .title-text{
  display: flex;
  width: 200%;
}
.wrapper .title{
  width: 50%;
  font-size: 35px;
  font-weight: 600;
  text-align: center;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.wrapper .slide-controls{
  position: relative;
  display: flex;
  height: 50px;
  width: 100%;
  overflow: hidden;
  margin: 30px 0 10px 0;
  justify-content: space-between;
  border: 1px solid lightgrey;
  border-radius: 5px;
}
.slide-controls .slide{
  height: 100%;
  width: 100%;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  text-align: center;
  line-height: 48px;
  cursor: pointer;
  z-index: 1;
  transition: all 0.6s ease;
}
.slide-controls label.signup{
  color: #000;
}
.slide-controls .slider-tab{
  position: absolute;
  height: 100%;
  width: 50%;
  left: 0;
  z-index: 0;
  border-radius: 5px;
  background: -webkit-linear-gradient(left, #1d1919, #d49d3d);
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
input[type="radio"]{
  display: none;
}
#signup:checked ~ .slider-tab{
  left: 50%;
}
#signup:checked ~ label.signup{
  color: #fff;
  cursor: default;
  user-select: none;
}
#signup:checked ~ label.login{
  color: rgb(236, 236, 236);
}
#login:checked ~ label.signup{
  color: rgb(236, 236, 236);
}
#login:checked ~ label.login{
  cursor: default;
  user-select: none;
}
.wrapper .form-container{
  width: 100%;
  overflow: hidden;
}
.form-container .form-inner{
  display: flex;
  width: 200%;
}
.form-container .form-inner form{
  width: 50%;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.form-inner form .field{
  height: 50px;
  width: 100%;
  margin-top: 20px;
}
.form-inner form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 10px;
  border-radius: 5px;
  border: none;
  border-bottom:2px solid lightgray;
  border-bottom-width: 2px;
  font-size: 13px;
  color: white;
  background-color: transparent;
  transition: all 0.3s ease;
}
input[type="date"]::-webkit-calendar-picker-indicator {
  cursor: pointer;
  border-radius: 4px;
  margin-right: 2px;
  opacity: 0.6;
  filter: invert(0.8);
}
.form-inner form .field input:focus{
  border-color: #cc9e39;
  /* box-shadow: inset 0 0 3px #fb6aae; */
}
.form-inner form .field input::placeholder{
  color: #999;
  transition: all 0.3s ease;
}
form .field input:focus::placeholder{
  color: #b3b3b3;
}
.form-inner form .pass-link{
  margin-top: 5px;
}
.form-inner form .signup-link{
  text-align: center;
  margin-top: 30px;
  color: white;
}
.form-inner form .pass-link a,
.form-inner form .signup-link a{
  color: #c49924;
  text-decoration: none;
}
.form-inner form .pass-link a:hover,
.form-inner form .signup-link a:hover{
  text-decoration: underline;
}
form .btn{
  height: 50px;
  width: 100%;
  border-radius: 5px;
  position: relative;
  overflow: hidden;
}
form .btn .btn-layer{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(left, #272626, #cc8f24);
  border-radius: 5px;
  transition: all 0.4s ease;;
}
form .btn:hover .btn-layer{
  left: 0;
}
form .btn input[type="submit"]{
  height: 100%;
  width: 100%;
  z-index: 1;
  position: relative;
  background: none;
  border: none;
  color: #fff;
  padding-left: 0;
  border-radius: 5px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
}
   </style>
</html>