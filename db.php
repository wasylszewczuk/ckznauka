<?php
// połączenie z bazą danych: store
$db = mysqli_connect("localhost", "root", "", "store");
if(!$db) {
    echo "Brak połączenia z bazą danych." . mysqli_error($db);
    exit();
}
?>