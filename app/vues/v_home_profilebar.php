<div class="bg-red-500 w-full h-50">
    <p class="text-white lg:text-black lg:underline">aaaaa</p>
    <!-- barre de recherche -->
    <!-- <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Rechercher un joueur">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div> -->

    <div>
        <p class="text-white bg-red-500 block">test</p>
    </div>
    <p class="text-white">equipe : <?php echo $_SESSION['login']; ?></p>
    <button type="button" onclick="window.location.href='index.php?action=tabScore&uc=enigme'">tableau des scores en direct</button>
</div>