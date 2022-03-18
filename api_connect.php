<?php
   // print de array
  function preprint_r( $arr ) {
    echo '<pre>'; 
    print_r( $arr );
    echo '</pre>'; 
  }  

  
  //verdindingsvariabelen database 
$host = 'localhost';
$db   = 'aventus-173566_database';
$user = 'aventus-173566_student';
$pass = '2A7%BiDgcbhuu2ql';
$charset = 'utf8mb4';
  
  
  //connection string en PDO settings
  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  $options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];
  
  
  //verbinding maken met database
  try {
    $pdo = new PDO($dsn, $user, $pass, $options);
  } catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
  }   
      
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} else 
    
// 2 querries om een random restaurant te kiezen en daarna met het restaurant id een random recept    
$stmt = $pdo->query ("SELECT * FROM RECEPT WHERE `RESTAURANT_Restaurant_ID` LIKE 1 ORDER BY RAND() LIMIT 1");
$stmt2 = $pdo->query ("SELECT * FROM RESTAURANT ORDER BY RAND() LIMIT 1;");

// array maken met een loop om de info in een array te zetten      
$restaurants = [];
while( $row = $stmt2->fetch() ) {
    $restaurants[] = ['id' => $row['Restaurant_ID'],
                      'name' => $row['Naam']
                     ];
}
    
$stmt = $pdo->query ("SELECT * FROM RECEPT WHERE `RESTAURANT_Restaurant_ID` LIKE {$restaurants[0]['id']} ORDER BY RAND() LIMIT 1");
// lege array maken om te vullen met info
$recipes = [];
// door de array loopen om te vullen met info
while( $row = $stmt->fetch() ) {
    $recipes[] = ['recipe_id' => $row['Recept_ID'],
                      'name' => $row['Omschrijving'],
                      'ingredients' => $row['Ingredienten'],
                      'portions' => $row['Personen'],
                        'cooking_time' => $row['Beredingstijd'],
                      'restaurant_id' => $row['RESTAURANT_Restaurant_ID'],
				  		'URL' => $row['URL']
                     ];
}

	// om de json te laten zien voor testen 
      header( 'Content-type: application/json');
	// encoden naar json en vervolgens te laten zien met een echo
      echo json_encode( $recipes );
	  // echo json_encode( $restaurants );
?>
