@if (Sentinel::check() && $user->hasAccess(['admin.access']))
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/packages/vis/builder/fontawesome-pro-5.12.0-web/css/all.min.css">
    <script src="/packages/vis/builder/js/froala.js"></script>
    <link rel="stylesheet" href="/packages/vis/builder/css/froala.css">
    <script src="/packages/vis/builder/js/quick_edit.js"></script>
@endif
