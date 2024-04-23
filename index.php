<?php
$servername = "localhost"; 
$username = "admin"; 
$password = "Naveen@27"; 
$database = "dcc_4"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function displayFilteredData($conn, $tableName, $filterColumn, $filterValue) {

    $sqlColumns = "SHOW COLUMNS FROM $tableName";
    $resultColumns = $conn->query($sqlColumns);
    $columns = array();
    while ($row = $resultColumns->fetch_assoc()) {
        $columns[] = $row['Field'];
    }

    $sql = "SELECT * FROM $tableName WHERE `$filterColumn` = '$filterValue'";
    $result = $conn->query($sql);

    echo "<h2>$tableName Table (Filtered by $filterColumn: $filterValue)</h2>";
    echo "<table border='1'>";
    echo "<tr>";
    foreach ($columns as $columnName) {
        echo "<th>$columnName</th>";
    }
    echo "</tr>";

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach($row as $value) {
                echo "<td>".$value."</td>";
            }
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='" . count($columns) . "'>No records found</td></tr>";
    }
    echo "</table>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedTable = $_POST["table"];
    $filterColumn = $_POST["filter_column"];
    $filterValue = $_POST["filter_value"];

    displayFilteredData($conn, $selectedTable, $filterColumn, $filterValue);

}

$conn->close();
?>

<!-- HTML Form to choose table and apply filter -->
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="table">Choose Table:</label>
    <select name="table" id="table">
        <option value="individual">Individual</option>
        <option value="political">Political</option>
    </select>
    <br><br>
    <label for="filter_column">Choose Filter Column:</label>
    <select name="filter_column" id="filter_column">
        <!-- Add options for columns in individual table -->
        <option value="Sr No.">Sr No.</option>
        <option value="Reference No (URN)">Reference No (URN)</option>
        <option value="Journal Date">Journal Date</option>
        <option value="Date of Purchase">Date of Purchase</option>
        <option value="Date of Expiry">Date of Expiry</option>
        <option value="Name of the Purchaser">Name of the Purchaser</option>
        <option value="Prefix">Prefix</option>
        <option value="Bond Number">Bond Number</option>
        <option value="Denominations">Denominations</option>
        <option value="Issue Branch Code">Issue Branch Code</option>
        <option value="Issue Teller">Issue Teller</option>
        <!-- Add options for columns in political table -->
        <option value="Date of Encashment">Date of Encashment</option>
        <option value="Name of the Political Party">Name of the Political Party</option>
        <option value="Account no. of Political Party">Account no. of Political Party</option>
        <option value="Prefix">Prefix</option>
        <option value="Bond Number">Bond Number</option>
        <option value="Denominations">Denominations</option>
        <option value="Pay Branch Code">Pay Branch Code</option>
        <option value="Pay Teller">Pay Teller</option>
    </select>
    <br><br>
    <label for="filter_value">Enter Filter Value:</label>
    <input type="text" name="filter_value" id="filter_value">
    <br><br>
    <input type="submit" value="Apply Filter">
</form>
