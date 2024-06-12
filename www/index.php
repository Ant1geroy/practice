<!-- put in ./www directory -->

<html>
 <head>
  <title>Hello...</title>

  <!-- <meta charset="utf-8">  -->

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <h1>Hi! I'm happy</h1>


    <?php
    $conn = mysqli_connect('mysql_db', 'user', 'test', 'myDb');

    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    echo("hhh");

    $query = "SELECT * From Person";
    $result = mysqli_query($conn, $query);

    echo '<table class="table table-striped">';
    echo '<thead><tr><th></th><th>id</th><th>name</th></tr></thead>';
    while($value = $result->fetch_array())
    {
        echo '<tr>';
        echo '<td><a href="#"><span class="glyphicon glyphicon-search"></span></a></td>';
        foreach($value as $element){
            echo '<td>' . $element . '</td>';
        }

        echo '</tr>';
    }
    echo '</table>';

    $result->close();

    mysqli_close($conn);

    ?>

        <!-- PostgreSQL -->
    <?php
    $conn_pgsql = pg_connect("host=postgres_db dbname=newDB user=pupa007 password=test");

    if (!$conn_pgsql) {
        echo "Failed to connect to PostgreSQL: " . pg_last_error();
        exit();
    }

    echo("<h2>Data from PostgreSQL:</h2>");

    $query_pgsql = "SELECT * FROM birthday";
    $result_pgsql = pg_query($conn_pgsql, $query_pgsql);

    if (!$result_pgsql) {
        echo "An error occurred.\n";
        exit();
    }

    echo '<table class="table table-striped">';
    echo '<thead><tr><th></th><th>name</th><th>year</th><th>id</th></tr></thead>';
    while ($value_pgsql = pg_fetch_assoc($result_pgsql)) {
        echo '<tr>';
        echo '<td><a href="#"><span class="glyphicon glyphicon-search"></span></a></td>';
        foreach ($value_pgsql as $element_pgsql) {
            echo '<td>' . htmlspecialchars($element_pgsql) . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';

    pg_free_result($result_pgsql);
    pg_close($conn_pgsql);
    ?>
    </div>
</body>
</html>
