<!DOCTYPE html>
<html>
    <head>
        <title>placement portal</title>
            <meta charset=utf-8>
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <!---Fontawesome--->
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
            <!---Bootstrap5----->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
            <!---custom style---->
            <link rel="stylesheet" href="../css/style.css">
    </head>
    <style> table,th,tr,td{
      
            border:2px solid black;
            border-collapse:collapse;
            padding: 10px;
            margin:auto;
    }
     *
{
padding:0px;
margin:0px;
}

.menubar
{
background-color:blue;
text-align:center;

}

  </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg bgtop bg-light">
 
  </nav>
  <nav class="menubar navbar-light">
   <div class="row">
    <div class="col-2">
      <button class="btn btn-primary">
       <a href="<?php echo base_url()?>main/dashboard" class="text-white nav-link" style="">Home</a></button>
   </div>
    <h1 >Project Details</h1>
  
</nav>
    <form method="post" action="">
      <table class="table table-bordered table-info table-striped">
      <thead>
        
              <tr>

                        <th>Paper Topic</th>
                        <th>Description</th>
                        <th> date</th>
                        <th>Guide</th>
                        <th>Action</th>
                        <th>Action</th>
                      
                        
                    </thead>
                      <tbody>
                        <?php

if($n->num_rows()>0)
{
  foreach($n->result() as $row)
{
?>
<tr>
<td><?php echo $row->topic;?></td>
<td><?php echo $row->brief;?></td>
<td><?php echo $row->date;?></td>
<td><?php echo $row->guide;?></td>
<td><button class="btn btn-primary">
  <a href="<?php echo base_url()?>main/qualification" class="text-white nav-link">Qualification</button></td>
<td><button class="btn btn-primary">
  <a href="<?php echo base_url()?>main/project" class="text-white nav-link">project</button></td>


<?php
}
}
else
{
  ?>
  <tr>
    <td>no data found </td></tr>
    <?php


}
    ?>
</table>

  <!---Jquery--->
<script
  src="https://code.jquery.com/jquery-3.5.1.js"integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous">
</script>

<!---Popper---->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
</script>

<!---Custom Js-->
<script src="js/script.js">
</script>
  </body> 
</html>  