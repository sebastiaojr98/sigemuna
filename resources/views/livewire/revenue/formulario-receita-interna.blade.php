<form class="row" wire:submit="createRevenue()">
    <div class="col-5 form-group">
        <label for=""><span class="span-required">*</span>Codigo do Processo</label>
        <input type="text" class="form form-control" placeholder="processo" wire:model="process_code">
        @error('process_code') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-7 form-group">
        <label for=""><span class="span-required">*</span>Tipo de Receita</label>
        <select name="" id="" class="form form-control" wire:model="type_revenue">
            <option value="" selected>escolha...</option>
            @foreach($type_revenues as $type_revenue)
              <option value="{{$type_revenue->id}}">{{$type_revenue->label}}</option>
            @endforeach
        </select>
        @error('type_revenue') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-7 form-group">
        <label for=""><span class="span-required">*</span>Forma de Pagamento</label>
        <select name="" id="" class="form form-control" wire:model="form_payment">
            <option value="" selected>escolha...</option>
            @foreach($form_payments as $form_payment)
              <option value="{{$form_payment->id}}">{{$form_payment->label}}</option>
            @endforeach
        </select>
        @error('form_payment') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-5 form-group">
        <label for=""><span class="span-required">*</span>Data de Despesa</label>
        <input type="date" class="form form-control" wire:model="revenue_date" max="{{date("Y-m-d")}}">
        @error('revenue_date') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-4 form-group">
        <label for=""><span class="span-required">*</span>Montante (MT)</label>
        <input type="text" class="form form-control" placeholder="custo" wire:model="amount">
        @error('amount') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>


    <div class="col-8 form-group">
        <label for=""><span class="span-required">*</span>Cliente</label>
        <select name="" id="" class="form form-control" wire:model="client">
            <option value="" selected>escolha...</option>
            @foreach($clients as $client)
              <option value="{{$client->id}}">{{$client->full_name}}</option>
            @endforeach
        </select>
        @error('client') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <label for="">Descrição</label>
        <textarea name="" id="" rows="3" class="form form-control" wire:model="description"></textarea>
        @error('description') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>

    <div class="col-12 form-group">
        <button class="btn btn-success px-5 my-3">Cadastrar</button>
    </div>
</form>