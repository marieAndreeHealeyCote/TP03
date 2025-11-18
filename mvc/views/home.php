{{ include('layouts/header.php', {'title': 'Homepage'}) }}

<h1>{{ data }}</h1>
<div class="image">
    <img src="{{ asset }}img/librairie.jpg" alt="librairie">
</div>


{{ include('layouts/footer.php') }}