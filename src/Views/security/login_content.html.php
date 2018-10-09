<?php return ?><section>

    <form action="" method="POST" class="form-signin" >
    <div class="container" style="width: 25%;">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <div class="row">
            <div class="col-md-12">
                <label>Pseudo</label>
                <input type="text" class="form-control" name="_pseudo" placeholder="Saisir Pseudonyme"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Identifiant</label>
                <input type="password" class="form-control" name="_password" placeholder="Saisir mot de passe"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br />
                <input type="submit"  class="btn btn-lg btn-primary btn-block" value="Connexion"/>
            </div>
        </div>
    </div>
    </form>
</section>
<?php ; ?>