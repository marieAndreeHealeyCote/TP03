{{ include('layouts/header.php', {title:'User Create'})}}
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
        <h2>Nouvel utilisateur</h2>
        <label>Nom
            <input type="text" name="name" value="{{user.name}}">
        </label>
        <label>Nom d'utilisateur
            <input type="email" name="username" value="{{user.username}}">
        </label>
        <label>Mot de passe
            <input type="password" name="password">
        </label>
        <label>Courriel
            <input type="email" name="email" value="{{user.email}}">
        </label>
        <label>Privilège
            <select name="privilege_id">
                <option value="">Select</option>
                {% for privilege in privileges %}
                <option value="{{privilege.id}}" {% if privilege.id == user.privilege_id %} selected {% endif %}>{{ privilege.privilege}}</option>
                {% endfor %}
            </select>
        </label>
        <input type="submit" class="btn bleu" value="Sauvegarder">
    </form>
</div>
{{ include('layouts/footer.php')}}