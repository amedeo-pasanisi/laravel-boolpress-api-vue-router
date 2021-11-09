# consegna laravel-boolpress

## consegna 1
Terminate la parte di CRUD legata all'area amministrativa della nostra applicazione integrando  
- create
- update
- delete
- Introducete le validazioni dei campi visualizzando i possibili errori
- utilizzate il metodo old per non perdere la compilazione dei vostri form
- sul bottone delete con l'ausilio del JS chiedete conferma sull'azione di cancellazione
- gestite le rotte e controller per visualizzare la lista dei post ed il dettaglio nella sezione GUEST

## consegna 2: introduzione delle relazioni per la gestione delle categorie/post
- Creazione tabella categories con migrations e popolazione con seeder
- Update tabella posts per introdurre chiave esterna legata alle categorie
- Model Category
- Gestione del PostController e di tutte le viste interessate dall'introduzione della Categoria
- Gestione della validazione e degli errori
### BONUS:
Creazione index e show per le categorie.  
Nello show visualizzare i post collegati alla categoria (come visto a lezione)

## consegna 3: sviluppo relazioni many to many per la gestione delle tags/post
- Creazione tabella tags con migrations e popolazione con seeder
- Creazione tabella ponte post_tag
- Model Tag
- Gestione del PostController e di tutte le viste interessate dall'introduzione dei tags
- Gestione della validazione e degli errori
### BONUS:
Creazione index e show per i tags. Nello show visualizzare i post collegati al tag