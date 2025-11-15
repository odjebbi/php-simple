<?php
header('Content-Type: text/html; charset=utf-8');

$route = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($route) {
    case '/':
        showHome();
        break;
    case '/api/hello':
        header('Content-Type: application/json');
        echo json_encode(['message' => 'Hello from PHP!']);
        break;
    case '/health':
        header('Content-Type: application/json');
        echo json_encode(['status' => 'ok', 'service' => 'php-api']);
        break;
    case '/api/info':
        header('Content-Type: application/json');
        echo json_encode([
            'language' => 'PHP',
            'version' => PHP_VERSION,
            'app_version' => '1.0.0'
        ]);
        break;
    default:
        http_response_code(404);
        echo '404 Not Found';
}

function showHome() {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Simple API</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="container">
        <h1>🐘 PHP Simple API</h1>
        <p>Application déployée avec buildpacks</p>
        <div class="endpoints">
            <h2>Endpoints disponibles :</h2>
            <ul>
                <li><code>GET /</code> - Cette page</li>
                <li><code>GET /api/hello</code> - Message JSON</li>
                <li><code>GET /health</code> - Health check</li>
                <li><code>GET /api/info</code> - Info API</li>
            </ul>
        </div>
    </div>
</body>
</html>
<?php
}
?>