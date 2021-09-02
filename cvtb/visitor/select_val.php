<?php 
     include '../html5up-spectral/connection.php';
     function select1($tb,$id){
        $query="select * from $tb order by $id;";
        return $query;
     }
     //function for simple search 
    function select2($tb,$v1,$v2,$v3,$g){

        $query="select * from $tb where $v1 like '%$g%' OR $v2 like '%$g%' OR $v3 like '%$g%' order by $v1;";
        return $query;
     }
     // function for join queries
    function select3($arg){
         $c = count($arg);
        if($c==3){
            $query="select $arg[0].*,$arg[1].* from $arg[0], $arg[1] where $arg[1].$arg[2]=$arg[0].$arg[2];";
            //echo "$query";
            return $query;
         }
          if($c==9){
            $query = "select $arg[0].*, $arg[1].* from $arg[0] inner join $arg[1] on $arg[1].$arg[2]=$arg[0].$arg[2] where 
                     $arg[0].$arg[4]='$arg[8]' OR $arg[0].$arg[5]='$arg[8]' OR $arg[1].$arg[7]='$arg[8]' OR $arg[1].$arg[6]='$arg[8]'
                     order by $arg[0].$arg[4];";
                   /*  $query = "select $arg[0].$arg[3],$arg[0].$arg[4],$arg[0].$arg[5],$arg[1].$arg[6] from $arg[0] inner join $arg[1] on 
                     $arg[1].$arg[2]=$arg[0].$arg[2] where 
                     $arg[0].$arg[4]=$arg[8] OR $arg[0].$arg[5]=$arg[8] OR $arg[1].$arg[7]=$arg[8] OR $arg[1].$arg[6]=$arg[8]
                     order by $arg[0].$arg[4];";*/
           return $query;
           //$arg[0].$arg[3],$arg[0].$arg[4],$arg[0].$arg[5],$arg[1].$arg[6]
    }

    }
?>