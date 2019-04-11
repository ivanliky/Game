<?php
$title = "Pocetna";
$href = 'style.css';
require 'bodyUp.php';
?>

    <div id="pocetna">
    <h1>Dobrodosao u igru Imperija</h1>
    <p>Za pocetak je potrebno da uneses podatke</p>

    <form action="Podaci.php" method="post" enctype="multipart/form-data">
            <label for="ime">Tvoje ime</label>
            <input type="text" name="imeIgraca" id="ime"><br>
            <p></p>
            <label for="prezime">Tvoje prezime</label>
            <input type="text" name="prezimeIgraca" id="ime"><br>
            <p></p>
            <label for="prezime">Izaberi avatar</label>
            <input type="file" name="file" id="file"><br>
            <p></p>
            <input type="submit" name="igrac" value="Nastavi">
    </form>
    </div>
</body>
</html>

