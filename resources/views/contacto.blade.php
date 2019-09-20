@extends('layouts.master')

@section('meta_title')Contacto @endsection

@section('extra_tags')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')
    <!-- Heading -->
    <section id="heading">
        <div class="container-fluid">

            <ul class="breadcrumbs">
                <li><a href="/">NMO</a></li>
                <li class="active">
                    Contacto
                </li>
            </ul>

            <div class="section-title">
                <h2>Contacto
                </h2>
            </div>
        </div>
    </section>
    <!-- /Heading -->

    <!-- Page -->
    <section id="page">
        <div class="container">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-md-8">
                    <form id="frm-contact" method="post">
                        {!! csrf_field() !!}
                        <div class="col-md-12 col-sm-12">
                            <div class="frm-wrap">
                                <label>Nombre <span class="req">*</span></label>
                                <input name="name" type="text" class="frm-text" required="">
                            </div>
                            <div class="frm-wrap">
                                <label>Email <span class="req">*</span></label>
                                <input type="hidden" type="email" name="email">
                                <input name="correo" type="email" class="frm-text" required="">
                            </div>
                            <div class="frm-wrap">
                                <label>Asunto</label>
                                <input name="subject" type="text" class="frm-text">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="frm-wrap">
                                <label>Mensaje <span class="req">*</span></label>
                                <textarea name="message" class="frm-textarea" cols="10" rows="10" required=""></textarea>
                            </div>
                            <div class="frm-wrap">
                                <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
                                <input type="submit" class="frm-submit" value="ENVIAR">
                                <small><span class="req">*</span> campos requeridos</small>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </section>
    <!-- /Page -->
@endsection