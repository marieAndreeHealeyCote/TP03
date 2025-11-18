<!-- header.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{title}}</title>
    <link rel="stylesheet" href="{{ asset }}css/style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{base}}/home">Accueil</a></li>
                {% if session.privilege_id in [1, 2] %}
                <li><a href="{{base}}/livres">Liste de livres</a></li>
                {% endif%}
                {% if session.privilege_id == 1%}
                <li><a href="{{base}}/log">Journal de bord</a></li>
                {% endif%}
                {% if session.privilege_id == 1%}
                <li><a href="{{base}}/user/create">Nouvel utilisateur</a></li>
                {% endif%}
                {%if guest %}
                <li><a href="{{base}}/login">Connexion</a></li>
                {% else %}
                <li><a href="{{base}}/logout">Déconnexion</a></li>
                {% endif %}
            </ul>
        </nav>
    </header>
    <main>
        {%if guest is empty %}
        Bonjour {{ session.username }}
        {% endif %}