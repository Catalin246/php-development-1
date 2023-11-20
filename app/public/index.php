<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Navbar</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container text-center">
        <div class="row">
            <h1>The best products</h1>
            <h>Here you will find fresh articles, specially curated for you by our experts.</h5>
        </div>
    </div>

    <section>
        <div class="container">
            <h2>Miscellaneous</h2>
            <div class="row">
                <?php
                require_once("fakeproducts.php");
                foreach ($products as $product) {
                    ?>
                    <div class="col">
                        <img src="<?= $product->image ?>" alt="<?= $product->title ?>">
                        <p>
                            <?= $product->title ?>
                        </p>
                        <p><small>
                                <?= $product->category ?>
                            </small></p>

                        <span>
                            <?= number_format($product->price, 2, '.') ?>
                        </span>
                        <button> + </button>
                    </div>
                    <?php
                }
                ?>
            </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>