<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php
include_once 'connect.php';
if (isset($_POST['btnRegister'])){
    $c = new Connect();
    $dblink = $c->connectToPDO();
    $fullname = $_POST["FullName"];
    $phone = $_POST["phoneNumber"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "INSERT INTO `staff` (`Name`, `phone`, `Email`, `password`) 
    VALUES (?, ?, ?, ?)";

    $re = $dblink->prepare($sql);
    $re->execute(array("$fullname", "$phone", "$email", "$password"));
    $ck = $re;

    if($ck){
        header("Location: login.php");
    }else{
        echo "Something is wrong with your account";
    }
}
?>

<?php  
include 'header2.php';
?>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");
    body{
        background-image: linear-gradient(to bottom right, blue, red, green);
    }

    .container{
        border: 1px solid black;
        margin-top: 0;
        border-radius: 25px ;
        box-shadow: 20px 20px 10px grey;
        text-align: center;
        background-color: white!important;
    }
    .container h2{
        text-align: center;
        font-size: 50px;
        font-family: "Sofia", sans-serif;
        color: black;
    }
    .container form-group{
        margin: 0;
        display: inline-block;
    }
    .container label{
        padding: 0;
        margin-left: 0;
        margin-bottom: 5;
        float: left;
    }
    .container h4{
        font-size: small;
        font-family:'Times New Roman', Times, serif;
    }
    footer .footer-right{
        margin-top: 0;   
    }
    .form-horizontal .form-group {
        margin-right: 170px;
        margin-left: -15px;
    }
</style>

<body>
    <div class="container">
        <form class="form-horizontal" role="form" method="POST">
            <h2>Registration</h2>
            <div class="row form-group">
                <label for="FullName" class="col-sm-3 control-label">Full Name</label>
                <div class="col-sm-9">
                    <input type="text" name="FullName" placeholder="Full Name" class="form-control" autofocus>
                </div>
            </div>
            <div class="row form-group">
                <label for="phoneNumber" class="col-sm-3 control-label">Phone number </label>
                <div class="col-sm-9">
                    <input type="phoneNumber" name="phoneNumber" placeholder="Phone number" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <label for="email" class="col-sm-3 control-label">Email* </label>
                <div class="col-sm-9">
                    <input type="email" name="email" placeholder="Email" class="form-control" name="email">
                </div>
            </div>
            <div class="row form-group">
                <label for="password" class="col-sm-3 control-label">Password*</label>
                <div class="col-sm-9">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <label for="confirmPassword" class="col-sm-3 control-label">Confirm Password*</label>
                <div class="col-sm-9">
                    <input type="password" name="confirmPassword" placeholder="Confirm Password" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 ms-5 me-5">
                    <input type="submit" class="btn btn-primary btn-lg" name="btnRegister" id="btnRegister" value="Register"/>
                </div>
            </div>
        </form>
    </div>
</body>