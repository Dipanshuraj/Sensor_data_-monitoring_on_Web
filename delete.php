
<?php

$db = mysqli_connect('HostName here','UserName here','Password','DataBase name');

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>
<?php



$del = mysqli_query($db,"TRUNCATE TABLE Table_Name"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
     // redirects to all records page
    	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
<html>
<head>
    <title></title>
</head>
<body>
    
<img src="tick.jpg">
<a href="http://www.home_page_link.co.in"> Return Back To Home Page</a>
</body>
</html>
