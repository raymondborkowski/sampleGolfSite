<?php
require_once "db.php";
session_start();
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="addmobile.css?" type="text/css">
<link rel="apple-touch-icon-precomposed" href="golfball.jpg"/>
<link rel="shortcut icon" sizes="196x196" href="golfball.jpg">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
<style>
table,th,td
{
border:1px solid black;
border-collapse:collapse;
}
th,td
{
padding:5px;
}
</style>
<title>Golf League Standings</title>
</head><body>
<div data-role="page" data-theme="b">
<div data-role="header">
    <h1>Weekly Scores</h1>
</div>
<?php
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
echo('<table border="1">'."\n");
echo "<tr>
  <th>Golfer Name</th>
  <th>Team Number</th>
  <th>Round Total</th>     
  </tr>";
$stmt = $pdo->query("SELECT name, material_total, team, id FROM golf2 ORDER BY name,name DESC");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo htmlentities($row['name']);
    echo("</td><td>");
    echo htmlentities($row['team']);
    echo("</td><td>");
    echo htmlentities($row['material_total']);
    echo("\n</form>\n");
echo("</td></tr>\n");
}
echo('<table border="1">'."\n");
echo "<tr>
  <th>Hole 2 Greenie</th>
  <th>Hole 4 Greenie</th>
  <th>Hole 11 Greenie</th> 
  <th>Hole 15 Greenie</th>    
  </tr>";
$stmt = $pdo->query("SELECT greenie2, greenie4, greenie11, greenie15 FROM greenie1");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo htmlentities($row['greenie2']);
    echo("</td><td>");
    echo htmlentities($row['greenie4']);
    echo("</td><td>");
    echo htmlentities($row['greenie11']);
    echo("</td><td>");
    echo htmlentities($row['greenie15']);
    echo("</td><td>");
    echo('<a href="edit.php?id='.htmlentities($row['id']).'">Edit</a> / ');
    echo("\n</form>\n");
    echo("</td></tr>\n</br />");
}
?>
</table><br />
<input type="button" onclick="location.href='league.php';" target="_blank" value= "Golf League" />
<input type="button" onclick="location.href='addmobile.php';" target="_blank" value= "Add Golfer Score" />
<input type="button" onclick="location.href='greenie.php';" target="_blank" value= "Add Greenie Winner" />
</div>