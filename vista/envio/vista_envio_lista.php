    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        width: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
<script type="text/javascript" src="../js/usuario.js?rev=<?php echo time();?>"></script>
    <script>

      let marker;

      function initMap() {
        var marcadores_nuevos=[];

        function quitar_marcadores(lista){
          for (i in lista) {
            lista[i].setMap(null);
          }
        }

        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 13,
          center: { lat: 59.325, lng: 18.07 },
          mapTypeId: "satellite",
        });

        google.maps.event.addListener(map, "click", function(event){
          var coordenadas = event.latLng.toString();

          coordenadas = coordenadas.replace("(","");
          coordenadas = coordenadas.replace(")","");

          var lista = coordenadas.split(",");

          //alert("Las coordenadas X es:"+lista[0]);
          //alert("Las coordenadas Y es:"+lista[1]);

          var direccion = new google.maps.LatLng(lista[0], lista[1]);

          var marker = new google.maps.Marker({
          map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          position: direccion
          });

          marcadores_nuevos.push(marker);

          google.maps.event.addListener(marker, "click", function(){
            //alert(marker.titulo);
          });

          quitar_marcadores(marcadores_nuevos);


        })
        
        marker.addListener("click", toggleBounce);
      }


    </script>
    <div class="col-md-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">BIENVENIDO CONTENIDO ENVIOS</font></font></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="form_group">
                <div class="row">
                <div class="col-lg-12">

  <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <div class="col-lg-12">
              <form>
                <table>
                  <tr>
                    <td>Título</td>
                    <td><input type="text" class="form-control" name="titulo" id="titulo" autocomplete="off"></td>
                  </tr>
                  <tr>
                    <td>Coordenada X</td>
                    <td><input type="text" class="form-control" name="cx" id="cx" disabled autocomplete="off"></td>
                  </tr>
                  <tr>
                    <td>Coordenada Y</td>
                    <td><input type="text" class="form-control" name="cy" id="cy" disabled autocomplete="off"></td>
                  </tr>
                  <tr>
                    <td><button type="button" class="btn btn-success" >Agregar</button></td>
                    <td><button type="button" class="btn btn-danger" >Cancelar</button></td>
                  </tr>

                </table>
              </form>
            </div>

            <!-- <div class="col-lg-12">
                <label for="" >Origen</label>
                <input type="password" class="form-control" id="txt_origen" placeholder="Origen" ><br />
            </div>

            <div class="col-lg-12">
                <label for="" >Destino</label>
                <input type="password" class="form-control" id="txt_destino" placeholder="Destino" ><br />
            </div> -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
          <div id="map"></div>

          <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
          <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw96AvE2sY5D7Be6nGM4n8E5ZZoWc7UhI&callback=initMap&libraries=&v=weekly"
            async
          ></script>
            














            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

                </div> 
                </div>               
              </div>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </div>

