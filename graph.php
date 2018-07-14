<?php 
class Graph
{
        private $adjMatrix;
        private $matrixSize = 0;
        private $visited;

        public function __construct($size)
        {
                $this->matrixSize = $size;
                for ($i=0; $i < $this->matrixSize; $i++) { 
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
                for ($i=0; $i < $this->matrixSize; $i++) {
                // echo "node ".$vertex." | ".$i." => "; 
                        if (($this->adjMatrix[$vertex][$i]==1) && (!$this->visited[$i]==1)) {
                            // echo $this->visited[$i];
                            $this->dfsMatrix($i);
                        }
                        
                }
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