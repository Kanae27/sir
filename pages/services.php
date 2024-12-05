<?php
$pageTitle = "Our Services";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - EMG General Merchandise Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8"><?php echo $pageTitle; ?></h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-bold mb-4">Retail Sales</h2>
                <p class="text-gray-600">We offer a wide variety of general merchandise products at competitive prices.</p>
                <p class="mt-4 text-green-600 font-semibold">Everyday low prices!</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-bold mb-4">Wholesale</h2>
                <p class="text-gray-600">Special bulk pricing for business customers and large orders.</p>
                <p class="mt-4 text-green-600 font-semibold">Contact us for quotes</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-bold mb-4">Special Orders</h2>
                <p class="text-gray-600">Can't find what you need? We can special order items for you!</p>
                <p class="mt-4 text-green-600 font-semibold">Fast delivery</p>
            </div>
        </div>
        
        <div class="mt-8 text-center">
            <a href="../" class="text-blue-600 hover:underline">← Back to Home</a>
        </div>
    </div>
</body>
</html>
