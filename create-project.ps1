$dirs = @(
"admin",
"admin\app",
"admin\app\config",
"admin\app\controllers",
"admin\app\models",
"admin\app\dao",
"admin\app\views",
"admin\app\views\layouts",
"admin\app\views\auth",
"admin\app\views\dashboard",
"admin\app\views\appointments",
"admin\app\views\clients",
"admin\app\views\services",
"admin\app\views\blog",
"admin\app\views\testimonials",
"admin\app\views\gallery",
"admin\app\views\settings",
"admin\app\middleware",
"admin\app\helpers",
"admin\app\core",
"admin\public",
"admin\public\assets",
"admin\public\assets\css",
"admin\public\assets\js",
"admin\public\assets\images",
"admin\public\assets\icons",
"admin\public\uploads",
"admin\routes",
"admin\database",
"admin\vendor"
)

$files = @(
"admin\app\config\App.php",
"admin\app\config\Database.php",
"admin\app\core\Controller.php",
"admin\app\core\Model.php",
"admin\app\core\DAO.php",
"admin\app\core\Router.php",
"admin\routes\web.php",
"admin\public\index.php",
"admin\public\.htaccess",
"admin\database\votreopticien.sql",
"admin\README.md"
)

foreach ($dir in $dirs) {
    New-Item -ItemType Directory -Path $dir -Force | Out-Null
}

foreach ($file in $files) {
    New-Item -ItemType File -Path $file -Force | Out-Null
}

Write-Host "✅ Arborescence créée avec succès !" -ForegroundColor Green