{{ include('layouts/header.php', {'title': 'Homepage'}) }}

<h1>{{ data }}</h1>
<img src="{{ librairie.image('@img/librairie.jpg') }}" alt="librairie">

{{ include('layouts/footer.php') }}