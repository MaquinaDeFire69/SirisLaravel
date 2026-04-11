@extends('layouts.admin.master')

@section('title', 'Cambiar Contraseña')

@section('styles')
@vite([
'resources/src/assets/scss/iconly.scss',
{{-- Solamente adjuntar para las tablas jquery --}}
'resources/dist/assets/extensions/jquery/jquery.min.js',
{{-- Solamente adjuntar para los alerts --}}
'resources/dist/assets/extensions/sweetalert2/sweetalert2.min.css',
])
@endsection

@section('content')
{{-- Ignorar este bloque, es solo para mostrar el diseño de la página --}}
<div class="card-body">
    <div class="alert alert-info alert-dismissible show fade">
        Dentro del codigo leer los comentarios que se muestran como <strong>"{.{-- Comentario para saber a que corresponde --}}"</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>

{{-- Siempre debe estar presente en cada vista --}}
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-8 order-md-1 order-last">
            <h3>Titulo (Lista de formatos a usar para todas las vistas de acuerdo corresponda)</h3>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('panel-informativo') }}">Breadcrumb /</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<br>
{{-- Contenido --}}
<div class="page-content">


    {{-- Modal para mostrar informacion adicional --}}
    <section id="basic-modal">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Vertically Centered
                </h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <p>
                        Add <code>.modal-dialog-centered</code> to <code>.modal-dialog</code> to vertically
                        center the modal. Si es necesario quitar el atributo data-bs-backdrop="false" para que el modal se cierre al hacer click fuera del modal, o agregar el atributo data-bs-backdrop="static" para que no se cierre al hacer click fuera del modal, dependiendo de la necesidad de cada modal.
                    </p>
                    <!-- button trigger for  Vertically Centered modal -->
                    <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCenter">
                        Launch Modal
                    </button>
                    <!-- Vertically Centered modal Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" data-bs-backdrop="false" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Vertically Centered
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Croissant jelly-o halvah chocolate sesame snaps. Brownie caramels candy
                                        canes chocolate cake
                                        marshmallow icing lollipop I love. Gummies macaroon donut caramels
                                        biscuit topping danish.
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary"
                                        data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Accept</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- Filtros de busqueda --}}
    <!-- FILTROS -->
    <section class="basic-choices">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Filtros de búsqueda</h4>
            </div>
            <div class="card-body">

                <!-- AÑO Y MES -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6>Año</h6>
                        <select class="choices form-select">
                            <option value="">Seleccionar año</option>
                            <option>2024</option>
                            <option>2025</option>
                            <option>2026</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <h6>Mes</h6>
                        <select class="choices form-select">
                            <option value="">Seleccionar mes</option>
                            <option>Enero</option>
                            <option>Febrero</option>
                            <option>Marzo</option>
                            <option>Abril</option>
                            <option>Mayo</option>
                            <option>Junio</option>
                            <option>Julio</option>
                            <option>Agosto</option>
                            <option>Septiembre</option>
                            <option>Octubre</option>
                            <option>Noviembre</option>
                            <option>Diciembre</option>
                        </select>
                    </div>
                </div>

                <!-- PROVEEDOR -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h6>Proveedor de información</h6>
                        <select class="choices form-select">
                            <option value="">Seleccionar ente público</option>
                            <option>Secretaria Ejecutiva del Sistema Anticorrupción del Estado de Quintana Roo</option>
                            <option>Tribunal Electoral de Quintana Roo</option>
                        </select>
                    </div>
                </div>

                <!-- BOTONES -->
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <button class="btn btn-success w-100">
                            <i class="bi bi-check-circle me-2"></i>
                            Generar informe quincenal
                        </button>
                    </div>

                    <div class="col-md-6 mb-2">
                        <button class="btn btn-secondary w-100">
                            <i class="bi bi-eraser me-2"></i>
                            Limpiar filtros de búsqueda
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Tabla con JQuery --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    jQuery Datatable
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead class="bg-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Graiden</td>
                                <td>vehicula.aliquet@semconsequat.co.uk</td>
                                <td>076 4820 8838</td>
                                <td>Offenburg</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Dale</td>
                                <td>fringilla.euismod.enim@quam.ca</td>
                                <td>0500 527693</td>
                                <td>New Quay</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Nathaniel</td>
                                <td>mi.Duis@diam.edu</td>
                                <td>(012165) 76278</td>
                                <td>Grumo Appula</td>
                                <td>
                                    <span class="badge bg-danger">Inactive</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Darius</td>
                                <td>velit@nec.com</td>
                                <td>0309 690 7871</td>
                                <td>Ways</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Oleg</td>
                                <td>rhoncus.id@Aliquamauctorvelit.net</td>
                                <td>0500 441046</td>
                                <td>Rossignol</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Kermit</td>
                                <td>diam.Sed.diam@anteVivamusnon.org</td>
                                <td>(01653) 27844</td>
                                <td>Patna</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Jermaine</td>
                                <td>sodales@nuncsit.org</td>
                                <td>0800 528324</td>
                                <td>Mold</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Ferdinand</td>
                                <td>gravida.molestie@tinciduntadipiscing.org</td>
                                <td>(016977) 4107</td>
                                <td>Marlborough</td>
                                <td>
                                    <span class="badge bg-danger">Inactive</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Kuame</td>
                                <td>Quisque.purus@mauris.org</td>
                                <td>(0151) 561 8896</td>
                                <td>Tresigallo</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Deacon</td>
                                <td>Duis.a.mi@sociisnatoquepenatibus.com</td>
                                <td>07740 599321</td>
                                <td>Karapınar</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Channing</td>
                                <td>tempor.bibendum.Donec@ornarelectusante.ca</td>
                                <td>0845 46 49</td>
                                <td>Warrnambool</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Aladdin</td>
                                <td>sem.ut@pellentesqueafacilisis.ca</td>
                                <td>0800 1111</td>
                                <td>Bothey</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Cruz</td>
                                <td>non@quisturpisvitae.ca</td>
                                <td>07624 944915</td>
                                <td>Shikarpur</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Keegan</td>
                                <td>molestie.dapibus@condimentumDonecat.edu</td>
                                <td>0800 200103</td>
                                <td>Assen</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Ray</td>
                                <td>placerat.eget@sagittislobortis.edu</td>
                                <td>(0112) 896 6829</td>
                                <td>Hofors</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Maxwell</td>
                                <td>diam@dapibus.org</td>
                                <td>0334 836 4028</td>
                                <td>Thane</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Carter</td>
                                <td>urna.justo.faucibus@orci.com</td>
                                <td>07079 826350</td>
                                <td>Biez</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Stone</td>
                                <td>velit.Aliquam.nisl@sitametrisus.com</td>
                                <td>0800 1111</td>
                                <td>Olivar</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Berk</td>
                                <td>fringilla.porttitor.vulputate@taciti.edu</td>
                                <td>(0101) 043 2822</td>
                                <td>Sanquhar</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Philip</td>
                                <td>turpis@euenimEtiam.org</td>
                                <td>0500 571108</td>
                                <td>Okara</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Kibo</td>
                                <td>feugiat@urnajustofaucibus.co.uk</td>
                                <td>07624 682306</td>
                                <td>La Cisterna</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Bruno</td>
                                <td>elit.Etiam.laoreet@luctuslobortisClass.edu</td>
                                <td>07624 869434</td>
                                <td>Rocca d"Arce</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Leonard</td>
                                <td>blandit.enim.consequat@mollislectuspede.net</td>
                                <td>0800 1111</td>
                                <td>Lobbes</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Hamilton</td>
                                <td>mauris@diam.org</td>
                                <td>0800 256 8788</td>
                                <td>Sanzeno</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Harding</td>
                                <td>Lorem.ipsum.dolor@etnetuset.com</td>
                                <td>0800 1111</td>
                                <td>Obaix</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Emmanuel</td>
                                <td>eget.lacus.Mauris@feugiatSednec.org</td>
                                <td>(016977) 8208</td>
                                <td>Saint-Remy-Geest</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>

    {{-- SweetAlert --}}
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">SweetAlerts</h4>
                        <p>
                            Dentro del archivo de sweetalert2.js se puede configurar el mensaje de los sweet alert, asi como persanalizar algunos, se puede copiar y pegar componentes, como pors ejemplo
                            :
                        </p>
                        <p>document.getElementById("question").addEventListener("click", (e) => {
                            Swal2.fire({
                            icon: "question",
                            title: "Question",
                            })
                            })
                        </p>
                        <p>
                            Me di cuenta que directamente en el archivo si no encuentra alguno de los componentes con el id, se cancelan los demas eventos, por lo que es importante revisar que el id del boton sea el mismo que el del evento, para evitar errores. Y corresponda descendentemente a cada boton, para evitar errores.
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <button id="success" class="btn btn-outline-success btn-lg btn-block">Success</button>
                            </div>
                            <div class="col-md-4 col-12">
                                <button id="error" class="btn btn-outline-danger btn-lg btn-block">Error</button>
                            </div>
                            <div class="col-md-4 col-12">
                                <button id="warning" class="btn btn-outline-warning btn-lg btn-block">Warning</button>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 col-12">
                                <button id="info" class="btn btn-outline-info btn-lg btn-block">Info</button>
                            </div>
                            <div class="col-md-6 col-12">
                                <button id="question"
                                    class="btn btn-outline-secondary btn-lg btn-block">Question</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Cards --}}
    <section class="section">
        <h4 class="card-title">
            Cards
        </h4>
        <!-- CARDS -->
        <div class="row mt-4">

            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100 border-start border-primary border-4">
                    <div class="card-body text-center">
                        <p class="fw-bold small">Efectividad de cumplimiento</p>
                        <h1 class="display-3 fw-bold text-primary">50%</h1>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100 border-start border-success border-4">
                    <div class="card-body text-center">
                        <p class="fw-bold small">Informes reportados en tiempo</p>
                        <h1 class="display-3 fw-bold text-success">1</h1>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100 border-start border-danger border-4">
                    <div class="card-body text-center">
                        <p class="fw-bold small">Informes reportados en extemporáneo</p>
                        <h1 class="display-3 fw-bold text-danger">1</h1>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>


@endsection

@section('js')

@vite([
{{-- Solamente adjuntar para las tablas jquery --}}
'resources/dist/assets/extensions/jquery/jquery.min.js',
'resources/dist/assets/extensions/apexcharts/apexcharts.min.js',
{{-- Solamente adjuntar para los alerts --}}
'resources/dist/assets/extensions/sweetalert2/sweetalert2.min.js',
'resources/dist/assets/static/js/pages/sweetalert2.js',
])
@endsection