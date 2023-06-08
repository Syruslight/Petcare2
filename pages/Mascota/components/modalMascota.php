<!-- MODAL REGISTRO -->
<section class="moda  modalMascota modalMascotaAgre">
            <div class="row" id="modal-Register" >
            <div class=" container">
                <div class="row header-ReMas justify-content-end">
                    <div class="row close-btn">
                        <span class="btn btn-dark modal__close" style="width: 50px;">✖</span>
                    </div>
                    <div class="row">
                        <h3 class="mb-3"><span>Registro Mascota</span></h3>
                    </div>
                </div>
                <div class="row data">
                    <form action="../../llamadas/proceso_registromascota.php" method="post"
                        enctype="multipart/form-data">
                        <div class="data-col2">
                            <input type="text" id="nombre" class="form-control" name="nombreMascota" placeholder="Nombre">
                            <input type="date" name="fechaNac" class="form-control">
                            <input hidden value="<?= $value[7] ?>" name="idCliente">
    
                            <!-- Combo de especies -->
                            <div class="select-RaEs">
                            <select name="especie" id="especie" class="form-select" style="width: 193px;"
                                onchange="cargarRazas()">
                                <option selected>Selecciona Especie</option>
                                <?php
                                // Obtener los datos de la tabla de la base de datos
                                $queryEspecies = "SELECT * FROM especie"; // Reemplaza "tabla_especie" con el nombre de tu tabla
                                $resultEspecies = mysqli_query($conn, $queryEspecies);
                                // Generar las opciones del select utilizando los datos obtenidos
                                while ($rowEspecie = mysqli_fetch_assoc($resultEspecies)) {
                                    $nombreEspecie = $rowEspecie['nombre']; // Reemplaza "nombre_especie" con el nombre de columna correspondiente
                                    $valorEspecie = $rowEspecie['idespecie']; // Reemplaza "valor_especie" con el nombre de columna correspondiente
                                
                                    echo "<option value=\"$valorEspecie\">$nombreEspecie</option>";
                                }
                                ?>
                            </select>
    
                            <!-- Combo de razas -->
                            <select name="raza" id="raza" class="form-select" style="width: 193px;">
                                <option selected>Selecciona Raza</option>
                            </select>
                            </div>
    
                            <!-- JavaScript -->
                            <script>
                                function cargarRazas() {
                                    var especieSeleccionada = document.getElementById('especie').value;
    
                                    // Crear una instancia de XMLHttpRequest
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function () {
                                        if (xhr.readyState === XMLHttpRequest.DONE) {
                                            if (xhr.status === 200) {
                                                // Convertir la respuesta JSON en un objeto JavaScript
                                                var razas = JSON.parse(xhr.responseText);
    
                                                // Limpiar el combo de razas
                                                var razaSelect = document.getElementById('raza');
                                                razaSelect.innerHTML = '<option selected>Selecciona Raza</option>';
    
                                                // Generar las opciones del combo de razas utilizando los datos obtenidos
                                                // Generar las opciones del combo de razas utilizando los datos obtenidos
                                                razas.forEach(function (raza) {
                                                    var option = document.createElement('option');
                                                    option.value = raza.idraza + '-' + raza.nombre; // Concatena el id y el nombre con un guion
                                                    option.text = raza.nombre;
                                                    razaSelect.appendChild(option);
                                                });
    
                                            } else {
                                                console.log('Error al cargar las razas');
                                            }
                                        }
                                    };
    
                                    // Realizar la solicitud <AJAX para obtener las razas correspondientes a la especie seleccionada
                                    xhr.open('GET', '../../llamadas/obtener_razas.php?idespecie=' + especieSeleccionada);
                                    xhr.send();
                                }
                            </script>
    
    
                            <div class="row-short">
                                <div class="cont-radio ip">
                                    <select name="sexo" id="sexo" value="sexo" class="form-select" style="width: 109px;">
                                        <option selected>Sexo</option>
                                        <option value="H">Hembra</option>
                                        <option value="M">Macho</option>
                                    </select>
                                </div>
                            <input type="text" class="form-control ip" name="color" placeholder="Color">
                            </div>
                            <div class="row-short">
                                <input type="text" class="form-control ip" name="peso" placeholder="Peso">
                                <input type="text" class="form-control" style="width: 109px;" id="renian" name="renian" placeholder="Renian">

                            </div>

                            
    
                            <div class="cont-radio">
                                <select name="etapa" id="etapa" value="etapa" class="form-select" style="width: 193px;">
                                    <option selected>Selecciona Etapa</option>
                                    <option value="Cria">Cría</option>
                                    <option value="Juvenil">Juvenil</option>
                                    <option value="Adulto">Adulto</option>
                                </select>
                                <div class="cont-este">
                                    <label class="form-check-label">Esterilizado:</label>
                                    <input type="radio" name="esterilizado" class="form-check-input" id="si" value="SI">
                                    <label class="form-check-label" for="si">Si</label>
                                    <input type="radio" name="esterilizado" class="form-check-input" id="no" value="NO">
                                    <label class="form-check-label" for="no">No</label>
                                </div>
                            </div>
                        </div>


                        <div class="data-col1">
                            <div class="row">
                                <input class="form-control form-control-sm" id="foto" type="file" name="foto" hidden>
                    
                                <label id="cambiar-foto" for="foto">Subir Foto</label>
                            </div>
                                <div class="row">
                                    <div class="fotoPos">
                                            <div class="foto">
                                            <img id="img" src="../../imagenes/huella.jpg" alt="avatar" >   
                                            </div>                                
                                    </div>
                                    <div class="button">
                                        <input type="submit" name="registrar" value="Registrar" class="btn">
                                    </div>
                                </div>
                        </div>
                    </form>
                </div>

            </div>
            </div>
        </section>

    <!-- MODAL EDITAR -->
    <section class="moda modalMascota modalMascotaEdit">
            <div class="row" id="modal-Register" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.2), rgba(0,0,0,0.2)),url(../../imagenes/perroCarrusel.jpg);">
            <div class=" container">
                <div class="row header-ReMas justify-content-end">
                    <div class="row close-btn">
                        <span class="btn btn-dark modal__close" style="width: 50px;">X</span>
                    </div>
    
                    <div class="row">
                        <h3 class="mb-4"><span>Editar Mascota</span></h3>
                    </div>
                </div>
                <div class="row data">
                <form action="../../llamadas/proceso_registromascota.php" method="post" enctype="multipart/form-data">

                <div class="data-col2">
                <?php
        
        $idEditarmascota = $_SESSION['idEditarmascota'];
        foreach (listarDatosMascota($idEditarmascota, $conn) as $key => $mascota) {} ?>
        <input type="text" id="nombre" class="form-control" name="nombreMascota" value="<?= $mascota['nombre'] ?>" placeholder="Nombre">    
        <div class="row-short">
            <input type="text" class="form-control ip" name="peso" placeholder="Peso" value="<?= $mascota['peso'] ?>">
            <input type="text" class="form-control" style="width: 109px;" id="edad" name="edad" placeholder="Edad" value="<?= $mascota['edadAnos'] ?> años <?= $mascota['edadMeses'] ?> meses" disabled>
        </div>                   
        <div class="cont-radio">
            <select name="etapa" id="etapa" class="form-select" style="width: 193px;">
                <option selected>Selecciona Etapa</option>
                <option value="Cria" <?= ($mascota['etapa'] == 'Cria') ? 'selected' : '' ?>>Cría</option>
                <option value="Juvenil" <?= ($mascota['etapa'] == 'Juvenil') ? 'selected' : '' ?>>Juvenil</option>
                <option value="Adulto" <?= ($mascota['etapa'] == 'Adulto') ? 'selected' : '' ?>>Adulto</option>
            </select>
            <div class="cont-este">
                <label class="form-check-label">Esterilizado:</label>
                <input type="radio" name="esterilizado" class="form-check-input" id="si" value="SI" <?= ($mascota['esterilizado'] == 'SI') ? 'checked="checked"' : '' ?>>
                <label class="form-check-label" for="si">Si</label>
                <input type="radio" name="esterilizado" class="form-check-input" id="no" value="NO" <?= ($mascota['esterilizado'] == 'NO') ? 'checked="checked"' : '' ?>>
                <label class="form-check-label" for="no">No</label>
            </div>
            <input type="text" id="idmascota" name="idmascota" value="<?= $mascota['idmascota'] ?>">

        </div>
        <div class="button">
            <input type="submit" name="editar" value="Editar" class="btn">
        </div>
    </div>



        <div class="data-col1">
            <div class="row">
                <input class="form-control form-control-sm" id="foto" type="file" name="foto">
            </div>
            <div class="row">
                <div class="fotoPos">
                    <div class="foto">
                    <img src="../../imagenes/fotosperfil/cliente/<?= $mascota['fotoPerfil'] ?>" alt="profile">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

            </div>
            </div>
        </section>

    <!-- Modal Mascota Carnet -->
    <section class="moda modalMascota modalMascotaCarne">
        <div class="row modal-SaludMascota" id="modal-Carnet">
        <?php foreach (listarCarnetMascota(1, $conn) as $key => $mascota) {} ?>
            <div class="container">
                <div class="row justify-content-end">
                    <span class="modal__close btn btn-dark " style="width: 50px;">X</span>
                </div>
                <div class="row" style="width:100%; height: 88%">
                    <div class="card-mascota">
                        <div class="card">
                                <h5 class="card-title">
                                <?= $mascota['nombre'] ?>
                                </h5>
                            <div class="img-card">
                                <img src="../../imagenes/perrito.jpg" alt="" class="card-img-bottom img">
                            </div>
                            <div class="card-body">
                                <span class="card-text">
                                    <div class="co1">
                                        <ul class="list-unstyled"> 
                                            <li>Renian</li>
                                            <li>Edad:</li>
                                            <li>Sexo:</li>
                                            <li>Peso:</li>
                                            <li>Raza:</li>
                                            <li>Esterilizado:</li>
                                        </ul>
                                    </div>
                                    <div class="co2">
                                        <ul class="list-unstyled"> 
                                            <li><span><?= $mascota['renian'] ?></span></li>
                                            <li><span><?= $mascota['edadAnos'] ?> años <?= $mascota['edadMeses'] ?> meses</span></li>
                                            <li><span><?= $mascota['sexo']?></span></li>
                                            <li><span><?= $mascota['peso']?>  (kg)</span></li>
                                            <li><span><?= $mascota['raza']?></span></li>
                                            <li><span><?= $mascota['esterilizado']?></span></li>
                                        </ul>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-carnet">                       
                        <div class="row carnet-tit">
                            <h1>CARNET DE SALUD</h1>
                        </div>
                    <div class="container-carnet">
                        <div class="card carnet-data">
                            <div class="row header-tabla">
                                <img src="../../imagenes/PHlogo.png" alt="logo" class="col">
                                <span class="col" style="color: #ffffff;">Mis vacunas</span>
                                <img src="../../imagenes/PHlogo.png" alt="logo" class="col">
                            </div>
                            <div class="row carnet-tabla">
                                <div class="row table-data">
                                    <table class="table table-borderless table-striped table-responsive text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col">Lote</th>
                                                    <th scope="col">Tipo</th>
                                                    <th scope="col">Proxima</th>
                                                    <th scope="col" class="th">Observación</th>
                                                    <th scope="col" class="th">Restricción</th>
                                                </tr>
                                            </thead>
                                        <tbody>
                                            <tr>
                                                <td>10/05/2021</td>
                                                <td>COVId</td>
                                                <td>10/05/2021</td>
                                                <td>15/05/2021</td>
                                                <td>Lleva una receta para comida</td>
                                                <td class="th">No pasear por lodo</td>
                                            </tr>
                                            <tr>
                                                <td>10/05/2021</td>
                                                <td>COVId</td>
                                                <td>10/05/2021</td>
                                                <td>15/05/2021</td>
                                                <td>Lleva una receta para comida</td>
                                                <td class="th">No pasear por lodo</td>
                                            </tr>
                                            <tr>
                                                <td>10/05/2021</td>
                                                <td>COVId</td>
                                                <td>10/05/2021</td>
                                                <td>15/05/2021</td>
                                                <td>Lleva una receta para comida</td>
                                                <td class="th">No pasear por lodo</td>
                                            </tr>
                                            <tr>
                                                <td>10/05/2021</td>
                                                <td>COVId</td>
                                                <td>10/05/2021</td>
                                                <td>15/05/2021</td>
                                                <td>Lleva una receta para comida</td>
                                                <td class="th">No pasear por lodo</td>
                                            </tr>
                                            <tr>
                                                <td>10/05/2021</td>
                                                <td>COVId</td>
                                                <td>10/05/2021</td>
                                                <td>15/05/2021</td>
                                                <td>Lleva una receta para comida</td>
                                                <td class="th">No pasear por lodo</td>
                                            </tr>
                                            <tr>
                                                <td>10/05/2021</td>
                                                <td>COVId</td>
                                                <td>10/05/2021</td>
                                                <td>15/05/2021</td>
                                                <td>Lleva una receta para comida</td>
                                                <td class="th">No pasear por lodo</td>
                                            </tr>
                                            <tr>
                                                <td>10/05/2021</td>
                                                <td>COVId</td>
                                                <td>10/05/2021</td>
                                                <td>15/05/2021</td>
                                                <td>Lleva una receta para comida</td>
                                                <td class="th">No pasear por lodo</td>
                                            </tr>
                                            <tr>
                                                <td>10/05/2021</td>
                                                <td>COVId</td>
                                                <td>10/05/2021</td>
                                                <td>15/05/2021</td>
                                                <td>Lleva una receta para comida</td>
                                                <td class="th">No pasear por lodo</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>                
                </div> 
            </div>
        </div>
</section>
