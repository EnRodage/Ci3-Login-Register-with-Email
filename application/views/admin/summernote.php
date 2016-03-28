<?php 
defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid xyz">
		<div class="row">
			<div class="col-lg-12">   
				<form action="" method="POST" role="form">
					<div class="form-group">
						<input type="text" class="form-control" id="summernote" placeholder="Input field">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div><!--col-12-->
		</div>
	</div>
</div>
<!-- /#page-content-wrapper -->



<script>
	$(document).ready(function() {
		$('#summernote').summernote({height: 300});
	});
</script>
