<form class="row" wire:submit="createAddress({{$client->id}})">
    <div class="col-6 form-group">
      <label for="">Posto Administrativo</label>
      <select name="" id="" class="form form-control" wire:change="setNeighborhoods()" wire:model="administrative_post">
        <option value="" selected>escolha...</option>
        @foreach($administrative_posts as $administrative_post)
            <option value="{{$administrative_post->id}}">{{$administrative_post->label}}</option>
        @endforeach
      </select>
      @error('administrative_post') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-6 form-group">
      <label for="">Bairro</label>
      <select name="" id="" class="form form-control" wire:change="setcommunalUnits()" wire:model="neighborhood">
        <option value="" selected>escolha...</option>
        @foreach($neighborhoods as $neighborhood)
            <option value="{{$neighborhood->id}}">{{$neighborhood->label}}</option>
        @endforeach
      </select>
      @error('neighborhood') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-7 form-group">
      <label for="">Unidade Comunal</label>
      <select name="" id="" class="form form-control" wire:model="communal_unity">
        <option value="" selected>escolha...</option>
        @foreach($communal_units as $communal_unity)
            <option value="{{$communal_unity->id}}">{{$communal_unity->label}}</option>
        @endforeach
      </select>
      @error('communal_unity') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-5 form-group">
        <label for="">Quarteirão</label>
        <input type="text" class="form form-control" placeholder="numero" wire:model="house_number">
        @error('house_number') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-4 form-group">
        <label for="">Casa</label>
        <input type="text" class="form form-control" placeholder="numero de casa" wire:model="block_number">
        @error('block_number') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-8 form-group">
        <label for="">Referencia</label>
        <input type="text" class="form form-control" wire:model="description" placeholder="referencia">
        @error('description') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <button class="btn btn-success px-5 my-3">Cadastrar</button>
    </div>
</form>