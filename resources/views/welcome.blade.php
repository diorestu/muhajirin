<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi - Musholla Al Muhajirin Denpasar Utara</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" />
    {{-- <!-- Mansory JS --> --}}
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
</head>

<body>
    <div class="container">
        <div class="mt-5 mb-4">
            <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3 mb-3" width="100">
            <h2 class="fw-bold text-success">Jadwal Kegiatan Musholla Al Muhajirin</h2>
            <h6 class="text-muted">Jalan Pondok Indah IV, Denpasar Utara</h6>
            {{-- <strong>
                Bootstrap 5 Cards Mansory
            </strong> --}}
        </div>

        <livewire:home-event />
    </div>
</body>

</html>
