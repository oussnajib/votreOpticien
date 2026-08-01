<?php

class ProductDAO
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    /**
     * Retourner tous les produits
     */
    public function findAll(): array
    {
        $sql = "SELECT * FROM produits ORDER BY created_at DESC";

        $stmt = $this->db->query($sql);

        $products = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $products[] = new Product(
                $row["id"],
                $row["nom"],
                (float)$row["prix"],
                $row["image"],
                $row["categorie"],
                $row["created_at"]
            );
        }

        return $products;
    }

    /**
     * Retourner un produit par son ID
     */
    public function findById(int $id): ?Product
    {
        $sql = "SELECT * FROM produits WHERE id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Product(
            $row["id"],
            $row["nom"],
            (float)$row["prix"],
            $row["image"],
            $row["categorie"],
            $row["created_at"]
        );
    }

    /**
     * Compter les produits
     */
    public function count(): int
    {
        return (int)$this->db
            ->query("SELECT COUNT(*) FROM produits")
            ->fetchColumn();
    }

    public function create(Product $product): bool
    {
    $sql = "INSERT INTO produits (nom, prix, image, categorie)
            VALUES (?, ?, ?, ?)";

    $stmt = $this->db->prepare($sql);

    return $stmt->execute([
        $product->getNom(),
        $product->getPrix(),
        $product->getImage(),
        $product->getCategorie()
    ]);
    }

    public function update(Product $product): bool
    {
    $sql = "UPDATE produits
            SET nom = ?, prix = ?, categorie = ?, image = ?
            WHERE id = ?";

    $stmt = $this->db->prepare($sql);

    return $stmt->execute([
        $product->getNom(),
        $product->getPrix(),
        $product->getCategorie(),
        $product->getImage(),
        $product->getId()
    ]);
    }

    public function delete(int $id): bool
    {
    $sql = "DELETE FROM produits WHERE id = ?";

    $stmt = $this->db->prepare($sql);

    return $stmt->execute([$id]);
    }

    
}