<?php 
  include_once 'graph.php';
  $no = $_POST["node"];

  $graph = new Graph(count($no));
  for($i=0;$i < count($no);$i++){
      for($j=$i;$j< count($no);$j++){
      if($no[$j][$i] > 0){
        $graph->setVertex($j,$i);
      }
    }
  }
  $node = $graph->getAdjGraph();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Coloring Graph</title>
</head>
<body>
  <h1 align="center">Tugas Akhir Strategi Algoritma</h1>
  <h2>Adjensi Matrix dari Graph :</h2>
  <table style="text-align: center;margin: 10px" border="1" >
    <tr>
      <th>#</th>
      <?php for ($i=0; $i < count($node) ; $i++) { 
        echo "<th> node ".$i."</th>";
      } ?>     
    </tr>
    <tr>
    <?php for ($i=0; $i < count($node); $i++) { 
      echo "<td > node ".$i."</td>";
        for ($j=0; $j < count($node); $j++){
          echo "<td>".$node[$i][$j]."</td>";
        }
      echo "</tr>";
    } ?>
  </table>
  <?php 
    $graph->dfsMatrix(3); 
    echo "<h5>"; 
    $graph->getGraphColor();
    echo "</h5>";
  ?>
</body>
</html>