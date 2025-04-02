<form class="row" wire:submit="createLicense({{$client->id}})">
    <div class="col-12 form-group">
        <label for="">Tipo de Licença</label>
        <select name="" id="" class="form form-control" wire:model="license_type" wire:change="setLicense()">
            <option value="" selected>escolha...</option>
            @foreach($license_types as $license_type)
              <option value="{{$license_type->id}}">{{$license_type->description}}</option>
            @endforeach
        </select>
        @error('license_type') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <label for="">Licença</label>
        <select name="" id="" class="form form-control" wire:model="license" wire:change="setAmount()">
            <option value="" selected>escolha...</option>
            @foreach($licenses as $license)
              <option value="{{$license->id}}">{{$license->name}}</option>
            @endforeach
        </select>
        @error('license') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <label for="">Forma de Pagamento</label>
        <select name="" id="" class="form form-control" wire:model="form_payment">
            <option value="" selected>escolha...</option>
            @foreach($form_payments as $form_payment)
              <option value="{{$form_payment->id}}">{{$form_payment->label}}</option>
            @endforeach
        </select>
        @error('form_payment') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    
    @if ($showFormLT)
    <div class="col-6 form-group">
    @else
    <div class="col-7 form-group">
    @endif
        <label for="">Distrito Municipal</label>
        <input type="text" class="form form-control" placeholder="distrito municipal" wire:model="township">
        @error('township') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    
    @if ($showFormLT)
    <div class="col-6 form-group">
        <label for="">Marca da Viatura</label>
        <input type="text" class="form form-control" placeholder="marca da viatura" wire:model="car_brand">
        @error('car_brand') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-8 form-group">
        <label for="">Modelo</label>
        <input type="text" class="form form-control" placeholder="modelo" wire:model="car_model">
        @error('car_model') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-4 form-group">
        <label for="">Matricula</label>
        <input type="text" class="form form-control" placeholder="matricula" wire:model="car_registration">
        @error('car_registration') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    @else
    <div class="col-5 form-group">
        <label for="">Unidade Comunal</label>
        <select name="" id="" class="form form-control" wire:model="communal_unity">
          <option value="" selected>escolha...</option>
          @foreach($communal_units as $communal_unity)
              <option value="{{$communal_unity->id}}">{{$communal_unity->label}}</option>
          @endforeach
        </select>
        @error('communal_unity') <small class="alert-error"> {{ $message }} </small> @enderror
      </div>
      <div class="col-6 form-group">
          <label for="">Quarteirão</label>
          <input type="text" class="form form-control" placeholder="numero do quarteirão" wire:model="house_number">
          @error('house_number') <small class="alert-error"> {{ $message }} </small> @enderror
      </div>
      <div class="col-6 form-group">
          <label for="">Casa</label>
          <input type="text" class="form form-control" placeholder="numero de casa" wire:model="block_number">
          @error('block_number') <small class="alert-error"> {{ $message }} </small> @enderror
      </div>
    @endif

    <div class="col-12 form-group">
        <label for="">Observação do Técnico</label>
        <textarea name="" id="" rows="3" class="form form-control" wire:model="observation"></textarea>
        @error('observation') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 my-3">
        <h5 class="text-primary">Custo da Licença: {{ number_format($amount, 2, ".", ",") }} MT</h5>
    </div>
    <div class="col-12">
      <button class="btn btn-success px-5" type="submit">Salvar</button>
    </div>
</form>