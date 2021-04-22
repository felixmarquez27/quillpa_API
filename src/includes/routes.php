<?php
// Define app routes
$app->get('/getAllValvulas', function ($request, $response, $args) {
    //$respuesta=DBconection::conection();
    $respuesta=Valvulas::getAllValvulas();
    $newResponse = $response->withJson($respuesta);
    return $newResponse;
});
$app->post('/addNewValvula', function ($request, $response) {
    $data = $request->getParsedBody();
    $nombreValvula=DataCleanner::stringCleanner($data['nombreValvula']);
    $idUsuario=DataCleanner::numberCleanner($data['idUsuario']);
    $respuesta=Valvulas::addNewValvula($nombreValvula,$idUsuario);
    $newResponse = $response->withJson($respuesta);
    return $newResponse;
});
$app->post('/iniciarSesion', function ($request, $response) {
    $data = $request->getParsedBody();
    $usuario=DataCleanner::stringCleanner($data['username']);
    $password=DataCleanner::stringCleanner($data['pass']);
    $respuesta=Session::login($usuario, $password);
    $newResponse = $response->withJson($respuesta);
    return $newResponse;
});
/*
$app->get('/iniciarSesion', function ($request, $response, $args) {
    $datos=$request->getQueryParams();
    $usuario=DataCleanner::stringCleanner($datos['username']);
    $password=DataCleanner::stringCleanner($datos['pass']);
    $respuesta=Session::login($usuario, $password);
    $newResponse = $response->withJson($respuesta);
    return $newResponse;
});

*/

?>