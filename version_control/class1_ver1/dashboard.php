<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to connect to SQLite
function getConnection() {
    $dbPath = __DIR__ . "/db/films.sqlite"; // Ensure correct path
    try {
        $db = new PDO("sqlite:" . $dbPath);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die("Database Connection Failed: " . $e->getMessage());
    }
}

$db = getConnection();

// Fetch data
$actors = $db->query("SELECT COUNT(*) as total FROM actor")->fetch(PDO::FETCH_ASSOC);
$films = $db->query("SELECT COUNT(*) as total FROM film")->fetch(PDO::FETCH_ASSOC);
$categories = $db->query("SELECT COUNT(*) as total FROM category")->fetch(PDO::FETCH_ASSOC);

// Fetch top 5 categories
$topCategories = $db->query("SELECT name, COUNT(film_id) as total FROM category 
    JOIN film ON category.category_id = film.category_id 
    GROUP BY name ORDER BY total DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { background-color: #f8f9fa; }
        .card { box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center mb-4">🎬 Film Database Dashboard</h2>

    <div class="row text-center">
        <div class="col-md-4">
            <div class="card p-3">
                <h3>📽️ Films</h3>
                <h4><?= $films['total'] ?></h4>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <h3>🎭 Actors</h3>
                <h4><?= $actors['total'] ?></h4>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <h3>📚 Categories</h3>
                <h4><?= $categories['total'] ?></h4>
            </div>
        </div>
    </div>

    <h3 class="text-center mt-4">📊 Top 5 Film Categories</h3>
    <canvas id="categoryChart"></canvas>
</div>

<script>
    // Data for Chart.js
    const categoryData = <?= json_encode(array_column($topCategories, "total")) ?>;
    const categoryLabels = <?= json_encode(array_column($topCategories, "name")) ?>;

    // Create Bar Chart
    new Chart(document.getElementById("categoryChart"), {
        type: "bar",
        data: {
            labels: categoryLabels,
            datasets: [{
                label: "Films per Category",
                backgroundColor: ["#007bff", "#28a745", "#ffc107", "#dc3545", "#6f42c1"],
                data: categoryData
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>

</body>
</html>
