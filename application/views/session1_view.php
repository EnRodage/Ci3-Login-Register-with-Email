<!DOCTYPE html>
<html>
<head>
<title>Session View Page</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="main">


<div id="show_form">
 Welcome <?php echo $this->session->userdata('name'); ?>
      <br> 
      <a href = '<?= base_url('session1/unset_data'); ?>'>
         Click Here</a> to unset session data. 

</div>
</div>
</body>
</html>