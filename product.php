<?php
include('db.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkt</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<section>
    <header>
        <a href="index.php">
            <img src="logo.png" alt="Logo">
        </a>
    </header>

    <?php
        include('navigation.php');
    ?>

    <main class="product_main">
        <h1>Pełna nazwa towaru</h1>

        <section class="product_content">
            <div class="product_image">
                <span>ZDJĘCIE TOWARU</span>
            </div>

            <div class="product_info">
                <h3>Opis towaru</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Eligendi, debitis placeat laboriosam, ea eaque magni optio
                    cumque fuga esse dolore, blanditiis asperiores similique dolor.
                    Dolores inventore aliquam laboriosam aut recusandae?
                </p>

                <div class="product_bottom">
                    <span class="price">1250,00 zł</span>
                    <button class="cart_btn">Dodaj do koszyka</button>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>2026 &copy; <a href="#">Stronę</a> wykonał: Jan Kowalski</p>
    </footer>
</section>

</body>
</html>