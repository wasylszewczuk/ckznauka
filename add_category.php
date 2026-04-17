<?php
    include('db.php');

    $komunikat = []; // tablica z komunikatami
    $errors = [];    // tablica z błędami

    if(isset($_POST['dodaj'])) {

        $name = $_POST['name'];
        $create_date = date("Y-m-d H:i:s");


        // walidacja wymaganych pól
        if($name == "") {
            $errors[] = "Podaj nazwę kategorii";
        } else if(!isset($_FILES['photo']) || $_FILES['photo']['name'] == "") {
            $errors[] = "Wybierz zdjęcie.";
        } else {
            $folder = "uploads/categories/";

            if(!is_dir($folder)) {
                mkdir($folder, 0777, true);
            }

            $nazwa_pliku = $_FILES['photo']['name'];
            $tmp = $_FILES['photo']['tmp_name'];

            $format_pliku = strtolower(pathinfo($nazwa_pliku, PATHINFO_EXTENSION));
            $dozwolone = array("jpg", "jpeg", "png", "webp");

            if(!in_array($format_pliku, $dozwolone)) {
                $errors[] = "Dozwolone  pliki tylko: jpg, jpeg, png i webp";
            } else {
                $nowa_nazwa = time() . "_" . rand(1000, 9999) . "." . $format_pliku;
                $sciezka = $folder . $nowa_nazwa;

                if(move_uploaded_file($tmp, $sciezka)) {
                    $sql = "INSERT INTO categories (name, photo, create_date) 
                                 VALUES ('$name', '$sciezka', '$create_date')";

                    $result = mysqli_query($db, $sql);

                    if($result) {
                        $komunikat[] = "Kategoria została dodana poprawnie";
                    } else {
                        $errors[] = "Błąd zapisu do bazy: " . mysqli_error($db);
                    }
                } else {
                    $errors[] = "Nie udało się przesłać pliku";
                }

            }
        }
    }


?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="add_cat">
        <header>
            <a href="index.php">
                <img src="logo.png" alt="Logo">
            </a>
        </header>
        <?php
            include('navigation.php');
        ?>
        <main class="main">
            <section class="center">
                <a href="add_category.php" class="link">
                    <h2>Dodanie nowej kategorii</h2>
                </a>
                <?php
                    // tablica z błędami
                    if(!empty($errors)) {
                        foreach($errors as $error) {
                            echo '<section class="error">' . $error . '</section>';
                            
                        }
                    }
                    // tablica z komunikatami (pomyślnie)
                    if($komunikat) {
                       foreach($komunikat as $ok) {
                            echo '<section class="alerts">' . $ok . '</section>';
                       } 

                    }
                    
                ?>
                <section class="add_category">
                    <form action="" method="post" enctype="multipart/form-data">
                        <section class="item">
                            <label for="name">Nazwa kategorii</label>
                            <input type="text" name="name" id="name">
                        </section>
                        <section class="item">
                            <label for="photo">Zdjęcie</label>
                            <input type="file" name="photo" id="photo">
                        </section>
                        <section class="item">
                            <label for="submit"></label>
                            <button type="submit" name="dodaj" class="button">Dodaj kategorie</button>
                        </section>

                    </form>
                </section>
            </section>
        </main>
        <footer>
            <p>2026 &copy; <a href="#">Stronę</a> wykonał: Jan Kowalski</p>
        </footer>
    </section>
</body>
</html>