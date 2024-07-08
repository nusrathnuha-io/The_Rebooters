<?php
// Set the content type to JSON to ensure that we are working with JSON data
header('Content-Type: application/json');

// Get the JSON data from the request body
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Specify the file path directly
$file_path = 'layout_details.txt';

// Prepare the data to be written
$length = isset($data['length']) ? $data['length'] : 'N/A';
$width = isset($data['width']) ? $data['width'] : 'N/A';
$content = "Length: " . $length . " m\nWidth: " . $width . " m\n";

// Save the data to the text file and overwrite any previous content
if (file_put_contents($file_path, $content, LOCK_EX)) {
    // Send a success response
    echo json_encode(['status' => 'success', 'message' => 'Layout details saved successfully']);
} else {
    // Send an error response
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Failed to save layout details']);
}

