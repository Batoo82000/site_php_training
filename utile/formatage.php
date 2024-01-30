<?php 
function styleTitreNiveau1($text, $color){
    $txt = "<h1 class='text-center my-3 perso_policeTitre perso_textShadow ".$color."'>";
    $txt .= $text;
    $txt .= "</h1>";
    return $txt;
}
function styleTitreNiveau2($text, $color){
    $txt = "<h2 class='text-center my-3 perso_policeTitre perso_textShadow ".$color."'>";
    $txt .= $text;
    $txt .= "</h2>";
    return $txt;
}
?>