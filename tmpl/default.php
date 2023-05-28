<?php 
// No direct access
defined('_JEXEC') or die; ?>


<?php
$document = JFactory::getDocument();
$options = array("version" => "auto");
$attributes = array("defer" => "defer");
$document->addScript(JURI::root() . "modules/mod_orlen/orlen.js", $options, $attributes);
$document->addStyleSheet(JURI::root() . "modules/mod_orlen/orlen.css", $options);

?>

<div class="modcurr<?php echo $moduleclass_sfx; ?>">
    <div class="dateorlen">
        Aktualne ceny obowiązujące od dnia <?php echo $data['date']; ?>
    </div>
    <table class="table table_orlen">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Cena [PLN/m<sup>3</sup>]</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>Benzyna bezołowiowa - Eurosuper 95</td>
                <td><?php echo $data['Pb95']; ?></td>
            </tr>

            <tr>
                <td>Benzyna bezołowiowa - Super Plus 98</td>
                <td><?php echo $data['Pb98']; ?></td>
            </tr>

            <tr>
                <td>Olej Napędowy Ekodiesel</td>
                <td><?php echo $data['ONEkodiesel']; ?></td>
            </tr>

            <tr>
                <td>Olej Napędowy Arktyczny 2</td>
                <td><?php echo $data['ONArctic2']; ?></td>
            </tr>

            <tr>
                <td>Olej Napędowy Grzewczy Ekoterm</td>
                <td><?php echo $data['OnEkoterm']; ?></td>
            </tr>

        </tbody>
    </table>
    <div>UWAGA - cena (bez podatku VAT) za paliwo w temperaturze referencyjnej 15°C</div>
</div>