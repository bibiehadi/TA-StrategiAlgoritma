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
                $this->color[$i]=""; 
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

        public function dfsMatrix($vertex){
                $this->visited[$vertex]=1;
                // echo $vertex;
                echo "node ".$vertex." => ";
                $this->coloringGraph($vertex);
                for ($i=0; $i < $this->matrixSize; $i++) {
                // echo "node ".$vertex." | ".$i." => "; 
                        if (($this->adjMatrix[$vertex][$i]==1) && (!$this->visited[$i]==1)) {
                            echo "</h5>";
                            // echo $this->visited[$i];
                            $this->dfsMatrix($i);
                        }
                        
                }
        }

       
        public function getGraphColor(){
                for ($i=0; $i <$this->matrixSize ; $i++) { 
                        if ($this->color[$i]==0) {
                                echo "Node ".$i." = Merah <br />"; 
                        }elseif ($this->color[$i]==1) {
                                echo "Node ".$i." = Kuning <br />";
                        }else{
                                echo "Node ".$i." = Hijau <br>";
                        }
                }
        }

        public function coloringGraph($vertex){
                for ($c=0; $c < 3; $c++) { 
                        if ($this->isSafe($vertex,$c)) {
                                $this->color[$vertex]=$c;
                        }
                }
        }

        public function isSafe($vertex, $color){
                for ($i=0; $i <$this->matrixSize ; $i++) { 
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