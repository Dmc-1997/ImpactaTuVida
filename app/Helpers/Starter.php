<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Config\EnvConfig;
use App\Models\Config\StoreConfig;

use Carbon\Carbon;
Carbon::setLocale('es');

class Starter {


    public static function basicFolders()
    {
        Starter::createFolder('/imagenes/');
        Starter::createFolder('/imagenes/logos/');
        Starter::createFolder('/imagenes/cursos/');
        Starter::createFolder('/imagenes/eventos/');
        Starter::createFolder('/imagenes/bgs/');
    }

    public static function createFolder($folderName)
    {
        $path = public_path();
        if (!file_exists($path.$folderName)) {
            mkdir($path.$folderName, 0755, true);
            copy($path.'/images/index.php', $path.$folderName.'index.php');
        }
    }


    /**
     * Carga de cofiguración inicial
     */
    public static function storeInitialConfig()
    {
        $data = array();

        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'name', 'value' => 'Razón Social', 'label' => 'Razón Social', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'phone', 'value' => '3186435636', 'label' => 'Teléfono', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'email', 'value' => 'soporte@quiki.tech', 'label' => 'Email', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'address', 'value' => 'Calle 50 28 25', 'label' => 'Dirección', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'nit', 'value' => '', 'label' => 'Nit', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'whatsapp_number', 'value' => '', 'label' => 'Número de whatsapp', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'facebook', 'value' => '', 'label' => 'Facebook', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'gplus', 'value' => '', 'label' => 'Gplus', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'twitter', 'value' => '', 'label' => 'Twitter', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'instagram', 'value' => '', 'label' => 'Instagram', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'linkedin', 'value' => '', 'label' => 'Linkedin', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'youtube', 'value' => '', 'label' => 'Youtube', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'website', 'value' => '', 'label' => 'Website', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'apigooglemaps', 'value' => 'AIzaSyAVWCzTtRO-JQfnnT_yVWNK-FBP2b0lRxw', 'label' => 'API Google Maps', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'logo', 'value' => 'default.jpg', 'label' => 'Logo', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'featured', 'value' => '0', 'label' => 'Destacados', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'printer', 'value' => '0', 'label' => 'Impresora', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'printer_setup', 'value' => '', 'label' => 'Ajustes de impresora', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'decimals', 'value' => 0, 'label' => 'Decimals', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'currency_id', 'value' => '31', 'label' => 'Id moneda', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'order_prefix', 'value' => '', 'label' => 'Prefijo de la orden', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'order_limit', 'value' => '6', 'label' => 'Límite de la orden', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'folder', 'value' => time().Utils::genRandAlphaNumber(64), 'label' => 'Folder de almacenamiento', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'lat', 'value' => '7.095441604769603', 'label' => 'Latitud', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'lon', 'value' => '-73.1085205078125', 'label' => 'Longitud', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'zoom', 'value' => '14', 'label' => 'Zoom', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'marker', 'value' => 'marker.png', 'label' => 'Markcador', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'schedule', 'value' => '', 'label' => 'Schedule', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'country', 'value' => '', 'label' => 'País', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'department', 'value' => '', 'label' => 'Departmento', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'city', 'value' => '', 'label' => 'Ciudad', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'neighborhood', 'value' => '', 'label' => 'Barrio', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'zipcode', 'value' => '', 'label' => 'Zipcode', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'business_code', 'value' => '', 'label' => 'Código del negocio', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'api_key', 'value' => '', 'label' => 'Api key', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'next_bill_number', 'value' => '1', 'label' => 'Próxima factura', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'status', 'value' => '1', 'label' => 'Estado', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'oculto', 'value' => '0', 'label' => 'Oculto', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'quantity_decimals', 'value' => '0', 'label' => 'Decimales', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'frecuency', 'value' => '15000', 'label' => 'Frecuencia', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'tax_id', 'value' => '1', 'label' => 'id Impuestos', 'description' => '');
        // $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'car_capacity', 'value' => '', 'label' => 'Capacitdad Vehicular', 'description' => '');
        // $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'car_count', 'value' => '', 'label' => 'Cantidad Vehiculos', 'description' => '');
        // $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'motorcycle_capacity', 'value' => '', 'label' => 'Capacidad motocicleta', 'description' => '');
        // $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'motorcycle_count', 'value' => '', 'label' => 'Cantidad motocicletas', 'description' => '');
        // $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'final_price', 'value' => '', 'label' => 'Precio final', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'publicity_ticket', 'value' => '', 'label' => 'Publicidad en tiquete', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'safety_panic', 'value' => '', 'label' => 'Botón de pánico', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'order_remission', 'value' => '', 'label' => 'Plantilla remisión', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'order_invoice', 'value' => '', 'label' => 'Plantilla factura', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'bill_seller', 'value' => 'Vendedor', 'label' => 'Remisión vendedor', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'remission_footer_message', 'value' => 'Regimen simplificado No somos retenedores de IVA', 'label' => 'Pie de página de remisión', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'remission_title', 'value' => 'Remisión:', 'label' => 'Título Remisión', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'bill_footer_message', 'value' => 'Regimen simplificado No somos retenedores de IVA', 'label' => 'Pie de página de remisión', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'bill_title', 'value' => 'Factura:', 'label' => 'Título Factura', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'header_note', 'value' => '', 'label' => 'Nota superior en el recibo', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'footer_note', 'value' => '', 'label' => 'Nota inferior en el recibo', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'users_allowed', 'value' => '4', 'label' => 'Cantidad de usuarios permitidos', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'site_url', 'value' => '', 'label' => 'url del sitio', 'description' => '');

        $data[] = array('visible' => '1', 'group' => 8, 'type' => 'textarea',  'option' => 'style_home', 'value' => '', 'label' => 'Estilos del sitio', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 9, 'type' => 'textarea',  'option' => 'style_login', 'value' => '', 'label' => 'Estilos del login', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 10, 'type' => 'textarea',  'option' => 'style_academy', 'value' => '', 'label' => 'Estilos de la academia', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 11, 'type' => 'textarea',  'option' => 'style_admin', 'value' => '', 'label' => 'Estilos de la administración', 'description' => '');

        $data[] = array('visible' => '1', 'group' => 12, 'type' => 'textarea',  'option' => 'head_home', 'value' => '', 'label' => 'Edición en el head del sitio', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 13, 'type' => 'textarea',  'option' => 'head_login', 'value' => '', 'label' => 'Edición en el head del login', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 14, 'type' => 'textarea',  'option' => 'head_academy', 'value' => '', 'label' => 'Edición en el head de la academia', 'description' => '');
        $data[] = array('visible' => '1', 'group' => 15, 'type' => 'textarea',  'option' => 'head_admin', 'value' => '', 'label' => 'Edición en el head de la administración', 'description' => '');

        $data[] = array('visible' => '1', 'group' => 15, 'type' => 'textarea',  'option' => 'notification_email', 'value' => '', 'label' => 'Correo de notificaciones', 'description' => '');

        $data[] = array('visible' => '1', 'group' => 15, 'type' => 'textarea',  'option' => 'training_video', 'value' => 'https://www.youtube.com/embed/GIZXJGFV_z0', 'label' => 'video al inicio', 'description' => '');

        for ($i=0; $i<count($data); $i++) {
            $storeConfig = StoreConfig::whereOption($data[$i]["option"])->first();
            if (is_null($storeConfig)) {
                StoreConfig::create([
                    'visible' => $data[$i]["visible"],
                    'option' => $data[$i]["option"],
                    'value' => $data[$i]["value"],
                    'label' => $data[$i]["label"],
                    'description' => $data[$i]["description"]
                ]);
                echo $data[$i]["option"] . " created" . "<br />";
            } else {
                $storeConfig->group = $data[$i]["group"];
                $storeConfig->type = $data[$i]["type"];
                $storeConfig->label = $data[$i]["label"];
                $storeConfig->description = $data[$i]["description"];
                $storeConfig->save();
                echo $data[$i]["option"] . " updated" . "<br />";
            }
        }

        //eliminar
        // $data = array();
        // $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'car_capacity', 'value' => '', 'label' => 'Capacitdad Vehicular', 'description' => '');
        // $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'car_count', 'value' => '', 'label' => 'Cantidad Vehiculos', 'description' => '');
        // $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'motorcycle_capacity', 'value' => '', 'label' => 'Capacidad motocicleta', 'description' => '');
        // $data[] = array('visible' => '1', 'group' => 0, 'type' => 'text',  'option' => 'motorcycle_count', 'value' => '', 'label' => 'Cantidad motocicletas', 'description' => '');
        // for ($i=0; $i<count($data); $i++) {
        //     $storeConfig = StoreConfig::whereOption($data[$i]["option"])->delete();
        // }

        return true;
    }




}
