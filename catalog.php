<?php

  include 'db_connect.php';  
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
    <title>Car Catalog</title>
  </head>
  <body>
    <section class="ecatalog">
      <h1>e-catalog Αυτοκινήτων</h1>
      <div class="content">
        <div class="chart">
          <h3>Categories</h3>
          <canvas id="barChart"></canvas>
          <?php
            $categories_by_count=mysqli_query($conn, "SELECT category, COUNT(category) FROM cars GROUP BY category");
            $data = json_encode(mysqli_fetch_assoc($categories_by_count));
            $obj = new stdClass();
            while($data = mysqli_fetch_assoc($categories_by_count)){
              $obj = (object) [$data['category'] => $data['COUNT(category)']];              
            }
            
            // $json_obj=json_encode($obj);
            
            
          ?>
          <script>
            
            var results = <?php echo $obj ?>;
            var categoriesArray= {"Coupe": 2, "Sedan": 5, "Van": 6};
            const context = document
              .getElementById("barChart")
              .getContext("2d");
            const barChart = new Chart(context, {
              type: "bar",
              data: {
                labels: ["Coupe", "Sedan", "Van"],
                datasets: [
                  {
                    label: "# of Votes",
                    data: [categoriesArray["Coupe"], categoriesArray["Sedan"], categoriesArray["Van"]],
                    backgroundColor: [
                      "rgba(255, 99, 132, 0.2)",
                      "rgba(54, 162, 235, 0.2)",
                      "rgba(255, 206, 86, 0.2)",
                      "rgba(75, 192, 192, 0.2)",
                      "rgba(153, 102, 255, 0.2)",
                      "rgba(255, 159, 64, 0.2)",
                    ],
                    borderColor: [
                      "rgba(255, 99, 132, 1)",
                      "rgba(54, 162, 235, 1)",
                      "rgba(255, 206, 86, 1)",
                      "rgba(75, 192, 192, 1)",
                      "rgba(153, 102, 255, 1)",
                      "rgba(255, 159, 64, 1)",
                    ],
                    borderWidth: 1,
                  },
                ],
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true,
                  },
                },
              },
            });
          </script>
        </div>
        <div class="category_details">
          <label for="category">Details for the category:</label>
          <select
            name="category"
            id="categorySelection"
            onchange="selectCategory()"
          >
            <option value="coupe">Coupe</option>
            <option value="sedan">Sedan</option>
            <option value="crossover/suv">Crossover/SUV</option>
            <option value="4x4">4x4</option>
            <option value="minibus">Mini Bus</option>
            <option value="van">Van</option>
          </select>
          <br /><br />
          <?php
            $sql="SELECT * FROM cars";
            $result=$conn->query($sql); $rows=$result->num_rows; //
          $sqltest="SELECT model FROM cars WHERE category = 'Coupe'"; //
          $resulttest=$conn->query($sqltest); // echo $resulttest; //
          $selectOption = $_POST['category']; //
          $result->fetch_assoc()['category']; ?>

          <span class="info" id="car_total">Total: </span
          ><?php  echo  $rows ." Cars"; ?>
          <br /><br />
          <span class="info" id="car_models">Car Models: </span
          ><?php  echo "hello"; ?>
          <br /><br />
          <span class="info" id="car_man">Car Manufacturers: </span
          ><?php  echo "hello"; ?>
          <br /><br />
        </div>
      </div>
    </section>
  </body>
</html>
