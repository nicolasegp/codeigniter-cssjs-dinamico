# CSS y JS Dinámico para CodeIgniter

![CI Version](https://img.shields.io/badge/CodeIgniter%20Version-3.1.10-orange.svg)

---

## Configuración

Agregar variables en el archivo de configuración.

```php
// Ruta: application/config/config.php

$config['header_css'] = [];
$config['header_js'] = [];
$config['footer_js'] = [];
```

---

En los view correspondientes al Header o Footer agregar:

**Header**

```php
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Hello, world!</title>
		<?php if(function_exists('render_arch_header')) { render_arch_header(); } ?>
	</head>
	<body>

```

**Footer**

```php
		<?php if(function_exists('render_arch_footer')) { render_arch_footer(); } ?>
	</body>
</html>
```

---

## Uso

El Helper cuenta con 2 funciones de entrada.
Ambas funciones permiten entrada en **String** o en **Array**

- `add_css($archivos_css);`
- `add_js($archivos_js, $en_header);`

```php
<?php
class Blog extends CI_Controller {

	public function index() {
		$this->load->helper('cssjs');
		add_css('https://cdn.dominio.com/framework.min.css');
		add_css([
			base_url('css/archivo1.css'),
			base_url('css/archivo2.css')
		]);
		add_css(base_url('css/archivo3.css'));
		
		// Con el segundo parametro con true
		// el js se incluira en la etiqueta <head>
		add_js(base_url('js/render.js'), true);
		
		// De no usar el segundo parametro
		// se agregara al final de la página
		add_js([
			base_url('js/archivo1.js'),
			base_url('js/archivo2.js')
		]);

		$this->load->view('header');
		$this->load->view('blog/inicio', $Datos);
		$this->load->view('footer');
	}
}
```
