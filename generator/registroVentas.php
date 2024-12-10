<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';

// TODO LO RELACIONADO A LA BASE DE DATOS, DEBE DE ESTAR EN EL MODELO
// UN MODELO POR LO REGULAR APUNTA A UNA TABLA O UNA VISTA
class modeloregistroVentas
{

    private $conexion;

    // al instanciar la clase debo obtener la conexion 
    public function __construct()
    {
        $this->conexion = Conexion::obtenerConexion();
    }

    // debe hacer un metodo para hacer select
    public function obtenerregistroVentas()
    {
        $query = $this->conexion->query('select '.
                                        'DUAL,'.
                                        'FECHAEMISION,'.
                                        'FECHAVENCIMIENTO,'.
                                        'TIPOCOMPROBANTE,'.
                                        'SERIECO,'.
                                        'NUMEROCO,'.
                                        'fsdfsdf,'.
                                        'TIPODOCUMENTO,'.
                                        'NRODOCUMENTO,'.
                                        'RAZONNOMBRE,'.
                                        'DIRECCION,'.
                                        'VEXPORTACION,'.
                                        'IGVTASA,'.
                                        'IGVIPM,'.
                                        'ISC,'.
                                        'OTROSTRIBUTOS,'.
                                        'BASEIMPONIBLE,'.
                                        'INAFECTAS,'.
                                        'TOTALEXONERADA,'.
                                        'GRATUITAS,'.
                                        'TIPODSCTO,'.
                                        'DSCTOUNIT,'.
                                        'DSCTOGLOBAL,'.
                                        'DESCUENTOS,'.
                                        'TIPOCARGO,'.
                                        'CARGOUNIT,'.
                                        'CARGOGLOBAL,'.
                                        'CARGOS,'.
                                        'IMPORTETOTAL,'.
                                        'MONEDA,'.
                                        'TIPOCAMBIO,'.
                                        'PERCEPUNIT,'.
                                        'PERCEPCION,'.
                                        'TIPOPAGO,'.
                                        'RCPFECHA,'.
                                        'RCPTIPO,'.
                                        'RCPSERIE,'.
                                        'RCPNUMERO,'.
                                        'MOTIVONOTA,'.
                                        'CODIGONOTA,'.
                                        'TIPOGUIA,'.
                                        'GUIAREMISION,'.
                                        'PLACA,'.
                                        'FECHATURNO,'.
                                        'TURNO,'.
                                        'HORA,'.
                                        'PUNTOVENTA,'.
                                        'MAQUINAVENTA,'.
                                        'SITUACION,'.
                                        'ENVIOSUNAT,'.
                                        'FECHAENVIO,'.
                                        'IDSESION,'.
                                        'CAJERO,'.
                                        'AFECTARSTOCK,'.
                                        'NPFACTURADO,'.
                                        'ENVIOCONTABILIDAD,'.
                                        'USERID,'.
                                        'GLOSA,'.
                                        'TRANSPORTABLE,'.
                                        'ENVIOWEB,'.
                                        'RESOLUCION,'.
                                        'ALMACEN,'.
                                        'ENTREGA,'.
                                        'COMPROBANTEELECTRONICO,'.
                                        'ESPECIALIDAD,'.
                                        'NROHISTORIA,'.
                                        'MEDICO,'.
                                        'PPCONVENIO,'.
                                        'CONVENIO,'.
                                        'REFERENCIA,'.
                                        'DATAVALIDADA,'.
                                        'ESTADOPLE,'.
                                        'RESUMENID,'.
                                        'NROSORTEO,'.
                                        'TASAICBPER,'.
                                        'CAT15_ELEM1,'.
                                        'CAT15_ELEM2,'.
                                        'CAT15_ELEM3,'.
                                        'CAT15_ELEM4,'.
                                        'CODDIRECCION,'.
                                        'CODLOCALANEXO,'.
                                        'PAGOEFECTIVO,'.
                                        'TIPOCLIENTE,'.
                                        'ORDENVENTA,'.
                                        'ENVIOWEBSERVICE,'.
                                        'TIPOOPERACION,'.
                                        'TOTALANTICIPOS,'.
                                        'IDCRM,'.
                                        'NROCUOTAS,'.
                                        'TELEFONO,'.
                                        'GARANTIA,'.
                                        'AUTORIZACION,'.
                                        'FECHACREACION,'.
                                        'TURNOCREACION,'.
                                        'NROCANJE,'.
                                        'NUMPAGO,'.
                                        'from registroVentas');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // debe hacer un metodo para hacer insert
    public function insertarregistroVentas(
    $DUAL,
    $FECHAEMISION,
    $FECHAVENCIMIENTO,
    $TIPOCOMPROBANTE,
    $SERIECO,
    $NUMEROCO,
    $fsdfsdf,
    $TIPODOCUMENTO,
    $NRODOCUMENTO,
    $RAZONNOMBRE,
    $DIRECCION,
    $VEXPORTACION,
    $IGVTASA,
    $IGVIPM,
    $ISC,
    $OTROSTRIBUTOS,
    $BASEIMPONIBLE,
    $INAFECTAS,
    $TOTALEXONERADA,
    $GRATUITAS,
    $TIPODSCTO,
    $DSCTOUNIT,
    $DSCTOGLOBAL,
    $DESCUENTOS,
    $TIPOCARGO,
    $CARGOUNIT,
    $CARGOGLOBAL,
    $CARGOS,
    $IMPORTETOTAL,
    $MONEDA,
    $TIPOCAMBIO,
    $PERCEPUNIT,
    $PERCEPCION,
    $TIPOPAGO,
    $RCPFECHA,
    $RCPTIPO,
    $RCPSERIE,
    $RCPNUMERO,
    $MOTIVONOTA,
    $CODIGONOTA,
    $TIPOGUIA,
    $GUIAREMISION,
    $PLACA,
    $FECHATURNO,
    $TURNO,
    $HORA,
    $PUNTOVENTA,
    $MAQUINAVENTA,
    $SITUACION,
    $ENVIOSUNAT,
    $FECHAENVIO,
    $IDSESION,
    $CAJERO,
    $AFECTARSTOCK,
    $NPFACTURADO,
    $ENVIOCONTABILIDAD,
    $USERID,
    $GLOSA,
    $TRANSPORTABLE,
    $ENVIOWEB,
    $RESOLUCION,
    $ALMACEN,
    $ENTREGA,
    $COMPROBANTEELECTRONICO,
    $ESPECIALIDAD,
    $NROHISTORIA,
    $MEDICO,
    $PPCONVENIO,
    $CONVENIO,
    $REFERENCIA,
    $DATAVALIDADA,
    $ESTADOPLE,
    $RESUMENID,
    $NROSORTEO,
    $TASAICBPER,
    $CAT15_ELEM1,
    $CAT15_ELEM2,
    $CAT15_ELEM3,
    $CAT15_ELEM4,
    $CODDIRECCION,
    $CODLOCALANEXO,
    $PAGOEFECTIVO,
    $TIPOCLIENTE,
    $ORDENVENTA,
    $ENVIOWEBSERVICE,
    $TIPOOPERACION,
    $TOTALANTICIPOS,
    $IDCRM,
    $NROCUOTAS,
    $TELEFONO,
    $GARANTIA,
    $AUTORIZACION,
    $FECHACREACION,
    $TURNOCREACION,
    $NROCANJE,
    $NUMPAGO,
    )
    {
        $query = 'INSERT INTO usuarios('.
                'DUAL,'.
                'FECHAEMISION,'.
                'FECHAVENCIMIENTO,'.
                'TIPOCOMPROBANTE,'.
                'SERIECO,'.
                'NUMEROCO,'.
                'fsdfsdf,'.
                'TIPODOCUMENTO,'.
                'NRODOCUMENTO,'.
                'RAZONNOMBRE,'.
                'DIRECCION,'.
                'VEXPORTACION,'.
                'IGVTASA,'.
                'IGVIPM,'.
                'ISC,'.
                'OTROSTRIBUTOS,'.
                'BASEIMPONIBLE,'.
                'INAFECTAS,'.
                'TOTALEXONERADA,'.
                'GRATUITAS,'.
                'TIPODSCTO,'.
                'DSCTOUNIT,'.
                'DSCTOGLOBAL,'.
                'DESCUENTOS,'.
                'TIPOCARGO,'.
                'CARGOUNIT,'.
                'CARGOGLOBAL,'.
                'CARGOS,'.
                'IMPORTETOTAL,'.
                'MONEDA,'.
                'TIPOCAMBIO,'.
                'PERCEPUNIT,'.
                'PERCEPCION,'.
                'TIPOPAGO,'.
                'RCPFECHA,'.
                'RCPTIPO,'.
                'RCPSERIE,'.
                'RCPNUMERO,'.
                'MOTIVONOTA,'.
                'CODIGONOTA,'.
                'TIPOGUIA,'.
                'GUIAREMISION,'.
                'PLACA,'.
                'FECHATURNO,'.
                'TURNO,'.
                'HORA,'.
                'PUNTOVENTA,'.
                'MAQUINAVENTA,'.
                'SITUACION,'.
                'ENVIOSUNAT,'.
                'FECHAENVIO,'.
                'IDSESION,'.
                'CAJERO,'.
                'AFECTARSTOCK,'.
                'NPFACTURADO,'.
                'ENVIOCONTABILIDAD,'.
                'USERID,'.
                'GLOSA,'.
                'TRANSPORTABLE,'.
                'ENVIOWEB,'.
                'RESOLUCION,'.
                'ALMACEN,'.
                'ENTREGA,'.
                'COMPROBANTEELECTRONICO,'.
                'ESPECIALIDAD,'.
                'NROHISTORIA,'.
                'MEDICO,'.
                'PPCONVENIO,'.
                'CONVENIO,'.
                'REFERENCIA,'.
                'DATAVALIDADA,'.
                'ESTADOPLE,'.
                'RESUMENID,'.
                'NROSORTEO,'.
                'TASAICBPER,'.
                'CAT15_ELEM1,'.
                'CAT15_ELEM2,'.
                'CAT15_ELEM3,'.
                'CAT15_ELEM4,'.
                'CODDIRECCION,'.
                'CODLOCALANEXO,'.
                'PAGOEFECTIVO,'.
                'TIPOCLIENTE,'.
                'ORDENVENTA,'.
                'ENVIOWEBSERVICE,'.
                'TIPOOPERACION,'.
                'TOTALANTICIPOS,'.
                'IDCRM,'.
                'NROCUOTAS,'.
                'TELEFONO,'.
                'GARANTIA,'.
                'AUTORIZACION,'.
                'FECHACREACION,'.
                'TURNOCREACION,'.
                'NROCANJE,'.
                'NUMPAGO,'.
                 ') VALUES( '.
                 ': DUAL,'.
                 ': FECHAEMISION,'.';
                 ': FECHAVENCIMIENTO,'.';
                 ': TIPOCOMPROBANTE,'.';
                 ': SERIECO,'.';
                 ': NUMEROCO,'.';
                 ': fsdfsdf,'.';
                 ': TIPODOCUMENTO,'.';
                 ': NRODOCUMENTO,'.';
                 ': RAZONNOMBRE,'.';
                 ': DIRECCION,'.';
                 ': VEXPORTACION,'.';
                 ': IGVTASA,'.';
                 ': IGVIPM,'.';
                 ': ISC,'.';
                 ': OTROSTRIBUTOS,'.';
                 ': BASEIMPONIBLE,'.';
                 ': INAFECTAS,'.';
                 ': TOTALEXONERADA,'.';
                 ': GRATUITAS,'.';
                 ': TIPODSCTO,'.';
                 ': DSCTOUNIT,'.';
                 ': DSCTOGLOBAL,'.';
                 ': DESCUENTOS,'.';
                 ': TIPOCARGO,'.';
                 ': CARGOUNIT,'.';
                 ': CARGOGLOBAL,'.';
                 ': CARGOS,'.';
                 ': IMPORTETOTAL,'.';
                 ': MONEDA,'.';
                 ': TIPOCAMBIO,'.';
                 ': PERCEPUNIT,'.';
                 ': PERCEPCION,'.';
                 ': TIPOPAGO,'.';
                 ': RCPFECHA,'.';
                 ': RCPTIPO,'.';
                 ': RCPSERIE,'.';
                 ': RCPNUMERO,'.';
                 ': MOTIVONOTA,'.';
                 ': CODIGONOTA,'.';
                 ': TIPOGUIA,'.';
                 ': GUIAREMISION,'.';
                 ': PLACA,'.';
                 ': FECHATURNO,'.';
                 ': TURNO,'.';
                 ': HORA,'.';
                 ': PUNTOVENTA,'.';
                 ': MAQUINAVENTA,'.';
                 ': SITUACION,'.';
                 ': ENVIOSUNAT,'.';
                 ': FECHAENVIO,'.';
                 ': IDSESION,'.';
                 ': CAJERO,'.';
                 ': AFECTARSTOCK,'.';
                 ': NPFACTURADO,'.';
                 ': ENVIOCONTABILIDAD,'.';
                 ': USERID,'.';
                 ': GLOSA,'.';
                 ': TRANSPORTABLE,'.';
                 ': ENVIOWEB,'.';
                 ': RESOLUCION,'.';
                 ': ALMACEN,'.';
                 ': ENTREGA,'.';
                 ': COMPROBANTEELECTRONICO,'.';
                 ': ESPECIALIDAD,'.';
                 ': NROHISTORIA,'.';
                 ': MEDICO,'.';
                 ': PPCONVENIO,'.';
                 ': CONVENIO,'.';
                 ': REFERENCIA,'.';
                 ': DATAVALIDADA,'.';
                 ': ESTADOPLE,'.';
                 ': RESUMENID,'.';
                 ': NROSORTEO,'.';
                 ': TASAICBPER,'.';
                 ': CAT15_ELEM1,'.';
                 ': CAT15_ELEM2,'.';
                 ': CAT15_ELEM3,'.';
                 ': CAT15_ELEM4,'.';
                 ': CODDIRECCION,'.';
                 ': CODLOCALANEXO,'.';
                 ': PAGOEFECTIVO,'.';
                 ': TIPOCLIENTE,'.';
                 ': ORDENVENTA,'.';
                 ': ENVIOWEBSERVICE,'.';
                 ': TIPOOPERACION,'.';
                 ': TOTALANTICIPOS,'.';
                 ': IDCRM,'.';
                 ': NROCUOTAS,'.';
                 ': TELEFONO,'.';
                 ': GARANTIA,'.';
                 ': AUTORIZACION,'.';
                 ': FECHACREACION,'.';
                 ': TURNOCREACION,'.';
                 ': NROCANJE,'.';
                 ': NUMPAGO,'.';
                  ') ';
        //statement o sentencia
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':perfil', $perfil);
        //echo $stmt;
        return $stmt->execute();
    }
 }
