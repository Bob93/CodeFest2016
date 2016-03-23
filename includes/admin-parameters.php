<div class="menu-info">
    <div class="row">
        <div class="col-lg-10">
            <h1>Parameters</h1>

        </div>
    </div>
    <table border="1" style="width:100%">
        <tr>
            <td>Deeltijdfactor</td>
            <td>m</td>
        </tr>
        <tr>
            <td>Aantal dagen voor invoer vrije dag</td>
            <td>g</td>
        </tr>
        <tr>
            <td>Deeltijdfactor vakantie dagen</td>
            <td>s</td>
        </tr>
        <tr>
            <td>Prijs inkoop vrije dag</td>
            <td>d</td>
        </tr>
    </table>
    <br><br>
        <h1>Afdeling</h1>
        <h1 class=""></h1>
        <table border="1" style="width:100%">
            <?php
            $data = json_decode($json_string);
            $columns = array();

            echo "<table><tbody>";
            foreach ($data as $name => $values) {
                echo "<tr><td>$name</td>";
                foreach ($values as $k => $v) {
                    echo "<td>$v</td>";
                    $columns[$k] = $k;
                }
                echo "</tr>";
            }
            echo "</tbody><thead><tr><th>name</th>";
            foreach ($columns as $column) {
                echo "<th>$column</th>";
            }
            echo "</thead></table>"
            ?>

        </table><br>
    <button type="submit" form="form1" value="Submit">Doorsturen</button>

</div>


