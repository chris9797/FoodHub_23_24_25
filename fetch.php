<?php
$connect = mysqli_connect("localhost", "root", "", "search");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM searchengine 
	WHERE title LIKE '%".$search."%'
	OR description LIKE '%".$search."%' 
	OR url LIKE '%".$search."%' 
	OR keywords LIKE '%".$search."%' 
	";
}
else
{
	$query = "
	SELECT * FROM searchengine ORDER BY id";
}

$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	
	while($row = mysqli_fetch_array($result))
	{
				$title = $row["title"];
				$desc = $row["description"];
				$url = $row["url"];
				$img = $row["img"];

					echo "

<tr><td><a href='$url'><img src='$img' height=150/></a></td>					
<td><a href='$url'><b>$title</b><br></a>
$desc<br></td></tr>
<tr><td>        &nbsp</td></tr>
";
	}
	
}
else
{
	echo 'Restaurant Not Found';
}
?>