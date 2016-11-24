<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
spl_autoload_register(function ($classname) {
    require ("../classes/" . $classname . ".php");
});

$app = new \Slim\App;

$app->get('/todasRegulares',function(Request $request, Response $response){

    $regularDAO = MedidaDAO::getInstance();

    $regulares = $regularDAO->getAll();

    return $response->withJson($regulares);
});

$app->get('/todosControles',function(Request $request, Response $response){

    $controlDAO = ControlDAO::getInstance();

    $controles = $controlDAO->getAll();

    return $response->withJson($controles);
});

//Rota para pegat todas as medidas(sem as imagens)
$app->get('/pegaTodasMedidas',function(Request $request,Response $response){

    $medidaDAO = MedidaDAO::getInstance();

    $medidas = $medidaDAO->getAll();

    return $response->withJson($medidas);
});

//Rota para pegat todas as medidas
$app->get('/pegaTodasMedidasComImagens',function(Request $request,Response $response){

    $medidaDAO = MedidaDAO::getInstance();

    $medidas = $medidaDAO->getAllComImagens();

    return $response->withJson($medidas);
});

$app->post('/insereMedida',function(Request $request, Response $response){

    $medidaData = $request->getParsedBody();

    $data = file_get_contents($_FILES['imagem']['tmp_name']);
    var_dump($_FILES['imagem']);
    $data = base64_encode($data);
    $medidaData['image'] = $data;
    $medidaData['date'] = "now()";
    $medidaData['temperature'] = rand(25, 21);
    $medidaData['humidity'] = rand(50, 70);
    $medidaData['moisture'] = rand(50, 70);


//    $data["temperatura"] = rand(-273, 500);
//    $data["umidade"] = rand(0,9);
//    $data["pressao"] = rand(0,9);
//    $data["chuva"] = 1;
//    $data["data_leitura"] = "DATE_ADD(NOW(),INTERVAL ". $k ." DAY)";
//    $data["id_localizacao"] = "1";


    $medida = new Medida($medidaData);

    $medidaDAO = MedidaDAO::getInstance();

    $medidaDAO->insert($medida);

});

$app->get('/pegarImagem/{id}',function(Request $request, Response $response){

    $medidaData = $request->getParsedBody();

    $medidaData['id'] = $request->getAttribute('id');

    $medida = new Medida($medidaData);

    $medidaDAO = MedidaDAO::getInstance();

    $image = $medidaDAO->getImage($medida);

    return $response->withJson($image);
});

$app->get('/pegaTodasFotos',function(Request $request, Response $response){

    $medidaDAO = MedidaDAO::getInstance();

    $images = $medidaDAO->getAllPhotos();

    return $response->withJson($images);
});


$app->get('/pegaUltimaMedida',function(Request $request, Response $response){

    $medidaDAO = MedidaDAO::getInstance();

    $images = $medidaDAO->getUltimaMedida();

    return $response->withJson($images);
});

$app->run();
