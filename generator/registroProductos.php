<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';

class registroProducto
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::obtenerConexion();
    }

    public function obtenerProductos()
    {
        $query = $this->conexion->query("SELECT NOREG, 
                                        FECHA, 
                                        DETALLE, 
                                        UNIDAD, 
                                        PRODUCTO, 
                                        CALCULO, 
                                        CANCELADO, 
                                        RESTO, 
                                        TURNO, 
                                        TIPO_SESION, 
                                        NICK, 
                                        CODIGO_VENDEDOR, 
                                        RESPONSABLE, 
                                        LINK, 
                                        ULINK, 
                                        DUAL, 
                                        FECHADETALLE, 
                                        CANTIDAD, 
                                        PC, 
                                        PV, 
                                        MONTO, 
                                        UNIDADPRODUCTO, 
                                        PU, 
                                        LIBROCONTABLE, 
                                        CUENTACONTABLE, 
                                        ESPRODUCTO, 
                                        MARCA, 
                                        TAMANIO, 
                                        PCUSD, 
                                        DESPLIEGUE, 
                                        TIPOISC, 
                                        TASAISC, 
                                        TIPODSCTO, 
                                        DSCTOUNIT, 
                                        TIPOCARGO, 
                                        CARGOUNIT, 
                                        TIPOOPERACION, 
                                        PR, 
                                        MINCOMPRA, 
                                        FECHAVENCIMIENTO, 
                                        VERSION_IMG, 
                                        SERIE, 
                                        CODIGOSUNAT, 
                                        AFECTOICBPER, 
                                        UBICACION, 
                                        PESO, 
                                        PMAYOR, 
                                        STOCKMINIMO, 
                                        ESTADOSERVPROD, 
                                        FACTURABLE, 
                                        PERECIBLE, 
                                        CLASIFICADOR, 
                                        RECETA, 
                                        NROLOTE, 
                                        PRESENTACION, 
                                        FROM productos");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarProducto($NOREG, $FECHA, $DETALLE, $UNIDAD, $PRODUCTO, $CALCULO, $CANCELADO, $RESTO, $TURNO, $TIPO_SESION, $NICK, $CODIGO_VENDEDOR, $RESPONSABLE, $LINK, $ULINK, $DUAL, $FECHADETALLE, $CANTIDAD, $PC, $PV, $MONTO, $UNIDADPRODUCTO, $PU, $LIBROCONTABLE, $CUENTACONTABLE, $ESPRODUCTO, $MARCA, $TAMANIO, $PCUSD, $DESPLIEGUE, $TIPOISC, $TASAISC, $TIPODSCTO, $DSCTOUNIT, $TIPOCARGO, $CARGOUNIT, $TIPOOPERACION, $PR, $MINCOMPRA, $FECHAVENCIMIENTO, $VERSION_IMG, $SERIE, $CODIGOSUNAT, $AFECTOICBPER, $UBICACION, $PESO, $PMAYOR, $STOCKMINIMO, $ESTADOSERVPROD, $FACTURABLE, $PERECIBLE, $CLASIFICADOR, $RECETA, $NROLOTE, $PRESENTACION, )
    {
        $query = "INSERT INTO productos (NOREG, FECHA, DETALLE, UNIDAD, PRODUCTO, CALCULO, CANCELADO, RESTO, TURNO, TIPO_SESION, NICK, CODIGO_VENDEDOR, RESPONSABLE, LINK, ULINK, DUAL, FECHADETALLE, CANTIDAD, PC, PV, MONTO, UNIDADPRODUCTO, PU, LIBROCONTABLE, CUENTACONTABLE, ESPRODUCTO, MARCA, TAMANIO, PCUSD, DESPLIEGUE, TIPOISC, TASAISC, TIPODSCTO, DSCTOUNIT, TIPOCARGO, CARGOUNIT, TIPOOPERACION, PR, MINCOMPRA, FECHAVENCIMIENTO, VERSION_IMG, SERIE, CODIGOSUNAT, AFECTOICBPER, UBICACION, PESO, PMAYOR, STOCKMINIMO, ESTADOSERVPROD, FACTURABLE, PERECIBLE, CLASIFICADOR, RECETA, NROLOTE, PRESENTACION, )
        VALUES (:NOREG, :FECHA, :DETALLE, :UNIDAD, :PRODUCTO, :CALCULO, :CANCELADO, :RESTO, :TURNO, :TIPO_SESION, :NICK, :CODIGO_VENDEDOR, :RESPONSABLE, :LINK, :ULINK, :DUAL, :FECHADETALLE, :CANTIDAD, :PC, :PV, :MONTO, :UNIDADPRODUCTO, :PU, :LIBROCONTABLE, :CUENTACONTABLE, :ESPRODUCTO, :MARCA, :TAMANIO, :PCUSD, :DESPLIEGUE, :TIPOISC, :TASAISC, :TIPODSCTO, :DSCTOUNIT, :TIPOCARGO, :CARGOUNIT, :TIPOOPERACION, :PR, :MINCOMPRA, :FECHAVENCIMIENTO, :VERSION_IMG, :SERIE, :CODIGOSUNAT, :AFECTOICBPER, :UBICACION, :PESO, :PMAYOR, :STOCKMINIMO, :ESTADOSERVPROD, :FACTURABLE, :PERECIBLE, :CLASIFICADOR, :RECETA, :NROLOTE, :PRESENTACION, )";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':NOREG', $NOREG);
        $stmt->bindParam(':FECHA', $FECHA);
        $stmt->bindParam(':DETALLE', $DETALLE);
        $stmt->bindParam(':UNIDAD', $UNIDAD);
        $stmt->bindParam(':PRODUCTO', $PRODUCTO);
        $stmt->bindParam(':CALCULO', $CALCULO);
        $stmt->bindParam(':CANCELADO', $CANCELADO);
        $stmt->bindParam(':RESTO', $RESTO);
        $stmt->bindParam(':TURNO', $TURNO);
        $stmt->bindParam(':TIPO_SESION', $TIPO_SESION);
        $stmt->bindParam(':NICK', $NICK);
        $stmt->bindParam(':CODIGO_VENDEDOR', $CODIGO_VENDEDOR);
        $stmt->bindParam(':RESPONSABLE', $RESPONSABLE);
        $stmt->bindParam(':LINK', $LINK);
        $stmt->bindParam(':ULINK', $ULINK);
        $stmt->bindParam(':DUAL', $DUAL);
        $stmt->bindParam(':FECHADETALLE', $FECHADETALLE);
        $stmt->bindParam(':CANTIDAD', $CANTIDAD);
        $stmt->bindParam(':PC', $PC);
        $stmt->bindParam(':PV', $PV);
        $stmt->bindParam(':MONTO', $MONTO);
        $stmt->bindParam(':UNIDADPRODUCTO', $UNIDADPRODUCTO);
        $stmt->bindParam(':PU', $PU);
        $stmt->bindParam(':LIBROCONTABLE', $LIBROCONTABLE);
        $stmt->bindParam(':CUENTACONTABLE', $CUENTACONTABLE);
        $stmt->bindParam(':ESPRODUCTO', $ESPRODUCTO);
        $stmt->bindParam(':MARCA', $MARCA);
        $stmt->bindParam(':TAMANIO', $TAMANIO);
        $stmt->bindParam(':PCUSD', $PCUSD);
        $stmt->bindParam(':DESPLIEGUE', $DESPLIEGUE);
        $stmt->bindParam(':TIPOISC', $TIPOISC);
        $stmt->bindParam(':TASAISC', $TASAISC);
        $stmt->bindParam(':TIPODSCTO', $TIPODSCTO);
        $stmt->bindParam(':DSCTOUNIT', $DSCTOUNIT);
        $stmt->bindParam(':TIPOCARGO', $TIPOCARGO);
        $stmt->bindParam(':CARGOUNIT', $CARGOUNIT);
        $stmt->bindParam(':TIPOOPERACION', $TIPOOPERACION);
        $stmt->bindParam(':PR', $PR);
        $stmt->bindParam(':MINCOMPRA', $MINCOMPRA);
        $stmt->bindParam(':FECHAVENCIMIENTO', $FECHAVENCIMIENTO);
        $stmt->bindParam(':VERSION_IMG', $VERSION_IMG);
        $stmt->bindParam(':SERIE', $SERIE);
        $stmt->bindParam(':CODIGOSUNAT', $CODIGOSUNAT);
        $stmt->bindParam(':AFECTOICBPER', $AFECTOICBPER);
        $stmt->bindParam(':UBICACION', $UBICACION);
        $stmt->bindParam(':PESO', $PESO);
        $stmt->bindParam(':PMAYOR', $PMAYOR);
        $stmt->bindParam(':STOCKMINIMO', $STOCKMINIMO);
        $stmt->bindParam(':ESTADOSERVPROD', $ESTADOSERVPROD);
        $stmt->bindParam(':FACTURABLE', $FACTURABLE);
        $stmt->bindParam(':PERECIBLE', $PERECIBLE);
        $stmt->bindParam(':CLASIFICADOR', $CLASIFICADOR);
        $stmt->bindParam(':RECETA', $RECETA);
        $stmt->bindParam(':NROLOTE', $NROLOTE);
        $stmt->bindParam(':PRESENTACION', $PRESENTACION);
        return $stmt->execute();
    }

    public function eliminarProductoPorId($id)
    {
        $query = "DELETE FROM productos WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function actualizarProducto($NOREG, $FECHA, $DETALLE, $UNIDAD, $PRODUCTO, $CALCULO, $CANCELADO, $RESTO, $TURNO, $TIPO_SESION, $NICK, $CODIGO_VENDEDOR, $RESPONSABLE, $LINK, $ULINK, $DUAL, $FECHADETALLE, $CANTIDAD, $PC, $PV, $MONTO, $UNIDADPRODUCTO, $PU, $LIBROCONTABLE, $CUENTACONTABLE, $ESPRODUCTO, $MARCA, $TAMANIO, $PCUSD, $DESPLIEGUE, $TIPOISC, $TASAISC, $TIPODSCTO, $DSCTOUNIT, $TIPOCARGO, $CARGOUNIT, $TIPOOPERACION, $PR, $MINCOMPRA, $FECHAVENCIMIENTO, $VERSION_IMG, $SERIE, $CODIGOSUNAT, $AFECTOICBPER, $UBICACION, $PESO, $PMAYOR, $STOCKMINIMO, $ESTADOSERVPROD, $FACTURABLE, $PERECIBLE, $CLASIFICADOR, $RECETA, $NROLOTE, $PRESENTACION, )
    {
        $query = "UPDATE productos SET NOREG = :NOREG, FECHA = :FECHA, DETALLE = :DETALLE, UNIDAD = :UNIDAD, PRODUCTO = :PRODUCTO, CALCULO = :CALCULO, CANCELADO = :CANCELADO, RESTO = :RESTO, TURNO = :TURNO, TIPO_SESION = :TIPO_SESION, NICK = :NICK, CODIGO_VENDEDOR = :CODIGO_VENDEDOR, RESPONSABLE = :RESPONSABLE, LINK = :LINK, ULINK = :ULINK, DUAL = :DUAL, FECHADETALLE = :FECHADETALLE, CANTIDAD = :CANTIDAD, PC = :PC, PV = :PV, MONTO = :MONTO, UNIDADPRODUCTO = :UNIDADPRODUCTO, PU = :PU, LIBROCONTABLE = :LIBROCONTABLE, CUENTACONTABLE = :CUENTACONTABLE, ESPRODUCTO = :ESPRODUCTO, MARCA = :MARCA, TAMANIO = :TAMANIO, PCUSD = :PCUSD, DESPLIEGUE = :DESPLIEGUE, TIPOISC = :TIPOISC, TASAISC = :TASAISC, TIPODSCTO = :TIPODSCTO, DSCTOUNIT = :DSCTOUNIT, TIPOCARGO = :TIPOCARGO, CARGOUNIT = :CARGOUNIT, TIPOOPERACION = :TIPOOPERACION, PR = :PR, MINCOMPRA = :MINCOMPRA, FECHAVENCIMIENTO = :FECHAVENCIMIENTO, VERSION_IMG = :VERSION_IMG, SERIE = :SERIE, CODIGOSUNAT = :CODIGOSUNAT, AFECTOICBPER = :AFECTOICBPER, UBICACION = :UBICACION, PESO = :PESO, PMAYOR = :PMAYOR, STOCKMINIMO = :STOCKMINIMO, ESTADOSERVPROD = :ESTADOSERVPROD, FACTURABLE = :FACTURABLE, PERECIBLE = :PERECIBLE, CLASIFICADOR = :CLASIFICADOR, RECETA = :RECETA, NROLOTE = :NROLOTE, PRESENTACION = :PRESENTACION,  WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':NOREG', $NOREG);
        $stmt->bindParam(':FECHA', $FECHA);
        $stmt->bindParam(':DETALLE', $DETALLE);
        $stmt->bindParam(':UNIDAD', $UNIDAD);
        $stmt->bindParam(':PRODUCTO', $PRODUCTO);
        $stmt->bindParam(':CALCULO', $CALCULO);
        $stmt->bindParam(':CANCELADO', $CANCELADO);
        $stmt->bindParam(':RESTO', $RESTO);
        $stmt->bindParam(':TURNO', $TURNO);
        $stmt->bindParam(':TIPO_SESION', $TIPO_SESION);
        $stmt->bindParam(':NICK', $NICK);
        $stmt->bindParam(':CODIGO_VENDEDOR', $CODIGO_VENDEDOR);
        $stmt->bindParam(':RESPONSABLE', $RESPONSABLE);
        $stmt->bindParam(':LINK', $LINK);
        $stmt->bindParam(':ULINK', $ULINK);
        $stmt->bindParam(':DUAL', $DUAL);
        $stmt->bindParam(':FECHADETALLE', $FECHADETALLE);
        $stmt->bindParam(':CANTIDAD', $CANTIDAD);
        $stmt->bindParam(':PC', $PC);
        $stmt->bindParam(':PV', $PV);
        $stmt->bindParam(':MONTO', $MONTO);
        $stmt->bindParam(':UNIDADPRODUCTO', $UNIDADPRODUCTO);
        $stmt->bindParam(':PU', $PU);
        $stmt->bindParam(':LIBROCONTABLE', $LIBROCONTABLE);
        $stmt->bindParam(':CUENTACONTABLE', $CUENTACONTABLE);
        $stmt->bindParam(':ESPRODUCTO', $ESPRODUCTO);
        $stmt->bindParam(':MARCA', $MARCA);
        $stmt->bindParam(':TAMANIO', $TAMANIO);
        $stmt->bindParam(':PCUSD', $PCUSD);
        $stmt->bindParam(':DESPLIEGUE', $DESPLIEGUE);
        $stmt->bindParam(':TIPOISC', $TIPOISC);
        $stmt->bindParam(':TASAISC', $TASAISC);
        $stmt->bindParam(':TIPODSCTO', $TIPODSCTO);
        $stmt->bindParam(':DSCTOUNIT', $DSCTOUNIT);
        $stmt->bindParam(':TIPOCARGO', $TIPOCARGO);
        $stmt->bindParam(':CARGOUNIT', $CARGOUNIT);
        $stmt->bindParam(':TIPOOPERACION', $TIPOOPERACION);
        $stmt->bindParam(':PR', $PR);
        $stmt->bindParam(':MINCOMPRA', $MINCOMPRA);
        $stmt->bindParam(':FECHAVENCIMIENTO', $FECHAVENCIMIENTO);
        $stmt->bindParam(':VERSION_IMG', $VERSION_IMG);
        $stmt->bindParam(':SERIE', $SERIE);
        $stmt->bindParam(':CODIGOSUNAT', $CODIGOSUNAT);
        $stmt->bindParam(':AFECTOICBPER', $AFECTOICBPER);
        $stmt->bindParam(':UBICACION', $UBICACION);
        $stmt->bindParam(':PESO', $PESO);
        $stmt->bindParam(':PMAYOR', $PMAYOR);
        $stmt->bindParam(':STOCKMINIMO', $STOCKMINIMO);
        $stmt->bindParam(':ESTADOSERVPROD', $ESTADOSERVPROD);
        $stmt->bindParam(':FACTURABLE', $FACTURABLE);
        $stmt->bindParam(':PERECIBLE', $PERECIBLE);
        $stmt->bindParam(':CLASIFICADOR', $CLASIFICADOR);
        $stmt->bindParam(':RECETA', $RECETA);
        $stmt->bindParam(':NROLOTE', $NROLOTE);
        $stmt->bindParam(':PRESENTACION', $PRESENTACION);
        return $stmt->execute();
    }

    public function obtenerProductoPorNombre($DETALLE)
    {
        $query = "SELECT NOREG, FECHA, DETALLE, UNIDAD, PRODUCTO, CALCULO, CANCELADO, RESTO, TURNO, TIPO_SESION, NICK, CODIGO_VENDEDOR, RESPONSABLE, LINK, ULINK, DUAL, FECHADETALLE, CANTIDAD, PC, PV, MONTO, UNIDADPRODUCTO, PU, LIBROCONTABLE, CUENTACONTABLE, ESPRODUCTO, MARCA, TAMANIO, PCUSD, DESPLIEGUE, TIPOISC, TASAISC, TIPODSCTO, DSCTOUNIT, TIPOCARGO, CARGOUNIT, TIPOOPERACION, PR, MINCOMPRA, FECHAVENCIMIENTO, VERSION_IMG, SERIE, CODIGOSUNAT, AFECTOICBPER, UBICACION, PESO, PMAYOR, STOCKMINIMO, ESTADOSERVPROD, FACTURABLE, PERECIBLE, CLASIFICADOR, RECETA, NROLOTE, PRESENTACION,  FROM productos
   WHERE DETALLE = :DETALLE";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(': DETALLE', $DETALLE);
        return $stmt->execute();
    }

}
?>
