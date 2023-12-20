<?php
include("db_connection.php");
if(isset($_POST['query']) && !empty($_POST['query']))
{
	$keyword = $_POST['query'];
	$query = "SELECT * FROM `employe` WHERE `id` LIKE '%$keyword%' or `name` LIKE '%$keyword%'";
}
else
{
	$query="SELECT * FROM student";
}


$data= mysqli_query($conn, $query);
$total= mysqli_num_rows($data);
?>	
<html>
<head>
<style>

.header{
	    background-color:#E8E8E8;
		color:black;
		width:93%;
	    border:none;  
        margin-left:3%;
		margin-top:3%;
		height:1%;
	    padding: 5px 20px 40px 5px;
		border-radius:5px 5px 0 0;
}
   .fbtn{
        background-color:white;
		color:black;
		margin-top:5px;
		font-size:10px;
		border:none;
	    padding: 10px 10px;
		cursor:pointer;	
		float:left;
     		
}
   
  .btn{
        background-color:white ;
		color:black;
		font-size:12px;
		border:none;
		padding: 2px 2px 2px 2px ;
		height:20px;
		cursor:pointer;	
		margin-left:98%;
		margin-top:-20.7px;
  }
  .btn {
  transition-duration: 0.4s;
 }
.btn:hover {
  background-color: #B6C1B5;
  
}

.container{
   width:95%;
   margin-top:-4.2%;
   margin-left:3%;
   box-shadow:3px 5px 40px darkgrey;
   background-image:linear-gradient( 45deg, #333399, #b84dff);
   opacity: 0.9;
   min-height:500px;

}
.res-tab{
     overflow-x:auto;
	 margin-top:60px;
}
   table{
         border-collapse:collapse;
		 width:70%;
		 font-size:18px;
		 font-style:Calibri;
	     height:50%;
		 border:none;
		 border-radius:20px;
		 margin-top:5%;	
    }

.tab-th th{
       background-color:#282828;
	   color:white;
       border:none;  
       height:50px;	 
      padding: 8px;  
   	   
	}
td{
    text-align:center;
	font-size:20px;
    border: 1px solid #c2c2c2;
    padding: 8px;  

}	
img{
   width: 20px;
   height :20px;
 
}

.res-tab tbody tr:nth-child(even){
          background-color:#c2c2c2;
}
	
</style>
</head>
<body>
<div class="header">
	    <form  action="table.php" method="post"  align="center">
          <input type="text" name="query" value="<?php echo @$_POST['query']?>" class="fbtn"  width="70px" style="margin-left:80%;"

		  placeholder="Search for..." required >
          <input type="submit" name="search" class="fbtn"  value="go"></input>
		  
        </form>
		<button class="btn"><a href="add_new.php"><img src="images/add.png"></img></a></button>
     </div>


<div class="container" >
<center>
<div class="res-tab">
	<?php if($total > 0) {?>
       <table  cellspacing="0px">
          <thead>
              <tr class="tab-th">
                <th style="border-radius:10px 0 0 0;">#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Salray</th>
                <th style="border-radius:0 10px 0 0;">Actions</th>
              </tr>
          </thead>		
			<tbody>
			<?php 	
			
				while($result= mysqli_fetch_assoc($data))
				 {
				?>
				
					 <tr>
						<td><?php echo $result['id']?></td>
						<td><?php echo $result['name']?></td>
						<td><?php echo $result['address']?></td>
						<td ><?php echo $result['salary']?></td>				
						<td>
							<a href="view.php?id=<?php echo $result['id']?>"><img src="images/vvv.jpg"></img></a>
							<a href="update.php?id=<?php echo $result['id'] ?>"><img src="images/eee.jpg"></img></a>
							<a href="delete.php?id=<?php echo $result['id']?>" onclick='return checkdelete()'><img src="images/dd.jpg"></img></a>
						</td>
					</tr>
				 <?php 
					 }
				 ?>
			</tbody>
		</table>
	<?php }else{?>
	<center>No Record Found</center>
	<?php }?>
</div>
<script>
 function checkdelete()
 {
 	return Confirm('Are you sure to delete the record');
 }
</script>
</body>
</html>
