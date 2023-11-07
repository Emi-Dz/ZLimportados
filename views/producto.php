<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Producto</title>
    <link rel="stylesheet" href="../public/css/main.css" />
    <link rel="stylesheet" href="../public/css/producto.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <main>
      <!-- HEADER -->

      <section class="header">
        <div class="logo">
          <img id="img-logo"
            src="../public\img\logo ZL.png"
            alt="logo"
          />
        </div>
        <div class="catalogo">
          <h3>Catálogo entrega inmediata.</h3>
        </div>
      </section>
      <!-- BODY -->
      <section class="body">
        <div class="button-exit">
          <a href="..\index.php">
            <img
              id="icon-exit"
              src="..\public\img\cruzar.png"
              alt="icon-exit"
            />
          </a>
        </div>

      <?php
      // 1) Conexion
      $conexion = mysqli_connect("127.0.0.1", "root", "");
      mysqli_select_db($conexion, "zl");
      $id = $_GET["id"];
      $consulta="SELECT * FROM zapas WHERE id=$id";
      $datos= mysqli_query($conexion, $consulta);
      while ($reg = mysqli_fetch_array($datos)) {
      ?>
      <div class="titulo">
        <span class="nombre"><?php echo ucwords($reg['nombre']) ?></span>
      </div>
        <div id="carouselExampleIndicators" class="carousel slide">
          <div class="carousel-indicators">
            <button
              id="button-1"
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="0"
              class="active"
              aria-current="true"
              aria-label="Slide 1"
            >
              <img id="button-img"
                src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen'])?>"
                class="d-block w-100"
                alt="boton 1"
              />
            </button>
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="1"
              aria-label="Slide 2"
            >
              <img id="button-img"
                src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen2'])?>"
                class="d-block w-100"
                alt="boton 2"
              />
            </button>
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="2"
              aria-label="Slide 3"
            >
              <img id="button-img"
                src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen3'])?>"
                class="d-block w-100"
                alt="boton 3"
              />
            </button>
          </div>
          <div id="carousel" class="carousel-inner">
            <div class="carousel-item active">
              <img id="img-active"
                src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen'])?>"
                class="d-block w-100"
                alt="foto 1"
              />
            </div>
            <div class="carousel-item">
              <img id="img-active"
                src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen2'])?>"
                class="d-block w-100"
                alt="foto 2"
              />
            </div>
            <div class="carousel-item">
              <img id="img-active"
                src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen3'])?>"
                class="d-block w-100"
                alt="foto 3"
              />
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>


        <span class="precio">$ <?php echo $reg['precio']; ?></span>

        <div class="talles_disp">
          <h2>TALLES</h2>
          <?php
          $name = $reg['nombre'];
          $consulta2= "SELECT * FROM zapas WHERE nombre = '$name' ORDER BY talle";
          $datos2= mysqli_query($conexion, $consulta2);
          $talles = array();

          while ($reg2 = mysqli_fetch_array($datos2)) {
          array_push($talles,$reg2['talle']);

        }
        $talles_sin_repetir=array_unique($talles);

        foreach ($talles_sin_repetir as $valor) { ?>
          <h2><?php echo " - ",$valor; ?></h2>

          <?php } ?>
        </div>

        <div class="card-body">
          <p class="card-text">
            <?php echo ($reg['leyenda']) ?>
          </p>
        </div>



          <div class="instructivo">
            <h5>Haga su pedido por whatsapp</h5>
          </div>
          <div class="button-whatsapp">
            <a href="https://wa.me/541130312213/?text= Hola, estoy interesado en las zapatillas <?php echo ucwords ($reg ['nombre']) ?>.">
              <img
                id="icon-whatsapp"
                src="..\public\img\icono whatsapp.png"
                alt="icono-whatsapp"
              />
            </a>
          </div>



        <?php } ?>



      </section>
    </main>

    <!-- FOOTER -->
    <div class="banner">
    </div>
    <footer>
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
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
