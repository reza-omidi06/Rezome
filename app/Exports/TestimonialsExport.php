<?php

namespace App\Exports;

use App\Models\Testimonial;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class TestimonialsExport implements FromCollection, WithHeadings

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Testimonial::all(['testimonial_customer', 'testimonial_mail', 'testimonial_phone', 'testimonial_profession', 'testimonial_comment']);
    }
    public function headings(): array
    {
        return [
            'نام مشتری',
            'ایمیل',
            'شماره تماس',
            'کسب و کار',
            'پیام',
        ];
    }
}
