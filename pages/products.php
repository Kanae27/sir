<?php
$products = [
    [
        'name' => 'School Supplies Bundle',
        'price' => 299.99,
        'description' => 'Complete set of essential school supplies'
    ],
    [
        'name' => 'Home Cleaning Kit',
        'price' => 499.99,
        'description' => 'All-in-one cleaning solution for your home'
    ],
    [
        'name' => 'Kitchen Essentials Pack',
        'price' => 799.99,
        'description' => 'Basic kitchen tools and utensils'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - EMG General Merchandise Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Our Products</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach($products as $product): ?>
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-bold mb-4"><?php echo htmlspecialchars($product['name']); ?></h2>
                <p class="text-gray-600"><?php echo htmlspecialchars($product['description']); ?></p>
                <p class="mt-4 text-green-600 font-semibold">₱<?php echo number_format($product['price'], 2); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="mt-8 text-center">
            <a href="../" class="text-blue-600 hover:underline">← Back to Home</a>
        </div>
    </div>
</body>
</html>
