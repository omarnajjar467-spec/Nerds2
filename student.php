<?php
require 'config/config.php';

// Query alle activiteiten uit database
$stmt = $pdo->query("SELECT * FROM activiteit");
$activiteiten = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Studenten</title>
</head>
<body>
  



  
  <h2 style="text-align: center; border-radius: 5px;">Studenten</h2>




<style>
        body {
            background: #F5F5F5;
            font-family: 'Arial Rounded MT Bold', Arial, sans-serif;
        }
        .activiteiten-tabel {
            width: 95%;
            margin: 30px auto;
            border-collapse: collapse;
            background: #16C8F8;
            font-size: 1.15em;
            box-sizing: border-box;
            border: 2px solid #1d9fc3;
        }
        .activiteiten-tabel th, .activiteiten-tabel td {
            border: 2px solid #1d9fc3;
            padding: 22px 8px;
            text-align: center;
        }
        .activiteiten-tabel th {
            background: #0bdcf7;
            color: #171717;
            font-size: 1.5em;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .activiteiten-tabel tr {
            transition: background 0.2s;
        }
        .activiteiten-tabel tr:hover {
            background: #36e2fd;
        }
        .bekijken-knop {
            background: #16C8F8;
            color: #04060b;
            border: 2px solid #1d9fc3;
            padding: 10px 28px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .bekijken-knop:hover {
            background: #0f8fa0ff;
            color: #171717;
        }
    </style>



<table class="activiteiten-tabel">
        <thead>
            <tr>
                <th style="width:30%;">Title</th>
                <th style="width:50%;">Email</th>
                <th style="width:20%;">Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Sportdag</td>
                <td>Buitenactiviteit</td>
                <td><button class="bekijken-knop">Bekijken</button></td>
            </tr>
            <tr>
                <td>Workshop Coding</td>
                <td>Leer programmeren</td>
                <td><button class="bekijken-knop">Bekijken</button></td>
            </tr>
            <tr>
                <td>Zwembad</td>
                <td>Zwemmen</td>
                <td><button class="bekijken-knop">Bekijken</button></td>
            </tr>
        </tbody>
    </table>



  
</body>


</html>
