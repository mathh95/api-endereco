<?php

    //Rota dos enderecos
        $app->get("/estados", "App\control\EstadoControl:selecionarTodos"); 
        $app->get("/estados/{param}", "App\control\EstadoControl:selecionarUf");
        $app->get("/cidades", "App\control\CidadeControl:selecionarTodos"); 
        $app->get("/cidades/{param}", "App\control\CidadeControl:selecionarCid");
    

?>