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
<title>6C1</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

:root{
    --brown:#B08968;
    --brown-dark:#8B5E34;

    --beige:#F6EFE7;

    --moss:#7FA37A;
    --moss-dark:#5F7D5B;
}

body{
    background:
    radial-gradient(circle at top,
    #ffffff 0%,
    var(--beige) 40%,
    #e6d7c7 100%);
}

/* HEADER */

header{
    background:
    linear-gradient(135deg,var(--brown),var(--brown-dark));

    display:flex;
    justify-content:center;
    align-items:center;

    height:120px;

    box-shadow:0 6px 18px rgba(0,0,0,0.15);
}

.logo{
    width:140px;
}

/* NAV */

nav{
    background:rgba(95,125,91,0.9);

    display:flex;
    justify-content:center;
    gap:40px;

    padding:15px;

    position:sticky;
    top:0;

    z-index:100;
}

nav a{
    color:white;
    text-decoration:none;
    font-weight:bold;
}

/* HERO */

.hero{
    background:
    linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.3)),
    url("6C1.png");

    background-size:cover;
    background-position:center;

    height:450px;

    display:flex;
    justify-content:center;
    align-items:center;

    color:white;
    text-align:center;
}

.hero h2{
    font-size:48px;
}

/* PRODUKTE */

.products{
    padding:70px 20px;
    text-align:center;

    background:
    linear-gradient(135deg,var(--brown),var(--brown-dark));

    color:white;
}

.product-container{
    display:grid;
    grid-template-columns:
    repeat(auto-fit,minmax(320px,1fr));

    gap:35px;

    margin-top:40px;
}

.product-card{
    background:white;
    color:#222;

    border-radius:22px;

    overflow:hidden;

    padding:18px;

    transition:0.3s;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.12);

    cursor:pointer;
}

.product-card:hover{
    transform:translateY(-10px);

    box-shadow:
    0 18px 45px rgba(0,0,0,0.2);
}

/* BILDER */

.main-image{
    width:100%;
    height:360px;

    object-fit:cover;

    border-radius:18px;
}

.thumbnail-row{
    display:flex;
    justify-content:center;
    gap:10px;

    margin-top:14px;
}

.thumb{
    width:75px;
    height:75px;

    object-fit:cover;

    border-radius:12px;

    cursor:pointer;

    border:3px solid transparent;

    transition:0.2s;
}

.thumb:hover{
    transform:scale(1.05);
}

.thumb.active{
    border-color:var(--moss);
}

/* TEXT */

.product-card h3{
    margin-top:18px;
    font-size:24px;
}

.product-card p{
    margin-top:10px;

    font-size:22px;
    font-weight:bold;

    color:var(--moss);
}

/* BUTTON */

.buy-btn{
    width:100%;

    margin-top:18px;
    padding:14px;

    border:none;
    border-radius:14px;

    background:
    linear-gradient(135deg,var(--moss),var(--moss-dark));

    color:white;

    font-size:17px;
    font-weight:bold;

    cursor:pointer;

    transition:0.3s;
}

.buy-btn:hover{
    transform:scale(1.02);
}

/* ABOUT + CONTACT */

.about,
.contact{
    padding:80px 20px;

    text-align:center;

    max-width:900px;

    margin:40px auto;

    background:rgba(255,255,255,0.75);

    border-radius:20px;

    box-shadow:
    0 10px 25px rgba(0,0,0,0.1);
}

/* FOOTER */

footer{
    background:#111;
    color:white;

    text-align:center;

    padding:50px;
}

</style>
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
