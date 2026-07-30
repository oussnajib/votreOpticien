<?php

class ProductController extends Controller
{
    private ProductDAO $productDAO;

    public function __construct()
    {
        Auth::check();

        $this->productDAO = new ProductDAO();
    }

    /**
     * Afficher la liste des produits
     */
    public function index(): void
    {
        $products = $this->productDAO->findAll();

        $this->view("products/index", [
            "products" => $products
        ]);
    }

    public function create(): void
    {
        $this->view("products/create");
    }

    public function store(): void
    {
    $nom = trim($_POST["nom"]);
    $categorie = trim($_POST["categorie"]);
    $prix = (float) $_POST["prix"];

    // Image
    $image = "";

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {

        $image = time() . "_" . basename($_FILES["image"]["name"]);

        move_uploaded_file(
            $_FILES["image"]["tmp_name"],
            "../public/uploads/products/" . $image
        );
    }

    $product = new Product(
        0,
        $nom,
        $prix,
        $image,
        $categorie,
        date("Y-m-d H:i:s")
    );

    $this->productDAO->create($product);

    header("Location: index.php?url=products");
    exit;
    }

    public function edit(): void
    {
    if (!isset($_GET["id"])) {
        header("Location: index.php?url=products");
        exit;
    }

    $product = $this->productDAO->findById((int)$_GET["id"]);

    if (!$product) {
        header("Location: index.php?url=products");
        exit;
    }

    $this->view("products/edit", [
        "product" => $product
    ]);
    }

    public function update(): void
    {
    $id = (int) $_POST["id"];

    $product = $this->productDAO->findById($id);

    if (!$product) {
        header("Location: index.php?url=products");
        exit;
    }

    $product->setNom(trim($_POST["nom"]));
    $product->setCategorie(trim($_POST["categorie"]));
    $product->setPrix((float) $_POST["prix"]);

    // Si une nouvelle image est envoyée
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {

        $image = time() . "_" . basename($_FILES["image"]["name"]);

        move_uploaded_file(
            $_FILES["image"]["tmp_name"],
            "../public/uploads/products/" . $image
        );

        $product->setImage($image);
    }

    $this->productDAO->update($product);

    header("Location: index.php?url=products");
    exit;
    }

    public function delete(): void
    {
    if (!isset($_GET["id"])) {
        header("Location: index.php?url=products");
        exit;
    }

    $id = (int) $_GET["id"];

    $product = $this->productDAO->findById($id);

    if (!$product) {
        header("Location: index.php?url=products");
        exit;
    }

    // Supprimer l'image si elle existe
    if (!empty($product->getImage())) {

        $imagePath = "../public/uploads/products/" . $product->getImage();

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $this->productDAO->delete($id);

    header("Location: index.php?url=products");
    exit;
    }
    
}