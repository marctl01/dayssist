@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="container-title">
        <div class="row">
            <div class="col-md-12">
                <h1 class="contact-title">Contacto</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="contact-subtitle">¿Quieres ponerte en contacto con nosotros?</p>
            </div>
        </div>
    </div>
</div>
<div class="bg-grey">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
              <form method="POST" class="contact-form">
                <input type="text" name="name" placeholder="Nombre" class="form-control inputcontact">
                <input type="email" name="email" placeholder="Email" class="form-control inputcontact">
                <textarea name="message" placeholder="Mensaje" class="form-control inputcontact" rows="5"></textarea>
                <button type="submit" class="btn btn-send">Enviar</button>
              </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 contactpadding">
            <div class="contact-info">
                <h2 class="contact-info-title">¿Quienes somos?</h2>
                <p class="contact-info-text">Somos el equipo de Dayssist una empresa comprometida en brindar soluciones prácticas y efectivas a través de nuestra página web desarrollada con Laravel. Nuestro objetivo principal es ayudar a las personas a gestionar de manera eficiente su día a día y optimizar su tiempo.</p>
                <p class="contact-info-text">Creemos en la importancia de la organización y la planificación para llevar una vida equilibrada y productiva. Es por eso que nos enorgullece brindar una herramienta intuitiva y fácil de usar que permita a nuestros usuarios gestionar sus tareas diarias de manera eficiente, priorizar sus actividades y alcanzar sus metas personales y profesionales.</p>
            </div>
        </div>
        <div class="col-md-6 contactpadding">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248057.55668436977!2d100.46795560592477!3d13.72454468861753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d6032280d61f3%3A0x10100b25de24820!2sBangkok%2C%20Tailandia!5e0!3m2!1ses!2ses!4v1681413345118!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
@endsection
