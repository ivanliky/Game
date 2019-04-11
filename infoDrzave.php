<?php 
require_once 'Database.php';
require_once 'NapadnutaStrana.php';
$title = "infoDrzave";
$href = "style.css";
require 'bodyUp.php';
?>
    <h1>Podaci o drzavi</h1>
</body>
</html>

<?php

$database = new Database;
$conn = $database->Conn();
$NapadnutaStrana = new NapadnutaStrana;
echo "<div id='info'>";

$NapadnutaStrana->infoDrzave($conn);
echo "<p><a href='Podaci.php'>Nazad</a></p>";
echo "</div>"; 
?>

</body>
</html>