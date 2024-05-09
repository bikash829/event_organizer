<x-alert.toast :title="$title" :message="$message" :positionY="$positionY" :positionX="$positionX" :time="$time" />

{{-- <h1>{{ $title }}</h1>
<h1>{{ $message }}</h1>
<h1>{{ $positionY }}</h1>
<h1>{{ $positionX }}</h1>
<h1>{{ $time }}</h1> --}}
@push('scripts')
    <script type="module">
        bootstrap.Toast.getOrCreateInstance($('#toast')[0]).show();
    </script>
@endpush
