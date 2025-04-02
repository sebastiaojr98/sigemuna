<form class="row" wire:submit="createBankingDomicile({{$employee->id}})">
    <div class="col-6 form-group">
        <label for="">Emissora</label>
        <select name="" id="" class="form form-control" wire:model="bank_card_issue">
            <option value="" selected>escolha...</option>
            @foreach ($bank_card_issuers as $bank_card_issuer)
                <option value="{{$bank_card_issuer->id}}">{{$bank_card_issuer->description}}</option>
            @endforeach
        </select>
        @error('bank_card_issuer') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-6 form-group">
        <label for="">Numero de Conta</label>
        <input type="text" class="form form-control" placeholder="número" wire:model="account_number">
        @error('account_number') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 form-group">
        <label for="">NIB</label>
        <input type="text" class="form form-control" placeholder="NIB" wire:model="nib">
        @error('nib') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-7 form-group">
        <label for="">Número de Cartão</label>
        <input type="text" class="form form-control" placeholder="número" wire:model="card_number">
        @error('card_number') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-5 form-group">
        <label for="">Validade (mês/ano)</label>
        <input type="text" class="form form-control" placeholder="{{date("m/Y")}}" wire:model="validity">
        @error('validity') <small class="alert-error"> {{ $message }} </small> @enderror
    </div>
    <div class="col-12 my-3">
        <button class="btn btn-success px-4" type="submit">Salvar</button>
    </div>
</form>