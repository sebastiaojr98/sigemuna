<form class="row" wire:submit="createNeighborhood()">
    <div class="col-12 form-group">
        <label for=""><span class="span-required">*</span>Posto Administrativo</label>
        <select name="" id="" class="form form-control" wire:model="administrative_post">
            <option value="" selected>escolha...</option>
            @foreach ($administrative_posts as $administrative_post)
            <option value="{{$administrative_post->id}}">{{$administrative_post->label}}</option> 
            @endforeach
        </select>
        @error('administrative_post') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for=""><span class="span-required">*</span>Nome do Bairro</label>
        <input type="text" class="form form-control" placeholder="nome" wire:model="name">
        @error('name') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <button class="btn btn-success px-5 my-3">Cadastrar</button>
    </div>
</form>