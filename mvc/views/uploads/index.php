{{ include('layouts/header.php', {title:'Upload File'})}}

<div class="container">

    {% if errors is defined %}
    <div class="error">
        <ul>
            {% for error in errors %}
            <li>{{ error }}</li>
            {% endfor %}
        </ul>
    </div>
    {% endif %}
    <div class="container">
        <h2>Image téléversée avec succès !</h2>

        <img src="{{ image }}" alt="Image uploaded" style="max-width: 300px;">
    </div>

    {{ include ('layouts/footer.php')}}