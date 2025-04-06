<div class="row">
    
    <div class="col-5 form-group mb-2">
        <label for="">Tipo de Serviço</label>
        <select name="" id="" class="form form-control" wire:model="serviceCategory" wire:change="searchService()">
            <option value="" selected>escolha...</option>
            @foreach ($serviceCategories as $serviceCategory)
                <option value="{{$serviceCategory->id}}">{{$serviceCategory->name}}</option>
            @endforeach
        </select>
        @error('serviceCategory') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-7 form-group">
        <label for="">Serviço</label>
        <select name="" id="" class="form form-control" wire:model="service">
            <option value="" selected>escolha...</option>
            @foreach ($services as $service)
                <option value="{{$service->id}}">{{$service->name}} - ({{formatAmount($service->base_price)}} MT)</option>
            @endforeach
        </select>
        @error('service') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    @if ($licenseType === "00001")
        <div class="col-6 form-group">
            <label for="">Unidade Communal</label>
            <select name="" id="" class="form form-control" wire:model="communalUnit">
                <option value="" selected>escolha...</option>
                @foreach ($communalUnits as $cu)
                    <option value="{{$cu->id}}">{{$cu->label}}</option>
                @endforeach
            </select>
            @error('communalUnit') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>
        <div class="col-3 form-group">
            <label for="">Nº de Casa</label>
            <input type="text" class="form form-control text-center" min="1" wire:model='houseNumber'>
            @error('houseNumber') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>
        <div class="col-3 form-group">
            <label for="">Quarterão</label>
            <input type="text" class="form form-control text-center" min="1" wire:model='block'>
            @error('block') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>
    @endif

    @if ($licenseType === "00002")
        <div class="col-5 form-group">
            <label for="">Marca</label>
            <input type="text" class="form form-control" wire:model='carBrand'>
            @error('carBrand') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>
        <div class="col-4 form-group">
            <label for="">Modelo</label>
            <input type="text" class="form form-control" wire:model='carModel'>
            @error('carModel') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>
        <div class="col-3 form-group">
            <label for="">Matrícula</label>
            <input type="text" class="form form-control" wire:model='carRegistration'>
            @error('carRegistration') <small class="alert-error"> {{ $message }} </small> @enderror
        </div>
    @endif

    <div class="col-12">
      <button class="btn btn-success my-3 form-control" type="submit" wire:click='contractService()'>Solicitar</button>
    </div>
</div>