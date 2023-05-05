<script defer src=index.js></script>
<br>
<button id="BTusers" onclick="FetchContent('users')">tout les users</button>
<button id="BTusers" onclick="FetchContent('books')">tout les livres</button>
<br>


<select id="users">
<!-- foreach user -->
<option>1</option>
<option>2</option>
<option>3</option>
</select>
<button id="BTusers" onclick="FetchContentWithId('users')">Voir cet utilisateur</button>
<!-- foreach book -->
<select id="books">
<option>1</option>
<option>2</option>
<option>3</option>
</select>
<button id="BTusers" onclick="FetchContentWithId('books')">Voir ce Livre</button>

<main id='Main'>
</main>