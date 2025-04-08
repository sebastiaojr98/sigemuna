<?php

namespace App\Livewire\Finances;

use App\Models\Invoice;
use App\Models\Receipt;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{

    public $meses = [];
    public $receitasPorMes = [];
    public $despesasPorMes = [];
    public $saldosPorMes = [];

    public $totalReceber = 0;
    public $totalPagar = 0;
    public $totalAtrasado = 0;
    public $saldoAtual = 0;

    public function mount()
    {
        // Buscar receitas
        $revenue = DB::table('receipts')
        ->selectRaw('MONTH(payment_date) as mes, SUM(amount_paid) as total')
        ->whereYear('payment_date', now()->year)
        ->groupBy(DB::raw('MONTH(payment_date)'))
        ->orderBy('mes')
        ->get(); // Use get() ao invés de pluck()

        // Buscar despesas
        $expenses = DB::table('supplier_payments')
        ->selectRaw('MONTH(payment_date) as mes, SUM(amount_paid) as total')
        ->whereYear('payment_date', now()->year)
        ->groupBy(DB::raw('MONTH(payment_date)'))
        ->orderBy('mes')
        ->get(); // Use get() ao invés de pluck()

        // Meses em português
        $mesesEmPortugues = [
            1 => 'Jan',
            2 => 'Fev',
            3 => 'Mar',
            4 => 'Abr',
            5 => 'Maio',
            6 => 'Jun',
            7 => 'Julh',
            8 => 'Agost',
            9 => 'Setem',
            10 => 'Out',
            11 => 'Nov',
            12 => 'Dez',
        ];

        // Inicializa os dados das receitas e despesas com valor 0
        $this->receitasPorMes = array_fill(1, 12, 0);
        $this->despesasPorMes = array_fill(1, 12, 0);

        // Preenche as receitas
        foreach ($revenue as $data) {
            $this->receitasPorMes[$data->mes] = $data->total;
        }

        // Preenche as despesas
        foreach ($expenses as $data) {
            $this->despesasPorMes[$data->mes] = $data->total;
        }

        // Meses
        $this->meses = array_values($mesesEmPortugues);

        // Calcular saldo para cada mês
        foreach (range(1, 12) as $mes) {
            $receita = $this->receitasPorMes[$mes] ?? 0;
            $despesa = $this->despesasPorMes[$mes] ?? 0;
            $this->saldosPorMes[] = $receita - $despesa;
        }
    }


    public function render()
    {
        
        $anoAtual = now()->year;

        // Total a Receber (Contas ainda por receber)
        $totalReceber = DB::table('accounts_receivable')
            ->selectRaw('SUM(amount_due - amount_paid) as total')
            ->whereYear('due_date', now()->year)
            ->value('total') ?? 0;

        // Total a Pagar (Contas ainda por pagar)
        $totalPagar = DB::table('account_payables')
            ->selectRaw('SUM(amount_due - amount_paid) as total')
            ->whereYear('due_date', now()->year) // Filtra para o ano atual
            ->value('total') ?? 0; // Se não houver resultado, retorna 0

        // Total Atrasado (Receitas ou despesas vencidas)
        $totalAtrasado = DB::table('account_payables')
            ->where('due_date', '<', now()) // Considera apenas registros com data de vencimento passada
            ->where('status', '!=', 'Pago') // Exclui registros com status "Pago"
            ->selectRaw('SUM(amount_due - amount_paid) as total') // Soma a diferença entre devido e pago
            ->value('total') ?? 0; // Retorna 0 se não houver valores

        $receitasPagas = DB::table('receipts')
            ->whereYear('payment_date', $anoAtual)
            ->sum('amount_paid');

        $despesasPagas = DB::table('supplier_payments')
            ->whereYear('payment_date', $anoAtual)
            ->sum('amount_paid');

        $saldoAtual = $receitasPagas - $despesasPagas;

        $this->totalReceber = $totalReceber;
        $this->totalPagar = $totalPagar;
        $this->totalAtrasado = $totalAtrasado;
        $this->saldoAtual = $saldoAtual;

        $recibosDeHoje = Receipt::with(['invoice', 'userCreated'])
            ->whereDate('payment_date', now()->toDateString())
            ->orderByDesc('payment_date')
            ->limit(5)
            ->get();

        $facturasMaisRecentes = Invoice::with(['customer', 'accountsReceivable'])
            ->orderByDesc('created_at') // Ordena pela data de criação da fatura, do mais recente
            ->limit(10) // Limita aos 10 primeiros resultados
            ->get();

        return view('livewire.finances.dashboard')->with([
            'totalReceber' => $totalReceber,
            'totalPagar' => $totalPagar,
            'totalAtrasado' => $totalAtrasado,
            'saldoAtual' => $saldoAtual,
            'recibosDeHoje' => $recibosDeHoje,
            'facturasMaisRecentes' => $facturasMaisRecentes
        ]);
    }
}
