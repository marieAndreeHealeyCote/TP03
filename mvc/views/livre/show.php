{{ include ('layouts/header.php', {title:'Livre'})}}
<h1>Livre créé</h1>

<div class="container">
    <form method="post">
        <p><strong>Titre: </strong>{{ inputs.titre }}</p>
        <p><strong>Auteur: </strong>{{ inputs.auteur_nom }}</p>
        <p><strong>Année de publication: </strong>{{ inputs.annee_publication }}</p>
        <p><strong>Catégorie: </strong>{{ inputs.categorie_nom }}</p>
        <p><strong>Éditeur: </strong>{{ inputs.editeur_nom }}</p>
        {% if session.privilege_id == 1%}
        <a href="{{ base }}/livre/edit?id={{inputs.id}}" class="btn vert">Modifier</a>
        <input type="hidden" name="id" value="{{ livre.id }}">
        {% endif %}
        <a href="{{ base }}/livres" class="btn bleu">Retour à la liste</a>
    </form>
</div>
{{ include ('layouts/footer.php')}}