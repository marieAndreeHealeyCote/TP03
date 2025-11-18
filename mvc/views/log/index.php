{{ include ('layouts/header.php', {title:'Log'})}}

<body>
    <h1>Journal de bord</h1>
    <a href="{{ base }}/home" class="btn bleu">Retour à la page d'accueil</a>
    <table>
        <thead>
            <tr>
                <th>Page</th>
                <th>Username</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            {% for log in listeLogs %}
            <tr>
                <td>{{ log.page }}</td>
                <td>{{ log.username }}</td>
                <td>{{ log.date }}</td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</body>

{{ include ('layouts/footer.php')}}