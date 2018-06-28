<?php 
        include_once 'graph.php';
        $graph = new Graph(4);
        $graph->setVertex(0,1);
        $graph->setVertex(0,2);
        $graph->setVertex(1,2);
        $graph->setVertex(1,3);
        $graph->setVertex(2,3);

        $node = $graph->getAdjGraph();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
         <title>Graph Node</title>
 </head>
 <body>
        <h1 align="center">Tugas Akhir Strategi Algoritma</h1>
        <h2>Adjensi Matrix dari Graph :</h2>
        <table style="text-align: center;margin: 10px" border="1" >
               <tr>
                        <th>#</th>
                        
                               <?php for ($i=1; $i <= count($node) ; $i++) { 
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
 </body>
 </html>