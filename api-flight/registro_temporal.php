<?php

require 'flight/Flight.php';

Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=tienda','root',''));

Flight::route('GET /registro_temporal', function () {
    
    $sentencia = Flight::db()->prepare("SELECT * FROM `registro_temporal`");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();

    Flight::json($datos);

});

Flight::route('POST /registro_temporal', function () {
    
    $codigo = (Flight::request()->data->codigo);
    $nombre = (Flight::request()->data->nombre);
    $precio = (Flight::request()->data->precio);
    $cantidad = (Flight::request()->data->cantidad);
   
    $sql = "INSERT INTO registro_temporal(codigo,nombre,precio,cantidad) VALUES(?,?,?,?)";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$codigo);
    $sentencia->bindParam(2,$nombre);
    $sentencia->bindParam(3,$precio);
    $sentencia->bindParam(4,$cantidad);
    $sentencia->execute();

    Flight::jsonp(["Producto agregado"]);
    
});

Flight::route('DELETE /registro_temporal', function () {
    $id = (Flight::request()->data->id);
   
    $sql = "DELETE FROM registro_temporal WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$id);
    $sentencia->execute();

    Flight::jsonp(["Producto borrado"]);

});

Flight::route('PUT /registro_temporal', function () {
    $id = (Flight::request()->data->id);
    $codigo = (Flight::request()->data->codigo);
    $nombre = (Flight::request()->data->nombre);
    $precio = (Flight::request()->data->precio);
    $cantidad = (Flight::request()->data->cantidad);
   
    $sql = "UPDATE registro_temporal SET codigo=?,nombre=?,precio=?,cantidad=? WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$codigo);
    $sentencia->bindParam(2,$nombre);
    $sentencia->bindParam(3,$precio);
    $sentencia->bindParam(4,$cantidad);
    $sentencia->bindParam(5,$id);
    $sentencia->execute();

    Flight::jsonp(["Producto modificado"]);

});

Flight::start();
