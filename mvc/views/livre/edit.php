{% include 'layouts/header.php' with {'title': 'Livre'} %}

<h2>Modifier un livre</h2>
<form method="POST">
    <div>
        <label for="titre">Titre :</label>
        <input type="text" name="titre" id="titre" value="{{ inputs.titre }}">
    </div>
    {% if errors.titre is defined %}
    <span class="error">{{ errors.titre }}</span>
    {% endif %}
    <div>
        <label for="auteur_id">Auteur :</label>
        <select name="auteur_id" id="auteur_id">
            <option value="" disabled>-- Sélectionner --</option>
            {% for auteur in listeAuteurs %}
            <option value="{{ auteur.id }}" {% if auteur.id == inputs.auteur_id %} selected {% endif %}>
                {{ auteur.nom }}
            </option>
            {% endfor %}
        </select>
    </div>
    {% if errors.auteur is defined %}
    <span class="error">{{ errors.auteur }}</span>
    {% endif %}
    <div>
        <label for="annee_publication">Année de publication :</label>
        <input type="number" name="annee_publication" id="annee_publication" min="1900" max="2030" value="{{ inputs.annee_publication }}">
    </div>
    {% if errors.annee_publication is defined %}
    <span class="error">{{ errors.annee_publication }}</span>
    {% endif %}
    <div>
        <label for="categorie_id">Catégorie :</label>
        <select name="categorie_id" id="categorie_id">
            <option value="" disabled>-- Sélectionner --</option>
            {% for categorie in listeCategories %}
            <option value="{{ categorie.id }}" {% if categorie.id == inputs.categorie_id %} selected {% endif %}>
                {{ categorie.nom }}
            </option>
            {% endfor %}
        </select>
    </div>
    {% if errors.categorie_id is defined %}
    <span class="error">{{ errors.categorie_id }}</span>
    {% endif %}
    <div>
        <label for="editeur_id">Éditeur :</label>
        <select name="editeur_id" id="editeur_id">
            <option value="" disabled>-- Sélectionner --</option>
            {% for editeur in listeEditeurs %}
            <option value="{{ editeur.id }}" {% if editeur.id == inputs.editeur_id %} selected {% endif %}>
                {{ editeur.nom }}
            </option>
            {% endfor %}
        </select>
    </div>
    {% if errors.editeur_id is defined %}
    <span class="error">{{ errors.editeur_id }}</span>
    {% endif %}
    <button type="submit" class="btn vert">Modifier</button>
    <a href="{{base}}/livres" class="btn bleu">Annuler</a>
</form>

{% include 'layouts/footer.php' %}