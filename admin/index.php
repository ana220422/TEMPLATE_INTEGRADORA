<?= require_once('header.php') ;

if (!isset($_SESSION)){
    session_start();
    }
if (!isset($_SESSION['user_id'])){
header('location:/cliente/login.php');
}
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- Final del titulo -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
<!--         <div class="col-lg-10">
          <div class="row"> -->

            <!-- Sales Card -->
            <!-- <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filtro</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Hoy</a></li>
                    <li><a class="dropdown-item" href="#">Mes</a></li>
                    <li><a class="dropdown-item" href="#">Año</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Ventas <span>|Hoy</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>145</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                    </div>
                  </div>
                </div>

              </div>
            </div> --><!-- End Sales Card -->

            <!-- Revenue Card -->
            <!-- <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Hoy</a></li>
                    <li><a class="dropdown-item" href="#">Mes</a></li>
                    <li><a class="dropdown-item" href="#">Año</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Ingresos <span>| Mes</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$3,264</h6>
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div> --><!-- End Revenue Card -->

          <!-- vista -->
            <div class="col-xxl-4 col-md-8">
              <div class="card info-card sales-card">

                <?php
                  // conexion con la base de datos
                  require_once("mysql.lib.php"); //ingresa el codigo de la bibioteca
                  $mysqli = conectar();
                  /*
                  Ejecucion una consulta sql si una consulta es un select te devuelve un objeto de la clase mysql_resulttambien conocido como resultset o conjunto resultado
                  */

                  $sql = "SELECT * FROM primera_vista1";
                  $rs = query($sql);

                  ?>

                <div class="card-body">
                  <?php if ($rs->num_rows  > 0 ) : ?>
                      <table class="table table-bordered table-hover mt-2">
                        <tr class="text-center table-info">
                        <th>Id</th>
                        <th>Nombre sucursal</th>
                        <th>Nombre producto</th>
                         </tr>
                        <?php while ($row = $rs->fetch_assoc() ) :
                          extract($row);

                          ?>
                            <td class="text-center"><?=$Id ?></td>
                            <td><?=$nom_suc ?></td>
                            <td class="text-center"><?=$nom_prod ?></td>
                          </tr>
                          <?php endwhile; ?>
                          hola
                              </table>
                          <?php else : ?>

                          <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                            <i class="fas fa-ban fa-3x"></i>
                            ¡No hay productos!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                      <?php endif; ?>
                    </div>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- FINAL DE LA VISTA-->

          <!-- vista -->
            <div class="col-xxl-4 col-md-8">
              <div class="card info-card sales-card">

                <?php
                  // conexion con la base de datos
                  require_once("mysql.lib.php"); //ingresa el codigo de la bibioteca
                  $mysqli = conectar();
                  /*
                  Ejecucion una consulta sql si una consulta es un select te devuelve un objeto de la clase mysql_resulttambien conocido como resultset o conjunto resultado
                  */

                  $sql = "SELECT * FROM segunda_vista";
                  $rs = query($sql);

                  ?>

                <div class="card-body">
                  <?php if ($rs->num_rows  > 0 ) : ?>
                      <table class="table table-bordered table-hover mt-2">
                        <tr class="text-center table-info">
                        <th>Nombre Estado</th>
                        <th>Nombre Municipio</th>
                        <th>Nombre Sucursal</th>
                         </tr>
                        <?php while ($row = $rs->fetch_assoc() ) :
                          extract($row);

                          ?>
                            <td class="text-center"><?=$Nomb_esta ?></td>
                            <td class="text-center"><?=$Nomb_Mun ?></td>
                            <td class="text-center"><?=$Nom_suc ?></td>
                          </tr>
                          <?php endwhile; ?>
                          hola
                              </table>
                          <?php else : ?>

                          <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                            <i class="fas fa-ban fa-3x"></i>
                            ¡No hay sucursales!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                      <?php endif; ?>
                    </div>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- FINAL DE LA VISTA-->

          <!-- vista -->
            <div class="col-xxl-4 col-md-8">
              <div class="card info-card sales-card">

                <?php
                  // conexion con la base de datos
                  require_once("mysql.lib.php"); //ingresa el codigo de la bibioteca
                  $mysqli = conectar();
                  /*
                  Ejecucion una consulta sql si una consulta es un select te devuelve un objeto de la clase mysql_resulttambien conocido como resultset o conjunto resultado
                  */

                  $sql = "Show index from producto";
                  $rs = query($sql);

                  ?>

                <div class="card-body">
                  <?php if ($rs->num_rows  > 0 ) : ?>
                      <table class="table table-bordered table-hover mt-2 responsive">
                        <tr class="text-center table-info">
                        <th>Tabla</th>
                        <th>Non_unique</th>
                        <th>Key_name</th>
                        <th>Seq_in_index</th>
                        <th>Column_name</th>
                        <th>Collaction</th>
                        <th>Cardinality</th>
                        <th>Sub_part</th>
                        <th>Packed</th>
                        <th>Null</th>
                        <th>Index_type</th>
                        <th>Comment</th>
                        <th>Index_comment</th>
                        <th>Visible</th>
                        <th>Expression</th>
                         </tr>
                        <?php while ($row = $rs->fetch_assoc() ) :
                          extract($row);

                          ?>
                            <td class="text-center"><?=$Table ?></td>
                            <td class="text-center"><?=$Non_unique ?></td>
                            <td class="text-center"><?=$Key_name ?></td>
                            <td class="text-center"><?=$Seq_in_index ?></td>
                            <td class="text-center"><?=$Column_name ?></td>
                            <td class="text-center"><?=$Collation ?></td>
                            <td class="text-center"><?=$Cardinality ?></td>
                            <td class="text-center"><?=$Sub_part ?></td>
                            <td class="text-center"><?=$Packed ?></td>
                            <td class="text-center"><?=$Null ?></td>
                            <td class="text-center"><?=$Index_type ?></td>
                            <td class="text-center"><?=$Comment ?></td>
                            <td class="text-center"><?=$Index_comment ?></td>
                            <td class="text-center"><?=$Visible ?></td>
                            <td class="text-center"><?=$Expression ?></td>
                          </tr>
                          <?php endwhile; ?>
                          hola
                              </table>
                          <?php else : ?>

                          <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                            <i class="fas fa-ban fa-3x"></i>
                            ¡No hay sucursales!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                      <?php endif; ?>
                    </div>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- FINAL DE LA VISTA-->            


        </div><!-- End Left side columns -->

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>