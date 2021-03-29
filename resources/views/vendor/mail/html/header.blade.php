<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
<img src="{{ asset(config('mail.logo')) }}" alt="{{ config('app.name') }} Logo">
@endif
@if(isset($empresa) && ($empresa instanceof \App\Model\Entity\Empresa))
<h3>a serviço de {{$empresa->nome}} {{$empresa->cpf_cnpj}}</h3>
@endif
</a>
</td>
</tr>
