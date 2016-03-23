<div class="row">
        <div class="col-lg-12">
            <h1>Overzicht</h1>

        </div>
    </div>
    <div class="menu-info">
        <div class="form-group">
            <h1>Hallo <?php echo $_SESSION['voornaam'] . ' ' . $_SESSION['tussenvoegsel'] . $_SESSION['achternaam']; ?>!</h1>
</div>

        <h2>Periode</h2><br>

        <div class="form-group">
Van datum <input type="date" name="Van-Datum" id="Van-Datum1" tabindex="1" class="form-control" placeholder="Van" value="">
        </div>
        <div class="form-group">
Tot datum <input type="date" name="Tot-Datum" id="Tot-Datum1" tabindex="2" class="form-control" placeholder="Tot" value="">
        </div>

    </div>