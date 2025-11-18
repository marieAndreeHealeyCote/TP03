{{ include('layouts/header.php', {'title': 'Livre'}) }}

<body>
    <h1>Liste de livres</h1>
    {% if session.privilege_id ==1 %}
    <a href="{{base}}/livre/create" class="btn bleu"> Ajouter un livre</a>
    {% endif %}
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Année</th>
                <th>Actions</th>
                <th>Catégorie</th>
                <th>Éditeur</th>
            </tr>
        </thead>
        <tbody>
            {% for livre in listeLivres %}
            <tr>
                <td>{{ livre.id }}</td>
                <td>{{ livre.titre }}</td>
                <td>{{ livre.auteur_nom }}</td>
                <td>{{ livre.annee_publication }}</td>
                <td>
                    {% if session.privilege_id ==2 %}
                    <a href="{{base}}/livre/show?id={{livre.id}}" class="btn bleu">Voir détails</a>
                    {% endif %}
                    {% if session.privilege_id ==1 %}
                    <a href="{{base}}/livre/show?id={{livre.id}}" class="btn vert">Modifier</a>
                    {% endif %}
                    {% if session.privilege_id ==1 %}
                    <a href="{{base}}/livre/delete?id={{livre.id}}" class="btn rouge" onclick="return confirm('Supprimer ce livre ?')">Supprimer</a>
                    {% endif %}
                </td>
                <td>{{ livre.categorie_nom }}</td>
                <td>{{ livre.editeur_nom }}</td>
            </tr>
            {% endfor %}
        </tbody>
    </table>

    {{ include ('layouts/footer.php') }}