<!DOCTYPE html>
<html>
<head>
    <title>jQuery Validation</title>
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
        
            <h2 style="margin-top: 30px;text-align: center;">Registration</h2>
            <br>              
            <div class="panel panel-default">
                <div class="panel-heading">
                    <br>
                    <h3 class="panel-title text-center">Fill the form to sign up</h3>
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
                        <br>
                        <a href = "http://localhost/codeIgniter/index.php/login" class="stretched-link">click here to login</a>
                    <?php endif; ?>
                  
                    
                 
                    <!-- Form -->
                    <?php echo form_open('registration/signUp', array('id' => 'signup-form','method' => 'POST'));?>
                        <div class="form-group">
                            <label>firstname</label>                          
                            <br>
                                <input type="text" id="firstname" name="firstname" class="form-control">
                            <br>    
                            <!-- validation message for firstname checking with database -->
                         
                        </div>
                        <div class="form-group">
                            <label>lastname</label>                          
                            <br>
                                <input type="text" id="lastname" name="lastname" class="form-control">
                            <br>    
                            <!-- validation message for lastname checking with database -->
                         
                        </div>
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
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <br>
                                <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="">
                            <br>          
                        </div>                                                                            
                        <input type="submit" class="btn btn-primary" value="Sign Up">
                        <br>                                     
                    <?php echo form_close();?>  
                    <?php if( !$this->session->flashdata('success')): ?>
                        <br>
                    <p>Already registered ?
                  <span>  <a href = "http://localhost/codeIgniter/index.php/login" class="stretched-link">Click here to login</a></span>
                    </P>
                    <?php endif; ?>
                                
                </div>
            </div>
        </div> 
        <div class="col-lg-4"></div>    
    </div>
    <!-- validation plugin configuration -->
    <script type="text/javascript">
        // wait untill the page is loaded completely
        $(document).ready(function(){
        // include the validation for the form function comes with this plugin
            $('#signup-form').validate({
            // set validation rules for input fields
                rules: {
                    firstname: {
                        required : true,
                    },
                    lastname: {
                        required : true,
                    },
                    email: {
                        required : true,
                        email: true
                    },
                    password: {
                        required : true,
                        minlength: 5
                    },
                    cpassword: {
                        required : true,
                        equalTo: "#password"
                    }
                },
            // set validation messages for the rules are set previously
                messages: {
                    firstname: {
                        required : "firstname is required",
                    },
                    lastname: {
                        required : "lastname is required",
                    },
                    email: {
                        required : "Email is required",
                        email: "Enter a valid email. Ex: example@gmail.com"
                    },
                    password: {
                        required : "Password is required",
                        minlength: "Password must contain at least 5 characters"
                    },
                    cpassword: {
                        required : "Confirm Password is required",
                        equalTo: "Confirm Password must be matched with Password"
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