<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="row justify-content-center border border-dark m-1" style="min-height: 60px;">
        <?php foreach ($allCategories as $category): ?>
            <div class="col text-center">
                <a href="#"><?= $category['libelle']; ?></a>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="container">
    <div class="row" style="min-height: 70px;">
        
    </div>
    <div class="row" style="min-height: 120px;">
        <div class="col border border-dark"><center><p><H3><?php echo $message; ?></H3></p></center></div>
    </div>
    <div class="row">
        <div class="col border border-dark"- style="min-height: 120px;"><center><p><H3><?php echo $message; ?></H3></p></center></div>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</html>