
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

  <div class="container">
      <div class="row">
        <div class="col-md-12 mt-4">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">FILTER/SEARCH</h4> <!-- Header -->
            </div>
            <div class="card-body"> 
              <form action="" method="post">
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="filter_value" class="form-control" placeholder="Search/Filter Record">  <!-- Suchleiste -->
                </div>
              </div>
              <div class="col-md-6"> 
                  <button type="submit" name ="filter_btn" class="btn btn-primary">Filter Data</button>  <!-- Button -->
              </div>
              <div class="row">
              </form>

              <!-- Tabelle -->
              <table class="table table-bordered">
                <thead> 
                  <tr>
                    <th scope="col">Filmtitel</th>
                    <th scope="col">Erscheinungsdatum</th>
                  </tr>
                </thead>
                <tbody>
                  <?php       //Daten werden hier rausgesucht. wie bei index.php
                  $connection = mysqli_connect("localhost","root","","filme");
                    if(isset($_POST['filter_btn']))
                    {
                      $value_filter = $_POST['filter_value'];
                      $query = "SELECT filmtitel, Erscheinungsdatum FROM film 
                      WHERE CONCAT(filmtitel) LIKE '%$value_filter%'
                      ";
                      $query_run = mysqli_query($connection, $query);


                      if(mysqli_num_rows($query_run) > 0)
                      {
                        while($row = mysqli_fetch_array($query_run))
                        {
                          
                          ?>
                          <tr>
                            <td><?php echo $row['filmtitel']; ?></td>
                            <td><?php echo $row['Erscheinungsdatum']; ?></td>
                          </tr> 
                          <?php
                        }
                      }
                      else
                      {
                      ?>
                      <tr>
                        <td colspan ="2">No Record Found</td>  
                      </tr>
                      <?php
                      }
                    }
                  ?>
                  
                </tbody>
              </table>  

            </div>
          </div>
        </div>
      </div>
  
    </div> 





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>