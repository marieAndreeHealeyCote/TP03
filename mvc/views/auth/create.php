{{ include('layouts/header.php', {title:'Login'})}}
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

    <form method="post">
        <h2>Connexion</h2>

        <label>Nom d'utilisateur
            <input type="email" name="username" value="{{user.username}}">
        </label>
        <label>Mot de passe
            <input type="password" name="password">
        </label>


        <input type="submit" class="btn bleu" value="Connexion">
    </form>
</div>
{{ include('layouts/footer.php')}}