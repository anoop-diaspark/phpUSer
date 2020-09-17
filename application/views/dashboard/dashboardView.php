<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">ADMIN DASH BOARD</a>
    </div>
    <!-- <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
    </ul> -->
    <ul class="nav navbar-nav navbar-right">
     
      <li><a  onclick="location.href='<?php echo site_url('dashboardController/logout');?>'"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
</head>
<body >

<?php
// $this->table->set_caption('USERS LIST');
// $table_property = array('table_open' => '<table cellpadding="2" cellspacing="1" class="table_show">');
// $this->table->set_template($table_property);
// $this->table->set_heading('FirstName', 'Last Name', 'Email','Date','ACTION');
echo "<div class='container'>
  
<table class='table'>
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Date</th>
      <th>Action</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>  "  ; 
   
foreach ($items as &$item) {
    $status = $item['STATUS'] == "NO" ? "APPROVED": "REJECT";

    $actions = anchor("dashboardController/update_row/".$item['id']."/".$status,  $status) ;
    $delete = anchor("dashboardController/delete_row/".$item['id'],  'Delete') ;
    // $this->table->add_row($item['firstname'], $item['lastname'], $item['email'],$item['date'],$actions);
//   if( $item['firstname'] != "Admin" ){
    echo " <tr class='success'>";
        echo " <td> " . $item['firstname'] . "</td>";
        echo " <td> " . $item['lastname'] . "</td>";
          echo " <td> " . $item['email'] . "</td>";
          echo " <td> " . $item['date'] . "</td>";
        echo " <td  > " . $actions . "</td>";
        echo " <td  > " .  $delete . "</td>";
        echo   "</tr>";
}

    
echo "</tbody>
</table>
</div>";

// echo $this->table->generate();






?>


</body>
<html>