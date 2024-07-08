<?php
// Simulate backend process to generate report.txt
// In a real scenario, this might involve actual data processing or calculation

$reportFilePath = 'report.txt';

// Check if the report file exists
if (file_exists($reportFilePath)) {
    echo 'true';
} else {
    echo 'false';
}
?>
