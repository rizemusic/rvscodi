<!-- !!!!!Datei in htdocs verschieben!!!!  -> C:\\XAMP\htdocs -->

<!doctype html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- CSS dabei anbinden FALLS NÖTIG -->
    <link rel ="stylesheet" href = "style.css">  <!-- falls css datei benötigt, css datei im selben Ordner erstellen und style.css benennen, sonst kannst du löschen -->

    <title>LAP</title>
  </head>
  <body>
    
    <!-- Navbar (Überschrifft) -->
      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand fw-bold" href="#">Filmsuche</a>
        </div>
      </nav>

      
    <!-- Suchleiste und Button  -->
    <form action="" method="post">                  <!-- Falls du mit dem Button auf eine andere Seite musst, -> action="Seite.php" -->
      <div class="w-50 p-3">
        <div class="input-group mt-3">
          <input type="text" class="form-control" placeholder="Filmsuche" name="suche"> <!-- name vergeben um Eingabe zu übergeben -->
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" name="submitbtn">Suchen</button> <!-- name vergeben um in php zu übergeben -->
          </div>
        </div>
      </div>
    </form>

    <!-- Tabelle  -->
      <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Titel</th>
          <th scope="col">Erscheinungs-Datum</th>
          <th scope="col">Produktionsfirma</th>
        </tr>
      </thead>
    </table>
  </body>
</html>


<!-- Datenbank -->

<?php
if (isset($_POST['submitbtn'])) {   //Button Namen angeben      -> Wenn button click, dann führe aus
    $searchValue = $_POST['suche']; // Eingabe übergeben        -> Eingabe wird übergeben
    $con = new mysqli("localhost", "root", "", "filme");     // -> "filme" in deine Datenbank umbenennen    
    if ($con->connect_error) {        
        echo "connection Failed: " . $con->connect_error;
    } else {
      // SQL Query eingeben
        $sql = "SELECT Filmtitel, Erscheinungsdatum,          
        (SELECT StudioName from Studio s where s.studioID = f.FirmenNr) AS Produktonsfirma  
        FROM filme.film f WHERE Filmtitel LIKE  '%$searchValue%'";  // LIKE '%$searchValue%' !wichtig um Daten zu holen die deiner Angabe übereinstimmt, die % zeichen bestimmen die filterung. 
                                                                    // '%searchValue%' = sucht in der Datenbank alle daten die was deine Angabe beinhalten
                                                                    // '%searchValue' = sucht alle daten die was gleich Anfangen

        $result = $con->query($sql);
      
        // Ausgabe
        while ($row = $result->fetch_assoc()) {
            echo $row['Filmtitel'] . "<br>";          // 'Filmtitel' mit Feldname überschreiben falls anders
            echo $row['Erscheinungsdatum'] . "<br>";  // - //
            echo $row['Produktonsfirma'] . "<br>";    // - //
            echo "<br>";    // - //
        }
    }   
}



?>