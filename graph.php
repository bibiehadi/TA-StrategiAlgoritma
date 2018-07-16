<?php 
class Graph
{
        private $adjMatrix;
        private $matrixSize = 0;
        private $visited;
        private $color;
        private $colorgraph;

        public function __construct($size)
        {
                $this->matrixSize = $size;
                for ($i=0; $i < $this->matrixSize; $i++) { 
                $this->color[$i]=null; 
                    $this->visited[$i]=0;
                        for ($j=0; $j < $this->matrixSize ; $j++) { 
                               $this->adjMatrix[$i][$j] = 0;
                        }
                }
        }

        public function setVertex($node,$adj){
                if ($node > $this->matrixSize || $adj > $this->matrixSize) {
                        return false;
                }
                $this->adjMatrix[$node][$adj] = $this->adjMatrix[$adj][$node] = 1;
                return true;
        }

        public function getAdjGraph(){
                return $this->adjMatrix;
        }

        public function getGraphColor(){
                for ($i=0; $i <$this->matrixSize ; $i++) { 
                        if ($this->color[$i]==1) {
                                echo "Node ".$i." = Merah <br />"; 
                        }elseif ($this->color[$i]==2) {
                                echo "Node ".$i." = Kuning <br />";
                        }elseif ($this->color[$i]==3) {
                            echo "Node ".$i." = Hijau <br>";
                        }
                }
        }

        public function dfsColoringMatrix($vertex){
                                
                for ($c=1; $c <=3 ; $c++) { 
                        if ($this->isSafe($vertex,$c)) {
                                // echo " | node ".$vertex." => ".$this->color[$vertex];
                                // print_r($this->adjMatrix);
                                $this->visited[$vertex]=1;
                                $this->color[$vertex]=$c;
                                echo "Node ".$vertex." berwarna ".$this->color[$vertex]."<br />";
                                
                            for ($i=0; $i < $this->matrixSize; $i++) { 
                                echo $vertex.". Node  ke".$vertex." dengan node ke ".$i." = ".$this->adjMatrix[$vertex][$i]." isVisited ? ".$this->visited[$i]." <br>";
                                    if (($this->adjMatrix[$vertex][$i]==1) and ($this->visited[$i]==0)) {

                                        // echo $this->visited[$i];
                                        // $this->coloringGraph($vertex);
                                        // $c = 1;
                                        $this->dfsColoringMatrix($i);
                                    }
                                    
                            }
                    }
                }
        }

        // public function coloringGraph($vertex){
        //         for ($c=0; $c <3 ; $c++) { 
        //                 if ($this->isSafe($vertex,$c)) {
        //                         $this->color[$vertex]=$c;
        //                         // echo "node ke ".$vertex;
        //                         echo "= warna ".$c;
        //                         // if (!$this->color[$vertex]) {
        //                         //     break;
        //                         // }
        //                         // if ($vertex+1<$this->matrixSize) {
        //                         //         $this->coloringGraph($vertex+1);
        //                         // }

        //                 }
        //         }
        // }

        public function isSafe($vertex, $color){
                // $a= $this->getAdjGraph();
                // print_r($a);
                // print_r($this->color);
                for ($i=0; $i <$this->matrixSize; $i++) { 
                        if (($this->adjMatrix[$vertex][$i]==1) && ($color == $this->color[$i])) {
                                // echo color[$i];
                                return false;
                        }
                }
                return true;
        }
        // public function printAdjGraph(){
        //         for ($i=0; $i < $this->matrixSize ; $i++) { 
        //                 for ($j=0; $j <$this->matrixSize ; $j++) { 
        //                         echo $this->adjMatrix[$i][$j];
        //                         if ($j==$this->matrixSize-1) {
        //                                 echo "<br />\n";
        //                         }
                                
        //                 }
        //         }
        // }
}
?>