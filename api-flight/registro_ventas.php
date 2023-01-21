<?php

require 'flight/Flight.php';

Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=tienda','root',''));

Flight::route('GET /registro_ventas', function () {
    
    $sentencia = Flight::db()->prepare("SELECT * FROM `registro_ventas`");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();

    Flight::json($datos);

});

Flight::route('POST /registro_ventas', function () {
    
    $codigo = (Flight::request()->data->codigo);
    $nombre = (Flight::request()->data->nombre);
    $precio = (Flight::request()->data->precio);
    $cantidad = (Flight::request()->data->cantidad);
    $id_usuario = (Flight::request()->data->id_usuario);
    $fecha = (Flight::request()->data->fecha);
    $hora = (Flight::request()->data->hora);

    $sql = "INSERT INTO registro_ventas(codigo,nombre,precio,cantidad,id_usuario,fecha,hora) VALUES(?,?,?,?,?,?,?)";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$codigo);
    $sentencia->bindParam(2,$nombre);
    $sentencia->bindParam(3,$precio);
    $sentencia->bindParam(4,$cantidad);
    $sentencia->bindParam(5,$id_usuario);
    $sentencia->bindParam(6,$fecha);
    $sentencia->bindParam(7,$hora);
    $sentencia->execute();

    Flight::jsonp(["Producto agregado"]);
    
});

Flight::route('DELETE /registro_ventas', function () {
    $id = (Flight::request()->data->id);
   
    $sql = "DELETE FROM registro_ventas WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$id);
    $sentencia->execute();

    Flight::jsonp(["Producto borrado"]);

});

Flight::route('PUT /registro_ventas', function () {
    $id = (Flight::request()->data->id);
    $codigo = (Flight::request()->data->codigo);
    $nombre = (Flight::request()->data->nombre);
    $precio = (Flight::request()->data->precio);
    $cantidad = (Flight::request()->data->cantidad);
    $id_usuario = (Flight::request()->data->id_usuario);
    $fecha = (Flight::request()->data->fecha);
    $hora = (Flight::request()->data->hora);
   
    $sql = "UPDATE registro_ventas SET codigo=?,nombre=?,precio=?,cantidad=?,id_usuario=?,fecha=?,hora=? WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$codigo);
    $sentencia->bindParam(2,$nombre);
    $sentencia->bindParam(3,$precio);
    $sentencia->bindParam(4,$cantidad);
    $sentencia->bindParam(5,$id_usuario);
    $sentencia->bindParam(6,$fecha);
    $sentencia->bindParam(7,$hora);
    $sentencia->bindParam(8,$id);
    $sentencia->execute();

    Flight::jsonp(["Producto modificado"]);

});

Flight::start();
