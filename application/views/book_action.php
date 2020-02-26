<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<head>
	<title>Library Management System</title>
</head>
	<body>
<!-- Header Section[Start] -->
	<div class="content-wrapper">
         <div class="container">
			<div class="row pad-botm">
				<div class="col-md-12">
					<div style="text-align:center" >
						<font style="font: 300 35px/1.3 'Oleo Script', Helvetica, sans-serif" >
						Library Management System</font>
					</div>
<a href = "<?php echo site_url('index.php/book/index/');?>" id="issue" class="btn btn-dark">HOME</a>
<!-- Header Section[End] -->

<!-- Search a book Section[Start] -->
<?php $this->load->view('search_books'); ?>
<!-- Search a book Section[End] -->

<?php   if(count($data)>0){ ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
										<tr>
											<th>Book Name</th>
											<th>Status</th>
											<th>Issue Book</th>
											<th>Return Book</th>
										</tr>
									</thead>
                                    <tbody>
  <?php
	  foreach($data as $row)
	  { 
		  $bookstatus = ($row->status_id==0)?'Available':'Book is issued'; 
		  $status_id  = ($row->status_id==0)? 1:0;
		  $issue_class  = ($row->status_id==0)? 'success':'info';
	  ?>
		<tr class="odd gradeX">
				<td class="center"><?php echo htmlentities($row->book_name)?></td>
				<td class="center"><?php echo htmlentities($bookstatus);?></td>
				<td class="center">
					<?php 
						if($status_id==0){ ?>
							<button class="btn btn-info disabled" >Book is issued</button>	
						<?php }else { ?>
							<a href = "<?php echo site_url('index.php/book/issue_book/'.$row->id.'/'.$status_id);?>" id="issue" class="btn btn-<?php echo $issue_class;?>"  title="<?php echo $bookstatus;?>"><?php echo $bookstatus;?></a>
							<?php } ?>
				</td>
				<td class="center">
				<?php if($status_id == 1){ ?>
					<button class="btn btn-info disabled" >Return</button>	
						<?php }else { ?>
					<a href = "<?php echo site_url('index.php/book/return_book/'.$row->id.'/'.$status_id);?>" class="btn btn-<?php echo $issue_class;?>" id="return" >Return</a>
					<?php } ?>
				</td>
		</tr>
<?php } ?>
									</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		 <?php } else { ?>
		 <center><h5>Sorry,Book is not available</h5></center> 
		 <?php } ?>
	</body>
</html>