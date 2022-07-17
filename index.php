					<?php
					// connect database file
					require_once('db_conn.php');

					// Get error status message
					if(!empty($_GET['status'])){
					    switch($_GET['status']){
					        case 'succ':
					            $statusType = 'alert-success';
					            $statusMsg = 'Members data has been imported successfully.';
					            break;
					        case 'err':
					            $statusType = 'alert-warning';
					            $statusMsg = 'Some problem occurred, please try again.';
					            break;
					        case 'invalid_file':
					            $statusType = 'alert-danger';
					            $statusMsg = 'Please upload a valid CSV file.';
					            break;
					        default:
					            $statusType = '';
					            $statusMsg = '';
					    }
					}
					?>

					<!Doctype html>
					<html lang="en">
					  <head>
					    <!-- Required meta tags -->
					    <meta charset="utf-8">
					    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

					    <!-- Bootstrap CSS -->
					    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
					    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

					    <title>Import /Export csv File</title>
					    <style type="text/css">
					    	.container{
					    		border: 1px dotted red;
					    		margin-top: 20px;
					    	}
					    	.error{
					    		display:flex;
					    		justify-content: center;
					    	}
					    	a{
					    		margin-bottom: 10px;
					    	}
					    </style>
					  </head>
					  <body>
					   
					<div class="container">
						<h2>User List</h2>

					<!-- Display error status message -->
					<?php if(!empty($statusMsg)){ ?>
					<div class="col-xs-12 error">
						<div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
					</div>
					<?php } ?>

						<div class="row">
						<div class="col-md-12" id="importFrm">
							<form action="upload.php" method="post" enctype="multipart/form-data" class="form-inline">
								<div class="form-group mx-sm-3 mb-2">
									<label for="formGroupExampleInput">Import csv file only &nbsp;</label>
									<input type="file" class="form-control" name="file">
								</div>
								<button type="submit" class="btn btn-primary mb-2" name="importSubmit"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;&nbsp;Import</button>

								&nbsp;&nbsp;<a href="export_csv.php" class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;&nbsp;Export</a>
							</form>
						</div>
					</div>


					<table class="table table-striped table-bordered">
						<thead class="thead-dark">
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Contact</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
					        <?php
					        // Get member rows
					        $result = $conn->query("SELECT * FROM users_data ORDER BY id ASC");
					        if($result->num_rows > 0){
					            while($row = $result->fetch_assoc()){
					        ?>
					            <tr>
					                <td><?php echo $row['id']; ?></td>
					                <td><?php echo $row['first_name']; ?></td>
					                <td><?php echo $row['email']; ?></td>
					                <td><?php echo $row['contact_no']; ?></td>
					                <td><?php echo $row['status']; ?></td>
					            </tr>
					        <?php } }else{ ?>
					            <tr>
					            	<td colspan="5">No member(s) found...</td>
					            </tr>
					        <?php } ?>
					        </tbody>
					    </table>
					</div>

					<!-- Optional JavaScript -->
					    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
					    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
					    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
					    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
					  </body>
					</html>