<div style="width:100%;background-color:#f8f8f8;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
    <div style="padding:10px 10px 10px 10px;">
        <p id="minuteur"></p>
    </div>
</div>


</div>
<table style="margin-right:auto;margin-left:auto;background-color:white;height:100%; width:100%;margin-right:auto;margin-left:auto">
    <thead>
        <tr style="background-color:blue;border: 2px solid black">
            <td>position</td>
            <td>equipe</td>
            <td>score</td>
        </tr>
    </thead>
    <tbody class="tabScore">
        <script>
            // $.ajax({
            // type: "GET",
            // url: "ajax/ajax.php",
            // data: "action=tabScore",
            // dataType: "html",
            // success: function(response) {
            //     $('#tabScore').empty();
            //     $('#tabScore').append(response);
            // }

            // chaque seconde on rafraichit le tableau
            setInterval(function() {
                $.ajax({
                    type: "GET",
                    url: "ajax/ajax.php",
                    data: "action=tabScore",
                    dataType: "json",
                    success: function(response) {
                        console.log(response.minuteur.time);
                        $('#minuteur').empty();
                        $('#minuteur').append(response.minuteur.time);

                        $('.tabScore').empty();
                        var body = '';
                        for (var i = 0; i < response.partie.length; i++) {
                            var color = 'white';
                            if (i == 0) {
                                var color = '#70c17b';
                            } else if (i == 1) {
                                var color = '#f2e783';
                            } else if (i == 2) {
                                var color = '#fecb7e';
                            }
                            body += '<tr style="background-color:' + color + '" >';
                            body += '<td > #' + (i + 1) + '</td>';
                            body += '<td>' + response.partie[i].libelle + '</td>';
                            body += '<td>' + response.partie[i].score + '</td>';
                            body += '</tr>';
                        }
                        $('.tabScore').append(body);
                        $('.tabScore tr').css('border', '2px solid black');
                        $('.tabScore tr').css('border', '2px solid black');
                        // $('.tabScore').append(response);
                    }
                });
            }, 1000);
        </script>
    </tbody>
</table>