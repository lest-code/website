<?php

$host = "kxis.your-database.de";
$user = "lemaco_shop";
$pass = "k4~GFMg?WqU&";
$db   = "lemaco_shop";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error){
    die("DB Fehler: " . $conn->connect_error);
}

$produkte = [];
$result = $conn->query("SELECT * FROM produkte");

while($row = $result->fetch_assoc()){
    $produkte[] = $row;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="mystyle.css">
<title>6C1</title>

</head>

<body>

<header>
    <img src="6C1.png" class="logo">
</header>

<nav>
    <a href="#about">Über uns</a>
    <a href="#produkte">Produkte</a>
    <a href="#kontakt">Kontakt</a>
</nav>

<section class="hero">
    <h2>Willkommen bei <span style="font-size: X-LARGE;">SIX</span>C1</h2>
</section>

<section id="produkte" class="products">

    <h2>Produkte</h2>

    <div class="product-container">

        <?php foreach($produkte as $p): ?>

        <div class="product-card">

            <img id="mainImage<?= $p['id'] ?>"
                 src="images/jeans-bag/1.jpg"
                 class="main-image">

            <div class="thumbnail-row">

                <img src="images/jeans-bag/2.jpg"
                     class="thumb active"
                     onclick="changeImage(event, <?= $p['id'] ?>, this.src)">

                <img src="images/jeans-bag/3.jpg"
                     class="thumb"
                     onclick="changeImage(event, <?= $p['id'] ?>, this.src)">

                <img src="images/jeans-bag/4.jpg"
                     class="thumb"
                     onclick="changeImage(event, <?= $p['id'] ?>, this.src)">

                <img src="images/jeans-bag/5.jpg"
                     class="thumb"
                     onclick="changeImage(event, <?= $p['id'] ?>, this.src)">

            </div>

            <h3><?= $p['name'] ?></h3>

            <p><?= $p['preis'] ?> €</p>

            <button class="buy-btn">
                Kaufen
            </button>

        </div>

        <?php endforeach; ?>

    </div>

</section>

<section id="about" class="about">

    <h2>Über uns</h2>

    <p>
        SixC1 ass eng ëmweltfrëndlech Kleedermark,
        déi am Lycée Ermesinde Lëtzebuerg gegrënnt gouf.
        Eist Ziel ass et,
        aus ale Kleeder neier ze maachen
        an esou mat engem gudde Beispill géint
        Massentextilproduktioun virzegoen.
    </p>

</section>

<section id="kontakt" class="contact">

    <h2>Kontakt</h2>

    <p>E-Mail: morgane.stumpf@lem.lu</p>
    <p>E-Mail: wolch892@school.lu</p>

</section>

<footer>
    &copy; 2026 6C1
</footer>

<script>

function changeImage(event,id,src){

    event.stopPropagation();

    document.getElementById(
        "mainImage"+id
    ).src = src;

    const thumbs =
    event.target.parentElement
    .querySelectorAll(".thumb");

    thumbs.forEach(t =>
        t.classList.remove("active")
    );

    event.target.classList.add("active");
}

</script>

</body>
</html>
