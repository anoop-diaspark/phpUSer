<!DOCTYPE html>
<html>
<head>
    <title>My Project</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Roboto Google font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- Google jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Custom CSS -->
    <style type="text/css">
        body {
            font-family: 'Roboto', sans-serif;
        }
        label {
            font-size: 16px;
        }
        .error {
            color: #a94442;
            border-color: #a94442;
            margin-top: 10px;
        }
        .panel {
            border: 1px solid;
            border-color: black;
        }
    </style>
</head>
<body>
   <div class="col-lg-12">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <h2 style="margin-top: 30px;text-align: center;">Login</h2>
            <br>              
            <div class="panel panel-default">
                <div class="panel-heading">
                    <br>
                    <h3 class="panel-title text-center">please enter email and password</h3>
                    <br>
                </div>
                <div class="panel-body">
                    <!-- success message to be displayed after adding a user to the database successfully -->
                    <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                                <?php echo $this->session->flashdata('success');?>
                        </div>
                    <?php endif; ?>
                    <!-- Form -->
                    <?php echo form_open('login/verifyLogin', array('id' => 'login-form','method' => 'POST'));?>
                       
                        <div class="form-group">
                            <label>Email</label>
                            <br>
                                <input type="email" id="email" name="email" class="form-control" placeholder="">
                            <br>
                            <?php echo validation_errors('<div style="color: #a94442;font-weight: bold;font-size: 16px;"><p>','</p></div>'); ?>                 
                        </div>                      
                        <div class="form-group">
                            <label>Password</label>
                            <br>
                                <input type="password" id="password" name="password" class="form-control" placeholder="">
                            <br>
                        </div>                                                                          
                        <input type="submit" class="btn btn-primary" value="Login">
                        <br>                                     
                    <?php echo form_close();?> 
                    <br>
                    <p>Not yet registered ?
                  <span>  <a href = "http://localhost/codeIgniter/index.php/register" class="stretched-link">Register</a></span>
                    </P>             
                </div>
            </div>
        </div> 
        <div class="col-lg-4"></div>    
    </div>
    <a class="pull-right btn btn-warning btn-large" style="margin-right:40px" href="<?php echo site_url(); ?>/exportexcel/generateXls"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
<h2><?php echo date("n"); ?></h2>
<h2><?php echo date("M-j"); ?></h2>
<?php 

$arr = array();
for($i=1;$i<5;$i++){
   $a = array("key"=>$i,"key1"=>$i+1);
   array_push($arr,$a);
}


foreach( $arr as $a){
    echo $a["key"];
    echo $a["key1"];
}

?>
    <!-- validation plugin configuration -->
    <script type="text/javascript">
        // wait untill the page is loaded completely
        $(document).ready(function(){
        // include the validation for the form function comes with this plugin
            $('#login-form').validate({
            // set validation rules for input fields
                rules: {
                   
                    email: {
                        required : true,
                        email: true
                    },
                    password: {
                        required : true,
                        minlength: 5
                    }
                },
            // set validation messages for the rules are set previously
                messages: {
                   
                    email: {
                        required : "Email is required",
                        email: "Enter a valid email. Ex: example@gmail.com"
                    },
                    password: {
                        required : "Password is required",
                        minlength: "Password must contain at least 5 characters"
                    }
                }
            });
        });
    </script>
    <!-- Bootstrap JS file -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>     
    <!-- Validation JS file -->     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>    
</body>
</html>