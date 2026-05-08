<?php

require_once 'config/config.php';

class RealEstateDatabase {

    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function addUser($userName, $contactInfo, $passwordHash, $userType) {
        $sql = "INSERT INTO Users (userName, contactInfo, passwordHash, userType)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            $userName,
            $contactInfo,
            $passwordHash,
            $userType
        ]);
    }

    public function getUserByUsername($userName) {
        $sql = "SELECT * FROM Users WHERE userName = ?";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([$userName]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addProperty($title, $propertyType, $address, $city, $price, $status, $agentId) {
        $sql = "INSERT INTO Properties
                (title, propertyType, address, city, price, status, agentId)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            $title,
            $propertyType,
            $address,
            $city,
            $price,
            $status,
            $agentId
        ]);
    }

    public function getAllProperties() {
        $sql = "SELECT * FROM PropertyListingView";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPropertyById($propertyId) {
        $sql = "SELECT * FROM PropertyListingView WHERE propertyId = ?";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([$propertyId]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addInquiry($userId, $propertyId, $message) {
        $sql = "INSERT INTO Inquiries
                (userId, propertyId, message, inquiryDate)
                VALUES (?, ?, ?, NOW())";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            $userId,
            $propertyId,
            $message
        ]);
    }
}
?>