<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Car Catalog</title>
  </head>
  <body>
    <section class="ecatalog">
      <h1>e-catalog Αυτοκινήτων</h1>
      <div class="content">
        <div class="chart">
          <h3>Categories</h3>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi maxime
          minus explicabo repellendus, et possimus perferendis reiciendis iure
          sunt harum?
        </div>
        <div class="category_details">
          <label for="category">Details for the category:</label>
          <select name="category" id="">
            <option value="coupe">Coupe</option>
            <option value="sedan">Sedan</option>
            <option value="crossover/suv">Crossover/SUV</option>
            <option value="4x4">4x4</option>
            <option value="minibus">Mini Bus</option>
            <option value="van">Van</option>
          </select>
          <br /><br />
         <span class="info">Total: </span><?php  echo "hello"; ?>
         <br><br>
         <span class="info">Car Models: </span><?php  echo "hello"; ?>
         <br><br>
         <span class="info">Car Manufacturers: </span><?php  echo "hello"; ?>
         <br><br>
        </div>
      </div>
    </section>
  </body>
</html>