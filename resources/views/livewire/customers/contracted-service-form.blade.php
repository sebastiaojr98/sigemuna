<div class="row">
    <div class="col-5 form-group">
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

    <div class="col-12">
      <button class="btn btn-success my-3 form-control" type="submit" wire:click='contractService()'>Solicitar</button>
    </div>
</div>