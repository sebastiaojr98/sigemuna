<div class="container-login">
    <div class="image"></div>
    <div class="form">
        <img src="{{asset('img/logo.png')}}" alt="" srcset="" style="width: 170px;">
        
        <form wire:submit="authenticate">
            <div class="form-group">
                <label for=""><span class="require">*</span> E-mail</label>
                <input type="email" wire:model="email" class="form-control" required>
                @error('email') <small class="alert-error"> {{ $message }} </small> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for=""><span class="require">*</span> Senha</label>
                <input type="password" wire:model="password" class="form-control" required>
                @error('password') <small class="alert-error"> {{ $message }} </small> @enderror
                @if(session()->has('error'))
                <small class="alert-error"> {{ session('error') }} </small>
                @endif
                <button class="bottom-submit" type="submit" id="btn-session">Iniciar Sessão</button>
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

<script>

    document.getElementById('btn-session').addEventListener('click', (element) => {
        document.getElementById('preloader').style.display ='flex'
    });
</script>