@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @include('layouts.complements.admin.users.sidebar')
        <div class="container mt-4 container-title">
            <div>
                <h1>Usuario Admin</h1>
           <div>
            @if(session('success'))
                @include('views.admin.complements.success')
            @endif
            @if(session('error'))
                @include('views.admin.complements.error')
            @endif
                <form action="{{ route('adm_users.create')}}" method="POST" class="create-form" onsubmit="return validateForm()"> 
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required/>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" value="{{ old('email') }}" required/>
                        <span id="emailError" class="error"></span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required/>
                        <span id="passwordError" class="error"></span>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required/>
                        <span id="confirmPasswordError" class="error"></span>
                    </div>

                    <div class="form-group">
                        <label for="rol_id">Rol:</label>
                        <select id="rol_id" name="rol_id">
                            <option value="1">Admin</option>
                            <option value="2">Cliente</option>
                        </select>
                    </div>
                    <input type="submit" value="Send" class="btn btn-send"/>
                </form>
            </div>
            </div>            
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function validateForm() {
        var emailInput = document.getElementById('email');
        var passwordInput = document.getElementById('password');
        var confirmPasswordInput = document.getElementById('password_confirmation');
        var emailError = document.getElementById('emailError');
        var passwordError = document.getElementById('passwordError');
        var confirmPasswordError = document.getElementById('confirmPasswordError');
        var isValid = true;

        // Validar correo electrónico
        if (!isValidEmail(emailInput.value)) {
            emailError.textContent = 'Correo electrónico inválido';
            isValid = false;
        } else {
            emailError.textContent = '';
        }

        // Validar contraseña
        if (passwordInput.value.length < 8) {
            passwordError.textContent = 'Contraseña inválida';
            isValid = false;
        } else {
            passwordError.textContent = '';
        }

        // Validar contraseña repetida
        if (confirmPasswordInput.value !== passwordInput.value) {
            confirmPasswordError.textContent = 'Las contraseñas no coinciden';
            isValid = false;
        } else {
            confirmPasswordError.textContent = '';
        }

        // Validar usuario existente
        if (isValid) {
            checkExistingUser(emailInput.value);
        }

        return isValid;
    }

    function isValidEmail(email) {
        // Validación básica de formato de correo electrónico
        var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        return emailRegex.test(email);
    }

</script>
@endsection
