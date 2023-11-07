<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZL Importados</title>
    <link rel="stylesheet" href="public/css/main.css" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Bruno+Ace&display=swap");
    </style>
  </head>
  <body>
    <main>
      <!-- HEADER -->

      <section class="header">
        <div class="logo">
          <img id="img-logo"
            src="public\img\logo ZL.png"
            alt="logo"
          />
          <div class="login">
          <a href="views/login.html"><button class="boton" type="button">Ingreso vendedores</button></a>
          </div>
        </div>

        <div class="catalogo">
          <h3>Catálogo entrega inmediata.</h3>
        </div>


        <div class="talles">
          <select name="selector_talles" id="selector_talles" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
            <option value="talles">TALLES</option>
            <option value="views\talle.php?talle=36&valor=36">36</option>
            <option value="views\talle.php?talle=37&valor=37">37</option>
            <option value="views\talle.php?talle=38&valor=38">38</option>
            <option value="views\talle.php?talle=39&valor=39">39</option>
            <option value="views\talle.php?talle=40&valor=40">40</option>
            <option value="views\talle.php?talle=41&valor=41">41</option>
            <option value="views\talle.php?talle=42&valor=42">42</option>
            <option value="views\talle.php?talle=43&valor=43">43</option>
            <option value="views\index.php">43</option>
          </select>
        </div>

      <div class="link-talles">
      <h3>Talles</h3>
      <a href="views\talle.php?talle=36">36</a>
      <a href="views\talle.php?talle=37">37</a>
      <a href="views\talle.php?talle=38">38</a>
      <a href="views\talle.php?talle=39">39</a>
      <a href="views\talle.php?talle=40">40</a>
      <a href="views\talle.php?talle=41">41</a>
      <a href="views\talle.php?talle=42">42</a>
      <a href="views\talle.php?talle=43">43</a>

      </div>

      </section>
      <hr />

      <div>
        <h3 id="venta">Zapatillas importadas de primera calidad.</h3>
      </div>

      <hr>

      <!-- BODY -->
      <section class="body">

      <?php
      // 1) Conexion
      $conexion = mysqli_connect("127.0.0.1", "root", "");
      mysqli_select_db($conexion, "zl");

      // 2) Preparar la orden SQL

      $consulta='SELECT * FROM zapas';

      // 3) Ejecutar la orden y obtenemos los registros
      $datos= mysqli_query($conexion, $consulta);

      // 4) el while recorre todos los registros y genera una CARD PARA CADA UNA
      while ($reg = mysqli_fetch_array($datos)) {?>


          <div class="container-zapas">
            <a href="views\producto.php?id=<?php echo $reg['id'];?>">
              <img
                id="zapas"
                src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen'])?>"
                alt=""
              />
            </a>
            <span class="nombre"><?php echo ucwords($reg['nombre']) ?></span>

            <h2>TALLE <?php echo $reg ['talle']; ?></h2>

            <span class="precio">$ <?php echo $reg['precio']; ?></span>
          </div>

      <?php } ?>
  </section>

    </main>
    <hr>

    <!-- FOOTER -->

    <footer>


      <div class="banner">

        </div>

      <hr>

      <div class="nosotros">
        <h2>ACERCA DE NOSOTROS</h2>
        <hr/>
        <p>ZL Importados nació como un emprendimiento personal que fue creciendo con el tiempo. Aun no contamos con local a la calle, pero pensamos abrir uno dentro de poco tiempo.</p>
        <p>Vendemos lo mejor en zapatillas importadas, calidad G5, ésto quiere decir que las zapatillas son casi iguales a las originales.</p>
        <p>Nos manejamos con entregas en puntos de encuentro por motomensajería, a domicilio por Andreani o también podes retirar sin cargo por la estación de Monte Grande.</p>
      </div>

      <hr>

      <div class="medios-de-pago">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="16"
          height="16"
          fill="currentColor"
          class="bi bi-credit-card"
          viewBox="0 0 16 16"
        >
          <path
            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"
          />
          <path
            d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"
          />
        </svg>
        <p>Trabajamos con todos los medios de pago.</p>
      </div>
      <div class="envios">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="16"
          height="16"
          fill="currentColor"
          class="bi bi-car-front-fill"
          viewBox="0 0 16 16"
        >
          <path
            d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"
          />
        </svg>
        <p>Hacemos envíos a todo el país.</p>
      </div>
      <div class="xmayor">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="16"
          height="16"
          fill="currentColor"
          class="bi bi-currency-dollar"
          viewBox="0 0 16 16"
        >
          <path
            d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"
          />
        </svg>
        <p>Ventas por mayor y menor.</p>
      </div>
      <div class="derechos">
        <h4>@Todos los derechos reservados. ZLimportados 2023</h4>
      </div>
    </footer>
  </body>
</html>
