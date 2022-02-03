<html>
<head>
<title>Encuesta de opinion</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
<h1>Encuesta</h1>
<h3>¿Que opinas de este curso de php?</h3>
<form  method="post">
<input type="radio" name="reply" value="0">
Excelente, he aprendido mucho.<br>
<input type="radio" name="reply" value="1">
Mas o menos, es muy complicado.<br>
<input type="radio" name="reply" value="2">
¡Bah! para que quiero aprender php
<br> <br>
<input name="submit" type="submit" value="vota!">

</form>
</body>
</html>

<?php
    $array = array();
    $a=0;
    $b=0;
    $c=0;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]) ) {
//Mostrar el botòn submit solo si el formulario todavia
// no se ha enviado y el usuario no ha votado.

if( isset( $_COOKIE['resultados']) ){
    $var=  $_COOKIE['resultados'];
    $datos= explode(" ",$var);
    $a=$datos[0];
    $b=$datos[1];
    $c=$datos[2];
}
    $reply = $_POST['reply'];
    switch($reply){
    case '0':
    $a++;
    break;
    case '1':
        $b++;
        break;
        case '2':
            $c++;
            break;
    }

    $array=[$a,$b,$c];
    $datos=implode(" ",$array);
    setcookie("resultados",$datos,time() + 3600);
    echo "<p>Gracias por tu voto.</p>\n";
    
echo "<h1>Resultados</h1><br>";
if($a>$b && $a>$c){
    echo "Todos opinan que el curso de php es: Excelente, he aprendido mucho";
}
elseif($b>$c && $b>$a){
echo "Todos oponan que Mas o menos, es muy complicado";
}
elseif($c>$a && $c>$b){
    echo "¡Bah! para que quiero aprender php";
}
else{
    echo "Tenemos empate";
}
}
?>