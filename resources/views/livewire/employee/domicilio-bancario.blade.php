<div>
    <div class="col-lg-12 col-xxl-12 mb-3">
        <div class="card h-100">
        <div class="card-header bg-light d-flex flex-between-center py-2">
            <h6 class="mb-0">Domicilio Bancario</h6>
            @if (!$employee->employeeBankingDomicile)
            <div>
                <button class="btn btn-primary btn-sm me-2 px-4" type="button"  data-bs-toggle="modal" data-bs-target="#domicilioBancario">
                    <span class="fas fa-plus fs--2"></span><span class="d-none d-sm-inline-block ms-1 align-middle">Novo</span>
                </button>
            </div>
            @endif
        </div>
        <div class="card-body">
            <div class="row g-3 h-100">
            <div class="col-sm-6 col-lg-6">
                <div class="card position-relative rounded-4">
                <div class="bg-holder bg-card rounded-4" style="background-image:url(../../assets/img/icons/spot-illustrations/corner-2.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body p-3 pt-5 pt-xxl-4"><img class="mb-3" src="../../assets/img/icons/chip.png" alt="" width="30" />
                    <h6 class="text-primary font-base lh-1 mb-1 py-4">{{$employee->employeeBankingDomicile ? implode(" ", str_split($employee->employeeBankingDomicile->card_number, 4)) : "**** **** **** 0000"}}</h6>
                    <h6 class="mb-0 text-facebook">{{strtoupper($employee->first_name)}} {{strtoupper($employee->last_name)}}</h6><img class="position-absolute end-0 bottom-0 mb-2 me-2" src="../../assets/img/icons/master-card.png" alt="" width="70" />
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6">
                <table class="table table-borderless fw-medium font-sans-serif fs--1 mb-2">
                <tbody>
                    <tr>
                        <td class="p-1" style="width: 35%;">Conta:</td>
                        <td class="p-1 text-600">{{$employee->employeeBankingDomicile ? $employee->employeeBankingDomicile->account_number : ""}}</td>
                    </tr>
                    <tr>
                        <td class="p-1" style="width: 35%;">Expires:</td>
                        <td class="p-1 text-600">{{$employee->employeeBankingDomicile ? $employee->employeeBankingDomicile->validity : ""}}</td>
                    </tr>
                    <tr>
                        <td class="p-1" style="width: 35%;">Emissora:</td>
                        <td class="p-1 text-600">{{$employee->employeeBankingDomicile ? $employee->employeeBankingDomicile->bankCardIssue->description : ""}}</td>
                    </tr>
                    <tr>
                        <td class="p-1" style="width: 35%;">NIB:</td>
                        <td class="p-1 text-600">{{$employee->employeeBankingDomicile ? $employee->employeeBankingDomicile->nib : ""}}</td>
                    </tr>
                </tbody>
                </table>
                @if ($employee->employeeBankingDomicile)
                <span class="badge rounded-pill badge-subtle-success me-2">
                    <span>Verificado</span><span class="fas fa-check ms-1" data-fa-transform="shrink-4"></span></span>
                </span>
                @else
                <span class="badge rounded-pill badge-subtle-danger me-2">
                    <span>Nao Verificado</span><span class="fas fa-check ms-1" data-fa-transform="shrink-4"></span></span>
                </span>
                @endif
            </div>
            </div>
        </div>
        </div>
    </div>
    
    {{-- MODAL DE CADASTRO DE FUNCIONARIOS --}}
    <div class="modal fade" id="domicilioBancario" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md mt-6" role="document">
          <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
              <div class="bg-light rounded-top-3 py-3 ps-4">
                <h4 class="mb-1" id="staticBackdropLabel"> <i class="fas fa-coins"></i> DADOS BANCARIOS</h4>
              </div>
              <div class="px-4 py-3">
                <livewire:formulario-domicilio-bancario :employee="$employee" />
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- MODAL DE CADASTRO DE FUNCIONARIOS--}}
</div>


<script>
    document.addEventListener('livewire:initialized', () => {
        window.document.addEventListener("cadastrado", (event) => {
            @this.atualizar();
        });
    });
</script>