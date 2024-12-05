<?php
$storeInfo = [
    'name' => 'EMG General Merchandise Store',
    'established' => '2020',
    'location' => 'Manila, Philippines',
    'description' => 'Your one-stop shop for all your general merchandise needs.'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - EMG General Merchandise Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">About Us</h1>
        
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow">
            <h2 class="text-2xl font-bold mb-4"><?php echo htmlspecialchars($storeInfo['name']); ?></h2>
            
            <p class="text-gray-600 mb-6">
                Established in <?php echo htmlspecialchars($storeInfo['established']); ?>, 
                <?php echo htmlspecialchars($storeInfo['description']); ?>
            </p>
            
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-3">Our Mission</h3>
                <p class="text-gray-600">
                    To provide quality products at affordable prices while delivering excellent customer service to our community.
                </p>
            </div>
            
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-3">Location</h3>
                <p class="text-gray-600">
                    We are located in <?php echo htmlspecialchars($storeInfo['location']); ?>. 
                    Visit us today to explore our wide range of products!
                </p>
            </div>
            
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-3">Business Hours</h3>
                <ul class="text-gray-600">
                    <li>Monday - Saturday: 8:00 AM - 8:00 PM</li>
                    <li>Sunday: 9:00 AM - 6:00 PM</li>
                </ul>
            </div>
        </div>
        
        <div class="mt-8 text-center">
            <a href="../" class="text-blue-600 hover:underline">← Back to Home</a>
        </div>
    </div>
</body>
</html>
