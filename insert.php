<?php  
if (isset($_POST['model']) && isset($_POST['manufacturer']) && isset($_POST['cubic']) && isset($_POST['description']) && isset($_POST['category'])) {
	include 'db_connect.php';

	
	$model = trim($_POST['model']);
	$manufacturer = trim($_POST['manufacturer']);
	$cubic = trim($_POST['cubic']);
	$description = trim($_POST['description']);
	$category = trim($_POST['category']);

	if (empty($model) || empty($manufacturer) || empty($cubic) || empty($description) || empty($category)) {
		echo "Please complete all form fields!";
	} else {
		$stmt = $conn->prepare("INSERT INTO cars(model, manufacturer, cubic, description, category) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("ssdss", $model, $manufacturer, $cubic, $description, $category);
		$result = $stmt->execute();

		if ($result) {
			echo "Car successfuly stored!";
		} else {
			echo "Car could not be stored due to an error!";
		}
		$stmt->close();
	}

	mysqli_close($conn);

} else {
	echo "Please complete all form fields!";
}

echo "</br><a href='insert.html'>Back</a>"
?>