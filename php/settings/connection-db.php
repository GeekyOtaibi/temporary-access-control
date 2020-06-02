<?php
        
        $host="m60mxazb4g6sb4nn.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
        $user="gqlm4xkg11lvmely";
        $pwd="k2r809mno9aovopu";
        $db="v131o2n6wr247lgo";
        
        $con=mysqli_connect($host,$user,$pwd,$db);
        
        if(mysqli_connect_errno($con))
        {
            echo mysqli_connect_error();
        }

?>