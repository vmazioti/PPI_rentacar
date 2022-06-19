<?php  
if (isset($_POST['username']) && isset($_POST['password'])) {
	include 'db_connect.php';

	
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (empty($username) ||empty($password)) {
		echo "Please complete all form fields!";
	} else {
  if($username!='root' || $password!='admin123'){
   echo 'You do not have admin privileges';
  }
    echo "<b>Newsletter Subscriptions</b>";
    $result=mysqli_query($conn, "SELECT * FROM clients");

    echo "<table border='1'>
    <tr>
    <td align=center> <b>Username</b> </td>
    <td align=center> <b>Name</b> </td>
    <td align=center> <b>Email</b> </td>";

    while($data=mysqli_fetch_row($result)){
     echo "<tr>";
     echo "<td align=center>$data[0]</td>";
     echo "<td align=center>$data[1]</td>";
     echo "<td align=center>$data[2]</td>";
     echo "</tr>";
    }

    echo "</table>";
	}

	mysqli_close($conn);

} else {
	echo "Please complete all form fields!";
  
}
echo "</br><a href='admin.html'>Back</a>"

?>