<?php

function showStatusIcon($status){
    if($status==0){
        return '<i class="fa fa-ban" aria-hidden="true"></i>';
    }else{
        return '<i class="fa fa-user-circle-o" aria-hidden="true"></i>';
    }

}

?>