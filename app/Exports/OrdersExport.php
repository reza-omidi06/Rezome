<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Order::with('plan:id,name_type_fa')
        ->get(['plan_id', 'order_name', 'order_mail', 'order_phone', 'order_description'])
            ->map(function ($order) {
                $order->plan_id = $order->plan ? $order->plan->name_type_fa : null;
                return $order;
            });
    }

    public function headings(): array
    {
        return [
            'نام پلن',
            'نام سفارش‌دهنده',
            'ایمیل سفارش‌دهنده',
            'تلفن سفارش‌دهنده',
            'توضیحات سفارش',
        ];
    }
}
