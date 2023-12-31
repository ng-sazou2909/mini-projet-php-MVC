<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="row justify-content-center border border-dark m-3" style="min-height: 60px;">
        <?php foreach ($allCategories as $category): ?>
            <div class="col text-center">
            <form action="/mini-projet-php/articles/category/<?= $category['id']; ?>" method="get">
                    <button type="submit" class = "btn btn-outline-secondary m-3"><?= $category['libelle']; ?></button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row justify-content-center border border-dark m-3" style="min-height: 60px;">
        <div class="container m-3">
            <div class="row" style="min-height: 15px;"></div>
            <div class="row" style="min-height: 120px;">
                <?php if (!empty($allArticles)): ?>
                    <?php foreach ($allArticles as $article): ?>
                        <div class="col border border-dark m-1">
                            <center>
                                <p><strong><?php echo $article['titre']; ?></strong></p>
                                <p><?php echo $article['contenu']; ?></p>
                            </center>
                        </div>
                    <?php endforeach; ?>
                <?php elseif (empty($allArticles) && $vide): ?>
                    <div class="col border border-dark">
                        <center>
                            <p><H6 style="color: brown;"><?php echo $message; ?></H6></p>
                        </center>
                    </div>
                <?php else: ?>
                    <div class="col border border-dark">
                        <center>
                            <p><H3><?php echo $message; ?></H3></p>
                        </center>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row" style="min-height: 450px;"></div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</html>