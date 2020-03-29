<?php
// var_dump($_REQUEST); die();
			$sql_select="select * from post order by id desc";
			$re_select=mysqli_query($conn,$sql_select);
			$i=0;
			while($d_select=mysqli_fetch_array($re_select))
			{	
				$id=$d_select['postID'];
				if(isset($_REQUEST['list'][$id]))
				{
						
						$del="delete from post where postID='$id'";
						if(!mysqli_query($conn,$del)){
							$_SESSION['DB_ERROR'] = mysqli_error($conn);
						}
						
				}
			}
			// @header("location:allpost.php");
?>				