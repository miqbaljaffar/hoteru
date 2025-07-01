<?php

namespace App\Exports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // AMBIL DATA PAYMENT DENGAN STATUS 'Down Payment'
        return Payment::with(['Customer', 'Transaction.Room'])
            ->where('status', 'Down Payment') // <-- UBAH STATUS MENJADI 'Down Payment'
            ->get()
            ->map(function ($payment) {
                return [
                    'Customer' => $payment->Customer->name,
                    'Kamar' => $payment->Transaction->Room->no,
                    'Price' => $payment->price,
                    'Date' => $payment->created_at->isoformat('D MMMM Y'),
                    'Status' => $payment->status,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Customer',
            'Kamar',
            'Price',
            'Date',
            'Status',
        ];
    }
}
