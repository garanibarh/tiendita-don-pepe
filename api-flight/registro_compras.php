<?php

require 'flight/Flight.php';

Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=tienda','root',''));

Flight::route('GET /registro_compras', function () {
    
    $sentencia = Flight::db()->prepare("SELECT * FROM `registro_compras`");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();

    Flight::json($datos);

});

Flight::route('POST /registro_compras', function () {
    
    $codigo = (Flight::request()->data->codigo);
    $nombre = (Flight::request()->data->nombre);
    $precio = (Flight::request()->data->precio);
    $cantidad = (Flight::request()->data->cantidad);
    $id_usuario = (Flight::request()->data->id_usuario);
    $fecha = (Flight::request()->data->fecha);
    $hora = (Flight::request()->data->hora);
    $vencimiento = (Flight::request()->data->vencimiento);

    $sql = "INSERT INTO registro_compras(codigo,nombre,precio,cantidad,id_usuario,fecha,hora,vencimiento) VALUES(?,?,?,?,?,?,?,?)";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$codigo);
    $sentencia->bindParam(2,$nombre);
    $sentencia->bindParam(3,$precio);
    $sentencia->bindParam(4,$cantidad);
    $sentencia->bindParam(5,$id_usuario);
    $sentencia->bindParam(6,$fecha);
    $sentencia->bindParam(7,$hora);
    $sentencia->bindParam(8,$vencimiento);
    $sentencia->execute();

    Flight::jsonp(["Producto agregado"]);
    
});

Flight::route('DELETE /registro_compras', function () {
    $id = (Flight::request()->data->id);
   
    $sql = "DELETE FROM registro_compras WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$id);
    $sentencia->execute();

    Flight::jsonp(["Producto borrado"]);

});

Flight::route('PUT /registro_compras', function () {
    $id = (Flight::request()->data->id);
    $codigo = (Flight::request()->data->codigo);
    $nombre = (Flight::request()->data->nombre);
    $precio = (Flight::request()->data->precio);
    $cantidad = (Flight::request()->data->cantidad);
    $id_usuario = (Flight::request()->data->id_usuario);
    $fecha = (Flight::request()->data->fecha);
    $hora = (Flight::request()->data->hora);
    $vencimiento = (Flight::request()->data->vencimiento);
   
    $sql = "UPDATE registro_compras SET codigo=?,nombre=?,precio=?,cantidad=?,id_usuario=?,fecha=?,hora=?,vencimiento=? WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$codigo);
    $sentencia->bindParam(2,$nombre);
    $sentencia->bindParam(3,$precio);
    $sentencia->bindParam(4,$cantidad);
    $sentencia->bindParam(5,$id_usuario);
    $sentencia->bindParam(6,$fecha);
    $sentencia->bindParam(7,$hora);
    $sentencia->bindParam(8,$vencimiento);
    $sentencia->bindParam(9,$id);
    $sentencia->execute();

    Flight::jsonp(["Producto modificado"]);

});

Flight::start();
