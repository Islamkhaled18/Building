@if (session('success'))

    <script>
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: "{{ session('success') }}",
            timeout: 2000,
            killer: true
        }).show();
    </script>

@endif

{{-- @if (Session::has('flash_message'))

    <div class="container">
        <div class='alert alert_danger' id="mes">
            {{ Seesion::get('flash_message') }}
        </div>
    </div>

@endif --}}

