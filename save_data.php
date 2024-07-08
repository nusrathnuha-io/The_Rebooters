<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $fileContent = "Obstacles:\n";
    foreach ($data['obstacles'] as $obstacle) {
        $fileContent .= "Name: {$obstacle['name']}, Type: {$obstacle['type']}, Coordinates: ({$obstacle['x']}, {$obstacle['y']})\n";
    }

    $fileContent .= "\nWalls:\n";
    foreach ($data['walls'] as $wall) {
        $fileContent .= "Type: {$wall['wallType']}, Start: ({$wall['x1']}, {$wall['y1']}), End: ({$wall['x2']}, {$wall['y2']})\n";
    }

    $filePath = 'obstacle_details.txt';
    if (file_put_contents($filePath, $fileContent) !== false) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>
