<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'login';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['logear'] = 'Login/logearte';
$route['logout'] = 'Login/logout';

$route['GetSolicitud'] = 'SolicitudController/getSolicitudMedico';
$route['SaveSolicitud'] = 'SolicitudController/saveSolicitud';
$route['EditSolicitud'] = 'SolicitudController/editSolicitud';
$route['GetSolicitudId'] = 'SolicitudController/getSolicitudId';
$route['DeleteSolicitud'] = 'SolicitudController/deleteSolicitud';
$route['GetResultadoId'] = 'SolicitudController/getResultadoId';

$route['GetSolicitudPendiente'] = 'RecepcionController/getSolicitudPendiente';
$route['AutocompleteResponsable'] = 'RecepcionController/getResponsable';
$route['AsignarSolicitud'] = 'RecepcionController/asignarSolicitud';

$route['GetSolicitudIdR'] = 'ResultadoController/getSolicitudId';
$route['GetSolicitudR'] = 'ResultadoController/getSolicitudMedico';
$route['SaveResultado'] = 'ResultadoController/saveResultado';
$route['SaveImage'] = 'ResultadoController/saveImage';
$route['GetImages'] = 'ResultadoController/getImages';

$route['GetReporte'] = 'ReporteController/generarPdf';


