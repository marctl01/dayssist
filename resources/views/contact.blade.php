@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="container-title">
        <div class="row">
            <div class="col-md-12">
                <h1 class="contact-title">Contact</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="contact-subtitle">Would you like to contact our team?</p>
            </div>
        </div>
    </div>
</div>
<div class="bg-grey">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
              <form method="POST" class="contact-form">
                <input type="text" name="name" placeholder="Name" class="form-control inputcontact">
                <input type="email" name="email" placeholder="Email" class="form-control inputcontact">
                <textarea name="message" placeholder="Message" class="form-control inputcontact" rows="5"></textarea>
                <button type="submit" class="btn btn-send">Send</button>
              </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 contactpadding">
            <div class="contact-info">
                <h2 class="contact-info-title">Contact Info</h2>
                <p class="contact-info-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl nec ultricies ultricies, nunc nunc tincidunt elit, vitae luctus nunc lorem eget mauris. Sed euismod, nisl nec ultricies ultricies, nunc nunc tincidunt elit, vitae luctus nunc lorem eget mauris.</p>
                <p class="contact-info-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl nec ultricies ultricies, nunc nunc tincidunt elit, vitae luctus nunc lorem eget mauris. Sed euismod, nisl nec ultricies ultricies, nunc nunc tincidunt elit, vitae luctus nunc lorem eget mauris.</p>
                <p class="contact-info-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl nec ultricies ultricies, nunc nunc tincidunt elit, vitae luctus nunc lorem eget mauris. Sed euismod, nisl nec ultricies ultricies, nunc nunc tincidunt elit, vitae luctus nunc lorem eget mauris.</p>
            </div>
        </div>
        <div class="col-md-6 contactpadding">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248057.55668436977!2d100.46795560592477!3d13.72454468861753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d6032280d61f3%3A0x10100b25de24820!2sBangkok%2C%20Tailandia!5e0!3m2!1ses!2ses!4v1681413345118!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
@endsection
           