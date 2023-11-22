<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/style.css">
    <title>MVC PHP Example</title>
</head>
<body>
    <main class="wrapper">
        <section class="products-container">
            <header>
                <h1>Lista de Productos</h1>
            </header>
            <?php foreach( $products as $product ) { ?>
                <ul class="product-info">
                    <li><span>Codigo:</span> <?= $product->getProductCode();  ?></li>
                    <li><span>Nombre:</span> <?= $product->getProductName();  ?></li>
                    <li><span>Descripcion breve:</span> <?= $product->getProductShortName();  ?></li>
                    <li><span>Precio:</span> USD$ <?= $product->getProductPvp();  ?> </li>
                </ul>
            <?php  } ?>
        </section>
    </main>
</body>
</html>