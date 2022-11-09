<div class="container2">

    <input id="burger" type="checkbox" />
    <label for="burger">
        <span></span>
        <span></span>
        <span></span>
    </label>
    <nav>
        <h1 class="enigme">Enigmes</h1>
        <ul>
            <?php
            // echo "<script>console.log('PHP: " . $enigmes . "');</script>";
            foreach ($enigmes as $enigme) {
            ?>
                <li><a href="#"><?php echo $enigme['libelle'] ?></a></li>
            <?php
            }
            ?>
            <li><a href="#">Link #1</a></li>
            <li><a href="#">Link #2</a></li>
            <li><a href="#">Link #3</a></li>
        </ul>
    </nav>
</div>




<!--  -->
</div>
<script>
    $(document).ready(function() {
        $(".btnTestFlag").click(function() {
            var idEnigme = $(this).attr("dt-idEnigme");
            swal.fire({
                title: 'Entrez le flag',
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Submit',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    $.ajax({
                        url: "ajax/ajax.php",
                        type: "POST",
                        data: {
                            action: "testFlag",
                            flag: login
                        },
                        success: function(data) {
                            if (data == 'true') {
                                swal.fire({
                                    title: 'Bravo ! ',
                                    text: 'Vous avez trouvé la bonne réponse',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            url: "ajax/ajax.php",
                                            type: "POST",
                                            data: {
                                                action: "addPoint",
                                                idEnigme: idEnigme,
                                                idEquipe: <?php echo $_SESSION['id']; ?>
                                            },
                                            success: function(data) {
                                                console.log('data : ' + data.value);
                                                swal.fire({
                                                    text: 'Vous avez gagné ' + data + ' points',
                                                    html: '<img src="../images/trophyWin.GIF" alt="gif" width="80%" height="90%">',
                                                    confirmButtonText: 'OK',
                                                    background: '#6766A9',
                                                    timer: 5000
                                                })
                                                // reload #tabScore
                                                // $('.enigme' + idEnigme).css('background', 'green');
                                                // window.location.href = "index.php?uc=enigme&action=tabScore";

                                            }
                                        });
                                    }
                                })
                            } else {
                                swal.fire({
                                    title: 'Mauvaise réponse',
                                    text: 'Vous avez trouvé la mauvaise réponse',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                })
                            }
                        }
                    });
                },
                allowOutsideClick: () => !swal.isLoading()
            })
            // })

            // var flag = prompt("Entrer le flag");
            // $.ajax({
            //     url: "ajax/ajax.php",
            //     type: "POST",
            //     data: {
            //         action: "testFlag",
            //         idEnigme: idEnigme,
            //         flag: flag
            //     },
            //     success: function(data) {
            //         console.log(data);
            //     }
            // });
        });
    });
</script>