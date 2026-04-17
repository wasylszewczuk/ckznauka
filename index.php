<!-- 
    Snippety:
    1. Struktura html (Podstawowa): Shift + 1 (wybrać znak '!')
    2. Podłączyć plik w formacie .css: link:css + Enter
    3. Zmiana nazwy pliku: F2
-->
<?php
include('db.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep internetowy z podzespołami komputerowymi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   
    <section>
        <header>
            <a href="index.php">
                <img src="logo.png" alt="Logo">
            </a>
            
           
        </header>
        <?php include('navigation.php'); ?>
        <main class="main">
            <aside class="left">
                <h3>Lista kategorii</h3>
            </aside>
            <section class="center">
                <h2>Produkty z kategorii</h2>
            </section>
        </main>
        <footer>
            <p>2026 &copy; <a href="#">Stronę</a> wykonał: Jan Kowalski</p>
        </footer>
    </section>

</body>
</html>