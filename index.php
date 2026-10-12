<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kenyan Table | Home Recipes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="site-header">
        <a class="wordmark" href="index.php" aria-label="Kenyan Table home"><span class="wordmark-mark">K</span> Kenyan Table</a>
        <span class="header-note">A little taste of home</span>
    </header>
    <main class="page-shell">
        <section class="intro" aria-labelledby="page-title">
            <p class="eyebrow">Recipes from the Kenyan kitchen</p>
            <h1 id="page-title">Good food, <em>shared.</em></h1>
            <p class="intro-copy">Find a familiar favourite and bring it to the table.</p>
        </section>

        <section class="recipe-picker" aria-label="Choose a recipe">
            <div class="picker-copy">
                <span class="picker-number">01</span>
                <div>
                    <h2>What are we cooking?</h2>
                    <p>Choose a dish to see its recipe.</p>
                </div>
            </div>
    <?php
        function e($value) {
            return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
    ?>

    <?php
        $pages = [
            'githeri' => 'githeri',
            'omena' => 'omena',
            'sembe' => 'sembe',
            'viazi' => 'viazi'
        ];
    ?>

    <form class="picker-form" action="index.php" method="GET">
        <label class="visually-hidden" for="recipe-select">Select a recipe</label>
        <select name="page" id="recipe-select">
            <option value="">Please Select a Recipe</option>
            <?php foreach ($pages as $name => $value): ?>
                <option value="<?= e($value) ?>" <?= (!empty($_GET['page']) && $_GET['page'] === $value) ? 'selected' : '' ?>><?= e($name) ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Show recipe <span aria-hidden="true">→</span></button>
    </form>
        </section>

    <?php
        if (!empty($_GET['page'])) {
            $page = $_GET['page'];
            if (array_key_exists($page, $pages)) {
                echo file_get_contents("pages/" . $pages[$page] . ".html");
            }
        }

    ?>
    </main>
    <footer class="site-footer"><span>Kenyan Table</span><span>Made for the everyday meal.</span></footer>
</body>
</html>