<?php
			$sql_select="select * from property_type order by id desc";
			$re_select=mysqli_query($conn,$sql_select);
			$i=0;
			while($d_select=mysqli_fetch_array($re_select))
			{	
				$id=$d_select['propertyTypeID'];
				if(isset($_REQUEST['list'][$id]))
				{
						
						$del="delete from property_type  where propertyTypeID='$id'";
						if(!mysqli_query($conn,$del)){
							$_SESSION['DB_ERROR'] = mysqli_error($conn);
						}
						
				}
			}
// @header("location:propertytype.php");
?>				