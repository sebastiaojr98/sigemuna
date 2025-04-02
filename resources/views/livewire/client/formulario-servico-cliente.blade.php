<form class="row" wire:submit="createActivity({{$client->id}})">
    <div class="col-12 form-group">
        <label for="">Tipo de Atividade</label>
        <select name="" id="" class="form form-control" wire:model="service" wire:change="setSubServices()">
            <option value="" selected>escolha...</option>
            @foreach($services as $service)
              <option value="{{$service->id}}">{{$service->name}}</option>
            @endforeach
        </select>
        @error('service') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <label for="">Forma de Prestação</label>
        <select name="" id="" class="form form-control" wire:model="sub_service" wire:change="setAmount()">
            <option value="" selected>escolha...</option>
            @foreach($sub_services as $sub_service)
              <option value="{{$sub_service->id}}">{{$sub_service->label}}</option>
            @endforeach
        </select>
        @error('sub_service') <small class="alert-error"> {{ $message }} </small> @enderror
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

    <div class="col-12 form-group">
        <label for="">Bairro</label>
        <select name="" id="" class="form form-control" wire:model="neighborhood">
            <option value="" selected>escolha...</option>
            @foreach($neighborhoods as $neighborhood)
              <option value="{{$neighborhood->id}}">{{$neighborhood->label}}</option>
            @endforeach
        </select>
        @error('neighborhood') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

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