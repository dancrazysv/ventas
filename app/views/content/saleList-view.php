<div class="container is-fluid mb-6">
    <h1 class="title">Ventas</h1>
    <h2 class="subtitle"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Ventas</h2>
</div>
<div class="container pb-6 pt-6">

    
<div class="columns">
            <div class="column">
                <div class="control">

    <form method="POST" action="">
        <input type="text" class="input" name="busqueda" placeholder="Buscar por código...">


    </div></div>
<div class="column">
                <div class="control">

        <input type="date" class="input" name="fecha_inicio" placeholder="Fecha de inicio">
        </div></div>

        <div class="column">
                <div class="control">
        <input type="date" class="input" name="fecha_fin" placeholder="Fecha de fin">
</div></div>

<div class="column">
                <div class="control">
        <div class="select">
        <!-- Campo para seleccionar el número de registros -->
        <select name="registros">
            <option value="500">500 resultados</option>
            <option value="1000">1000 resultados</option>
            <option value="2000">2000 resultados</option>
            <option value="4000">4000 resultados</option>
        </select>
      </div></div>  </div>

<div class="column">
                <div class="control">

        <button type="submit" class="button is-link is-outlined is-rounded is-small btn-sale-options">Buscar</button>


    </form>

</div></div></div>



    <?php
    use app\controllers\saleController;

    // Crear una instancia del controlador
    $insVenta = new saleController();

    // Capturar los parámetros del formulario
    $busqueda = isset($_POST['busqueda']) ? $_POST['busqueda'] : "";
    $fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : null;
    $fecha_fin = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : null;
    $registros = isset($_POST['registros']) ? (int)$_POST['registros'] : 500; // Valor predeterminado: 500

    // Parámetros para el listado de ventas
    $pagina = isset($url[1]) ? $url[1] : 1; // Página actual
    $url_paginacion = isset($url[0]) ? $url[0] : ""; // URL base para la paginación

    // Obtener la tabla de ventas
    $tabla_ventas = $insVenta->listarVentaControlador($pagina, $registros, $url_paginacion, $busqueda, $fecha_inicio, $fecha_fin);

    // Mostrar la tabla de ventas
    echo $tabla_ventas;

    // Incluir el script para imprimir facturas
    include "./app/views/inc/print_invoice_script.php";
    ?>
</div>