<?php
include "../private/php/DbConnecter.php";
$sql = "select Name from Object";
$q = sqlsrv_query($conn, $sql);
while ($row = sqlsrv_fetch_array($q, SQLSRV_FETCH_ASSOC)) {
    $result[] = $row;
}

$sql = "select Name,Rank from Catalog_Priority";
$q = sqlsrv_query($conn, $sql);
while ($row = sqlsrv_fetch_array($q, SQLSRV_FETCH_ASSOC)) {
    $result_rnk[] = $row;
}
?>
<script>
    $(document).ready(function() {

    });
</script>
<style>
    #ticket .row {
        margin-top: 10px;
    }
</style>
<div class="container" id="ticket">
    <h3 style="">Создание заявки</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6 col-sm-12 align-right">
                    <span class="text-black">Наименование объекта</span>
                </div>
                <div class="col-md-6 col-sm-12">
                    <select name="object-name" id="object-name">
                        <?php
                        foreach ($result as &$item) {
                            echo "<option>" . $item['Name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 align-right">
                    <span class="text-black">Приоритет</span>
                </div>
                <div class="col-md-6 col-sm-12">
                    <select name="object-name" id="object-name" data-id="-1">
                        <?php
                        foreach ($result_rnk as &$item) {
                            echo "<option value='{$item['Rank']}'>{$item['Name']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 align-right">
                    <span class="text-black">Описание</span>
                </div>
                <div class="col-md-6 col-sm-12">
                        <textarea name="description" id="description" cols="40" rows="10"></textarea>
                </div>
            </div>
        </div>
    </div>
    <h3 style="">Местоположение</h3>
    <iframe src="https://yandex.ru/map-widget/v1/?ll=37.624513%2C55.748635&z=12" min-width="360" height="400" frameborder="0" allowfullscreen="true" style="width: -webkit-fill-available;"></iframe>
</div>