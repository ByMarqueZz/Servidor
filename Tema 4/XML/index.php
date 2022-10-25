<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function escribeXML($xml){
            echo "<ul>";
            foreach($xml as $k=>$v){
                if($v->children()){
                    echo "<li>" . $k . "</li>";
                    escribeXML($v);
                }else{
                    echo "<li>" . $k . "=" . $v . "</li>";
                    
                }
            }
            echo "</ul>";
        }
        $xml = simplexml_load_file("./example.xml");
        escribeXML($xml);
    ?>
</body>
</html>