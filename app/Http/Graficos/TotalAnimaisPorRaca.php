<?php

include 'Conexao.php';
$sql = "SELECT COUNT(*) AS TotalId, raca FROM animais WHERE raca='ANELORADO'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $arr = array (
          'raca' => $row['raca'],
          'TotalId' => array_map('intval', explode(',', $row['TotalId']))
    );
    $series_array[] = $arr;
  }
  return json_encode ($series_array);
} else {
  echo "não teve retorno";
}
$conn->close();
?>