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
