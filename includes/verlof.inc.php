
<div class="row">
        <div class="col-lg-12">
            <h1>Welkom <?php echo $_SESSION['voornaam']; ?>!</h1>

        </div>
    </div>
    <div class="menu-info">
        <div class="form-group">

</div>

        <h3>Periode</h3><br>

        <form class="form-group" action="verlofaanvraag.php" method="post" role="form">
            Type Verlof:<br/>
            <select name="type_Verlof">
                <option value="Vakantie">Vakantie</option>
                <option value="Ziekte">Ziekte</option>
                <option value="Bijzonder verlof">Bijzonder Verlof</option>
            </select><br/>
            Van Datum:
            <input type="date" name="vandatum" id="Van-Datum1" tabindex="1" class="form-control" placeholder="Van" value="" required>
            Tot Datum:
            <input type="date" name="totdatum" id="Tot-Datum1" tabindex="2" class="form-control" placeholder="Tot" value="" required>
           <button type="submit" value="Submit">Submitje</button>
        </form>

        <form action="uitloggen.php" method="get">
        <button type="submit">Uitloggen</button>
        </form>
    </div>