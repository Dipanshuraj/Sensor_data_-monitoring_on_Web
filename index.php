<?php



// Create connection
$con = mysqli_connect('hostnamee_here','user_name here','password_here');

// Check connection
if (!$con)
    echo ":(";
else

echo ":)";

mysqli_select_db($con,' DataBase_name here');

if (isset($_GET['page'])) 
{
   $page=$_GET['page'];
}
else
{
	$page=1;
}
$limit=10;
$start_from =($page-1)*$limit;
#$query="select * from classics";
#$result= mysql_query($con,$query);
$q="select * from TABLE_NAME ORDER BY sr_id DESC limit $start_from,$limit";    //editing needed here to sort according date and time
$result =mysqli_query($con,$q);
$num=mysqli_num_rows($result);


?>
<!DOCTYPE html>
<html>
<head>
    
	<title></title>
</head>
<body>
    
<table align="center" border="1px" style="width: 900px; line-height: 30px;" id="myTable">
	
<tr><th colspan="09", bgcolor="yellow">PANEL HEALTH</th></tr>
	
	<t>
		<th>Sr.No</th>
		<th>PANEL_ID</th>
		<th>ZONE</th>
		<th>TYPE</th>
	    <th>DATE_ / _TIME</th>
	    </t>
		<?php
		  for($p=$start_from+1;$p<=$num+($page-1)*10;$p++)
		{
		   $row=mysqli_fetch_assoc($result);
		   

		                                       ?>
		 <tr align="center">
		 	<td><?php echo $p; ?></td>
		 	<td><?php echo $row['panel_id']."  "; ?></td>
			<td><?php echo $row['zone']."  "; ?></td>
			<td><?php echo $row['type']."  "; ?></td>
			<td><?php echo $row['date']."  "; ?></td>
		 </tr>
		<?php } ?>
</table>


<a href="delete.php" style="float: right;">Delete All</a>

<?php 
$pr_query="select * from TABLE_NAME";
$pr_result= mysqli_query($con,$pr_query);
$total_record=mysqli_num_rows($pr_result);
$total_pages=ceil($total_record/$limit);

if($page>1)
{
	echo "<a href='index.php?page=".($page-1)."'>Previous </a>";

}


for($i=1;$i<$total_pages;$i++)
{
  echo "<a href='index.php?page=".$i."'> $i </a>";
}

if($i>$page)
{
	echo "<a href='index.php?page=".($page+1)."'> Next</a>";

}
?>
  <div style="position: absolute; bottom: 0; right: 0;">
    Made with <svg viewBox="0 0 1792 1792" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" style="height: 0.8rem;"><path d="M896 1664q-26 0-44-18l-624-602q-10-8-27.5-26T145 952.5 77 855 23.5 734 0 596q0-220 127-344t351-124q62 0 126.5 21.5t120 58T820 276t76 68q36-36 76-68t95.5-68.5 120-58T1314 128q224 0 351 124t127 344q0 221-229 450l-623 600q-18 18-44 18z" fill="#e25555"></path></svg> in INDIA
  </div>




</body>
</html>
<?php mysqli_close($con);?>
