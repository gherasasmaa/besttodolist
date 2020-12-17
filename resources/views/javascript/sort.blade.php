<script>
    function sortByProperty(property){  
        return function(a,b){  
            if(a[property] > b[property])  
                return 1;  
            else if(a[property] < b[property])  
                return -1;  
        
            return 0;  
        }  
    }

    function valeur(variable) {
            return (variable != null) ? variable : '';
    }

    var tasksJson = @json($tasks);
    var tasksLength = Object.keys(tasksJson).length;
    var tasks = [];
    for (var i=0; i<tasksLength; i++) {
        tasks.push(tasksJson[i]);
    }
    $('#category').click(function() {
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