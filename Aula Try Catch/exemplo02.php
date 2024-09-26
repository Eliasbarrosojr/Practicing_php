<?php

function trataNome($nome){

    if(!$nome){

        throw new Exception("Nenhum nome foi informado.", 400);
    }

    echo ucfirst($nome)."<br>";
}

try {

    trataNome("joão");
    trataNome("");

} catch (Exception $e){

    echo $e->getMessage()."<br>";

} finally {

    echo "Executo o Try!";
}

?>