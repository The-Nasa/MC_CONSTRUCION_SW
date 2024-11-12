<?php 
$urlBase = "http://MC_CONSTRUCION_SW.test/";
function getUrlBase( $arg1){
    return $GLOBALS['urlBase'].$arg1;

}
echo $_urlBase;
echo getUrlBase("pagina.php");
?>