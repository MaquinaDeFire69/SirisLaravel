
@extends('layouts.master')

@section('title', 'Dashboard')

@section('styles')
    @vite(['resources/src/assets/scss/iconly.scss'])
@endsection

@section('content')
<div class="page-heading">
    <h3>Cambiar contraseña</h3>
</div> 

<div class="page-content"> 
        <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('dashboard') }}">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="password-horizontal">Nueva contraseña</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="password" id="password-horizontal" class="form-control" name="password"
                                                placeholder="Ingrese la nueva contraseña">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="password-horizontal">Confirmar contraseña</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="password" id="password-horizontal" class="form-control" name="password"
                                                placeholder="Confirme la contraseña">
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Actualizar</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Limpiar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection

@section('js')
    @vite(['resources/dist/assets/static/js/pages/dashboard.js',
           'resources/dist/assets/static/js/pages/jquery.js',
           'resources/dist/assets/extensions/apexcharts/apexcharts.min.js',        
    ])
@endsection