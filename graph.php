<?php 
class Graph
{
        private $adjMatrix;
        private $matrixSize = 0;

        public function __construct($size)
        {
                $this->matrixSize = $size;
                for ($i=0; $i < $this->matrixSize; $i++) { 
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