<?php
include "dbconfig.php";

$sqlStatement = "select * from film";
$query = mysqli_query($conn, $sqlStatement);

$data = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Film</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 4px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Daftar Film</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($data)) {
                foreach ($data as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['id_film'] . "</td>";
                    echo "<td>" . $row['judul'] . "</td>";
                    echo "<td>" . $row['sutradara'] . "</td>";
                    echo "<td>" . $row['tahun_rilis'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
mysqli_close($conn);
?>