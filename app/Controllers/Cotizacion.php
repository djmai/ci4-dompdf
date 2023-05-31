<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use Dompdf\FontMetrics;

class Cotizacion extends BaseController
{
  public function index()
  {
    return view('welcome_message');
  }

  public function ver_cotizacion()
  {
    $data = [];

    // data
    $data = [
      // Logo del sitio
      'logo' => img_data('assets/logo.png'),

      // Datos de la factura
      'fecha_creacion' => '24/04/2023',
      'folio_cotizacion' => '00281345',
      'fecha_caducidad' => '24/05/2023',

      // Datos del cliente
      'nombre_cliente' => 'Cliente Test',
      'direccion_cliente' => 'Calle Test 123',
      'telefono_cliente' => '0987654321',
      'email_cliente' => 'xcvkp@example.com',

      // Datos del vendedor
      'nombre_vendedor' => 'Vendedor Test',

      // Detalle de productos
      'productos' => [
        [
          'sku' => '01',
          'descripcion' => 'Articulo 1',
          'precio_unitario' => '200',
          'cantidad' => 1,
          'imagen' => img_data('assets/logo.png'),
          'total' => '200'
        ],
        [
          'sku' => '02',
          'descripcion' => 'Articulo 2',
          'precio_unitario' => '300',
          'cantidad' => 2,
          'imagen' => img_data('assets/logo.png'),
          'total' => '600'
        ],
        [
          'sku' => '02',
          'descripcion' => 'Articulo 2',
          'precio_unitario' => '300',
          'cantidad' => 2,
          'imagen' => img_data('assets/logo.png'),
          'total' => '600'
        ],
        [
          'sku' => '02',
          'descripcion' => 'Articulo 2',
          'precio_unitario' => '300',
          'cantidad' => 2,
          'imagen' => img_data('assets/logo.png'),
          'total' => '600'
        ],
        [
          'sku' => '02',
          'descripcion' => 'Articulo 2',
          'precio_unitario' => '300',
          'cantidad' => 2,
          'imagen' => img_data('assets/logo.png'),
          'total' => '600'
        ],
        [
          'sku' => '02',
          'descripcion' => 'Articulo 2',
          'precio_unitario' => '300',
          'cantidad' => 2,
          'imagen' => img_data('assets/logo.png'),
          'total' => '600'
        ],
        [
          'sku' => '02',
          'descripcion' => 'Articulo 2',
          'precio_unitario' => '300',
          'cantidad' => 2,
          'imagen' => img_data('assets/logo.png'),
          'total' => '600'
        ],
        [
          'sku' => '02',
          'descripcion' => 'Articulo 2',
          'precio_unitario' => '300',
          'cantidad' => 2,
          'imagen' => img_data('assets/logo.png'),
          'total' => '600'
        ],
        [
          'sku' => '02',
          'descripcion' => 'Articulo 2',
          'precio_unitario' => '300',
          'cantidad' => 2,
          'imagen' => img_data('assets/logo.png'),
          'total' => '600'
        ],
        [
          'sku' => '02',
          'descripcion' => 'Articulo 2',
          'precio_unitario' => '300',
          'cantidad' => 2,
          'imagen' => img_data('assets/logo.png'),
          'total' => '600'
        ],
        [
          'sku' => '02',
          'descripcion' => 'Articulo 2',
          'precio_unitario' => '300',
          'cantidad' => 2,
          'imagen' => img_data('assets/logo.png'),
          'total' => '600'
        ],
      ],

      // subtotal del detalle
      'subtotal_detalle' => '1,00022.00',
      // impuesto
      'impuesto' => '16.000%',
      // total del detalle
      'total_detalle' => '1,01022.00',

      // Términos y condiciones
      'terminos' => 'Términos y Condiciones” es el documento que rige la relación contractual entre el proveedor de un servicio y el usuario. En la web, este documento a menudo también se denomina “Condiciones de servicio” (ToS), “Condiciones de uso”, EULA (“Acuerdo de licencia de usuario final”), “Condiciones generales” o “Notas legales'

    ];

    // Enviamos la data a la vista
    $html = view('cotizacion/template_cotizacion', $data);

    // Opciones de configuración para dompdf
    $options = new Options();
    $options->set("isPhpEnabled", true);
    $dompdf = new Dompdf($options);
    // Cargamos la plantilla
    $dompdf->loadHTML($html);
    $dompdf->setPaper('A4');
    $dompdf->render();

    // Esto es lo que imprime en el PDF el numero de paginas
    $font = $dompdf->getFontMetrics()->get_font("helvetica");
    $canvas = $dompdf->getCanvas();
    $footer = $canvas->open_object();
    $w = $canvas->get_width();
    $h = $canvas->get_height();
    $canvas->page_text($w - 100, $h - 28, "Página {PAGE_NUM} de {PAGE_COUNT}", $font, 8);
    $canvas->page_text($w / 2 * .4, $h - 40, 'Si usted tiene alguna pregunta sobre esta cotización, por favor, póngase en contacto con nosotros', $font, 8);
    $canvas->page_text($w / 2 * .6, $h - 30, 'Carmen Garza, cgarza@davevending.com.mx, (81) 2091-6767', $font, 8);
    $canvas->close_object();
    $canvas->add_object($footer, "all");

    // Descargarmos o mostramos el pdf
    // Attachment
    //  0 -> Muestra el pdf en el navegador
    //  1 -> Descarga el pdf directo

    $dompdf->stream('Cotización-' . $data['folio_cotizacion'], ['Attachment' => 1]);
  }
}
