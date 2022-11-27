<x-mail::message>
# Factura de pago por consumo

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

<x-mail::table>
| Categoría             | Descripción               | Fecha     | Cargo |
| --------------------- |:-------------------------:| :--------:| -----:|
| Hospedaje             | 1 noche habitación Lujosa | 1/12/2022 | $1600 |
| Consumo en bar        | 1 Whiskey                 | 2/12/2022 | $250  |
| Consumo en restaurant | 1 spaghetti               | 2/12/2022 | $125  |
|                       |                           |           |       |
|                       |                           | Total:    | $1975 |
</x-mail::table>

Gracias por su preferencia,<br>
{{ config('app.name') }}
</x-mail::message>
