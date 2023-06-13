<?php
if (isset($_POST['domain'])) {
    $domain = $_POST['domain'];
    $host = gethostbynamel($domain);

    if ($host) {
        $ip = $host[0];
        $hostingProvider = getHostingProvider($ip);
        $openPorts = getOpenPorts($ip);
    } else {
        $hostingProvider = "Unknown";
        $openPorts = "N/A";
    }
}

function getHostingProvider($ip) {
    // Your code to determine hosting provider based on IP address goes here
    // This is just a placeholder
    return "Hosting Provider Name";
}

function getOpenPorts($ip) {
    // Your code to check for open ports on the IP address goes here
    // This is just a placeholder
    return "80, 443, 21, 1234, 3306, 5432, 22";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domain Hosting Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Domain Hosting Information</h1>
        <form method="post">
            <div class="mb-3">
                <label for="domain" class="form-label">Domain:</label>
                <input type="text" class="form-control" id="domain" name="domain" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php if (isset($hostingProvider)) : ?>
            <div class="mt-4">
                <h2>Hosting Provider:</h2>
                <p><?php echo $hostingProvider; ?></p>
            </div>
            <div class="mt-4">
                <h2>IP Address:</h2>
                <p><?php echo $ip; ?></p>
            </div>
            <div class="mt-4">
                <h2>Open Ports:</h2>
                <p><?php echo $openPorts; ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
