<?php
include('db.php');

    $id = $_GET['id']; // pobiera wartość z adresu (url) po znaku ?
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
    <section>
        <header>
            <a href="index.php">
                <img src="logo.png" alt="Logo">
            </a>
        </header>
        <?php include('navigation.php'); ?>
        <main class="products">
            <h1>Lista towarów w kategorii</h1>
            <?php
                $sql = "SELECT 
                            id, 
                            category_id, 
                            name, 
                            description, 
                            price,
                            photo,
                            create_date 
                        FROM
                            products
                        WHERE
                            category_id = '$id'
                        AND
                            status = '1'";
                        
                $result = mysqli_query($db, $sql);

                if(mysqli_num_rows($result) <= 0) {
                    echo '
                        <section class="error">
                            Brak towarów w wybranej kategorii
                        </section>';
                } else {

                while($row = mysqli_fetch_array($result)):
            ?>
                    <section class="product">
                        <img src="<?= $row['photo'] ?>" alt="">
                        <h3><a href=""><?= $row['name'] ?></a></h3>
                    </section>

                <?php endwhile; 
                }
            ?>
        </main>

        <footer>
            <p>2026 &copy; <a href="#">Stronę</a> wykonał: Jan Kowalski</p>
        </footer>
    </section>
</body>
</html>