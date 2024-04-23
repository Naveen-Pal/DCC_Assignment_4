<?php
$servername = "localhost"; 
$username = "admin"; 
$password = "Naveen@27"; 
$database = "dcc_4"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function plotBondNumberGraph($conn) {

    $sql = "SELECT `Name of the Purchaser`, COUNT(`Bond Number`) AS `Total Bonds` FROM individual GROUP BY `Name of the Purchaser`";
    $result = $conn->query($sql);

    $purchaserNames = array();
    $totalBonds = array();

    while($row = $result->fetch_assoc()) {
        $purchaserNames[] = $row['Name of the Purchaser'];
        $totalBonds[] = $row['Total Bonds'];
    }

    $result->close();

    $conn->close();

    echo '<canvas id="bondChart" width="800" height="400"></canvas>';
    echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
    echo '<script>';
    echo 'var ctx = document.getElementById("bondChart").getContext("2d");';
    echo 'var bondChart = new Chart(ctx, {';
    echo '    type: "bar",';
    echo '    data: {';
    echo '        labels: ' . json_encode($purchaserNames) . ',';
    echo '        datasets: [{';
    echo '            label: "Total Bonds",';
    echo '            data: ' . json_encode($totalBonds) . ',';

    echo '            backgroundColor: "rgba(75, 192, 192, 0.6)",'; 
    echo '            borderColor: "rgba(75, 192, 192, 1)",';
    echo '            borderWidth: 1';
    echo '        }]';
    echo '    },';
    echo '    options: {';
    echo '        scales: {';
    echo '            yAxes: [{';
    echo '                ticks: {';
    echo '                    beginAtZero: true';
    echo '                }';
    echo '            }]';
    echo '        }';
    echo '    }';
    echo '});';
    echo '</script>';
}

plotBondNumberGraph($conn);
?>
