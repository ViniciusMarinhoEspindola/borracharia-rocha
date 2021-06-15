<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprovante de serviços para {{  $agendamento->protocolo }}</title>
    <style>
        @page { size: 7cm 15cm landscape;  }

        .text {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
        }

        .str-to-upper {
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <table width="100%"  border="0" id="header">
        <tr>
            <td class="text"><strong>Protocolo:</strong> <strong>{{ $agendamento->protocolo }}</strong></td>
        </tr>
        <tr>
            <td class="text"><strong>Cliente:</strong> {{ $agendamento->cliente->name }}</td>
        </tr>
        <tr>
            <td class="text"><strong>Serviço:</strong> {{ $agendamento->servico->title }}</td>
        </tr>
        <tr>
            <td class="text"><strong>Data:</strong> {{ $agendamento->dt_agendamento->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td class="text"><strong>Hora:</strong> {{ $agendamento->hr_agendamento->format('H:i') }}</td>
        </tr>
    </table>

    {{-- <div style="page-break-after: always;"></div> --}}
</body>
</html>
