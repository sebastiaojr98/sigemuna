<form class="row" wire:submit="createSubService()">
    <div class="col-12 form-group">
        <label for=""><span class="span-required">*</span>Serviço</label>
        <select name="" id="" class="form form-control" wire:model="service">
            <option value="" selected>escolha...</option>
            @foreach ($services as $service)
            <option value="{{$service->id}}">{{$service->name}}</option> 
            @endforeach
        </select>
        @error('service') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for=""><span class="span-required">*</span>Forma de Prestação</label>
        <input type="text" class="form form-control" placeholder="nome" wire:model="sub_service">
        @error('sub_service') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for=""><span class="span-required">*</span>Custo</label>
        <input type="text" class="form form-control" placeholder="montante" wire:model="amount">
        @error('amount') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <button class="btn btn-success px-5 my-3">Cadastrar</button>
    </div>
</form>