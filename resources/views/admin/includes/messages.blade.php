@if(session()->has('success'))
    <script>
         new Notify({
            status: 'success',
            title: 'Sucesso',
            text: '{{ session("success") }}',
            effect: 'fade',
            speed: 600,
            customClass: null,
            customIcon: null,
            showIcon: true,
            showCloseButton: true,
            autoclose: true,
            autotimeout: 3000,
            gap: 20,
            distance: 20,
            type: 3,
            position: 'right top'
        });
    </script>
@endif

@if(session()->has('error'))
    <script>
        new Notify({
            status: 'error',
            title: 'Erro',
            text: '{{ session("error") }}',
            effect: 'fade',
            speed: 600,
            customClass: null,
            customIcon: null,
            showIcon: true,
            showCloseButton: true,
            autoclose: true,
            autotimeout: 3000,
            gap: 20,
            distance: 20,
            type: 3,
            position: 'right top'
        })
    </script>
@endif
