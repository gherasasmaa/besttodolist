<!-- description : script JQuery pour trier le tableau des tâches selon les catégories -->

<script>
    /**
        * la fonction sortByProperty permet de trier les données selon les champs du tableau : id, titles, categoty.
        * l'ordre de tri est croissant.
        * elle est utilisé dans le cas de "categroy" dans ce fichier, les autres champs pourront être ajoutés plus tard.
     */
    function sortByProperty(property){  
        return function(a,b){  
            if(a[property] > b[property])  
                return 1;  
            else if(a[property] < b[property])  
                return -1;  
        
            return 0;  
        }  
    }

    /**
        * cette fonction permet d'afficher un texte vide au lieu de "null".
        * cette fonction est utilisée pour afficher les valeurs du tableau trié selon les catégories.
     */
    function valeur(variable) {
            return (variable != null) ? variable : '';
    }

    /**
        * JQuery : lorsque l'utilisateur clique sur category
        * les données sont récupérées
        * les données sont triées
        * category est coloré en vert
        * le html de <tbody> est mis à jour.
    */
    $('#category').click(function() {
         /**
        * taskJson : la variable récupére les données à partir de la blade sous forme de données Json
        * task : les données Json sont converties en un tableau afin de trier ce tableau facilement. si les données sont
        * sont massives, il faudra coder un algorithme plus performant.
        */
        var tasksJson = @json($tasks);
        var tasksLength = Object.keys(tasksJson).length;
        var tasks = [];
        // boucle qui transforme les données Json en tableau, ce n'est pas la meilleure idée, mais c'est facile à coder.
        for (var i=0; i<tasksLength; i++) {
            tasks.push(tasksJson[i]);
        }

        tasks = tasks.sort(sortByProperty("category"));
        $(this).css('color', 'green');
        $('tbody').html('');
        for (var i=0; i<tasksLength; i++) {
            var row =
                '<tr>'+
                    '<td>'+valeur(tasks[i].title)+'</td>'+
                    '<td>'+valeur(tasks[i].category)+'</td>'+
                    '<td>'+valeur(tasks[i].description)+'</td>'+
                    '<td><a href="/task/'+tasks[i].id+'">show</a></td>'+
                '</tr>';
            $("tbody").append(row);
            
        }
    });

</script>