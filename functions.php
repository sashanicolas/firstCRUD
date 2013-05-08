<?php
/**
 * Created with JetBrains PhpStorm.
 * User: sdarochapinheiro
 * Date: 5/7/13
 * Time: 3:41 PM
 */

$DEBUG = 1;

function printDebug($string) {
    global $DEBUG;
    if ($DEBUG) {
        echo $string;
    }
}
function redirect($url){
    //Wrapper for header redirect.
    //Don't redirect with an error
    if(!headers_sent()){
        header("Location: $url");
    }else{
        //Show a link if headers are sent
        echo "<br>\n";
        echo "<strong>Cannot redirect!</strong>\n";
        echo "Headers appear to already be sent.\n";
        echo "Please click here to continue:\n<br>";
        echo "<a href=\"";
        echo htmlspecialchars($url); //ensure escaping!
        echo "\">$url</a>";
        exit;
    }

}