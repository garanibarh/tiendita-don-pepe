<?php

require 'flight/Flight.php';

Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=tienda','root',''));

Flight::route('GET /productos', function () {
    
    $sentencia = Flight::db()->prepare("SELECT * FROM `productos`");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();

    Flight::json($datos);

});

Flight::route('POST /productos', function () {
    
    $codigo = (Flight::request()->data->codigo);
    $nombre = (Flight::request()->data->nombre);
    $precio = (Flight::request()->data->precio);
    $stock = (Flight::request()->data->stock);

    $sql = "INSERT INTO productos(codigo,nombre,precio,stock) VALUES(?,?,?,?)";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$codigo);
    $sentencia->bindParam(2,$nombre);
    $sentencia->bindParam(3,$precio);
    $sentencia->bindParam(4,$stock);
    $sentencia->execute();

    Flight::jsonp(["Producto agregado"]);
    
});

Flight::route('DELETE /productos', function () {
    $id = (Flight::request()->data->id);
   
    $sql = "DELETE FROM productos WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$id);
    $sentencia->execute();

    Flight::jsonp(["Producto borrado"]);

});

Flight::route('PUT /productos', function () {
    $id = (Flight::request()->data->id);
    $codigo = (Flight::request()->data->codigo);
    $nombre = (Flight::request()->data->nombre);
    $precio = (Flight::request()->data->precio);
    $stock = (Flight::request()->data->stock);
       
    $sql = "UPDATE productos SET codigo=?,nombre=?,precio=?,stock=? WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$codigo);
    $sentencia->bindParam(2,$nombre);
    $sentencia->bindParam(3,$precio);
    $sentencia->bindParam(4,$stock);
    $sentencia->execute();

    Flight::jsonp(["Producto modificado"]);

});

Flight::start();
