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

    <form method="post" enctype="multipart/form-data">
        <label>Sélectionner une image à téléverser:
            <input type="file" name="fileToUpload" id="fileToUpload">
        </label>
        <input type="submit" value="Téléverser" name="submit">
    </form>

</div>

{{ include ('layouts/footer.php')}}