<?php
include('db.php');


?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Kategorie</title>
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
        <main class="categories">
            <a href="categories.php" class="link">
                <h1 class="title">Lista kategorii</h1>
            </a>
            <div class="categories-container">
            <?php 
                $sql = "SELECT id, name, photo, create_date FROM categories";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result)): 
                ?>

                <div class="category-card">
                    <div class="category-image">
                       <img src="<?= $row['photo'] ?>" alt="<?= $row['name'] ?>">
                    </div>
                    <h3>
                        <a href="products.php?id=<?= $row['id'] ?>">
                            <?php echo $row['name']; ?>
                        </a>
                    </h3>
                    <a href="products.php?id=<?= $row['id'] ?>" class="button">Zobacz wszystkie</a>
                </div>

                <?php endwhile; ?>
            
            </div>
        </main>
        <footer>
            <p>2026 &copy; <a href="#">Stronę</a> wykonał: Jan Kowalski</p>
        </footer>
    </section>

    
</body>
</html>