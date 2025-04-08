@extends('templates.app')

@section('page')
<div class="container-login">
    <div class="image"></div>
    <div class="form">
        <img src="{{asset('img/logo.png')}}" alt="" srcset="" style="width: 170px;">
        
        <form method="POST" action="{{route('verify-otp')}}">
            @csrf
            <div class="form-group">
                <label for="" style="color: #0000009f; margin: 20px 0; font-size: 14pt;">Digita o código enviado para: {{ auth()->user()->phone }}</label>
                <input type="text" name="otp" class="form-control" placeholder="OTP"  style="text-align: center; font-size: 15pt; color: #2c7be5; font-weight: 900;">
                @error('otp') <small class="alert-error"> {{ $message }} </small> @enderror
                <button class="bottom-submit" type="submit" id="btn-session">Verificar</button>
            </div>
        </form>
    </div>

    <div id="preloader" style="width: 100%;height: 100vh;position: fixed;top: 0;left: 0;background-color: #0909099f;z-index: 99999999999;display: none;justify-content: center;align-items: center;flex-direction: column;">
        <div style="width: 250px; height: 100px; background-color: #ffffff; display: flex; align-items: center; justify-content: center;">
            <img src="{{ asset('assets/img/spiner.gif') }}" alt="spiner" style="width: 70px;">
            <p style="font-size: 15pt; margin-top: 7%">Aguarde...</p>
        </div>
    </div>
</div>
@endsection