<?php
include "../private/php/DbConnecter.php";

//Получение списка объектов
$sql = "select id,Name from Object";
$q = sqlsrv_query($conn, $sql);
while ($row = sqlsrv_fetch_array($q, SQLSRV_FETCH_ASSOC)) {
    $result[] = $row;
}
//Получение списков приоритетов
$sql = "select id,Name from Catalog_Priority";
$q = sqlsrv_query($conn, $sql);
while ($row = sqlsrv_fetch_array($q, SQLSRV_FETCH_ASSOC)) {
    $result_rnk[] = $row;
}
?>
<script>
    $(document).ready(function() {
        //Управление картой, установка маркера
        $('#map-picker').locationpicker({
            location: {
                latitude: 52.963361,
                longitude: 36.064748
            },
            radius: 300,
            inputBinding: {
                latitudeInput: $('#us4-lat'),
                longitudeInput: $('#us4-lon'),
                // radiusInput: $('#us4-radius'),
                locationNameInput: $('#us4-address')
            },
            // mapTypeId: google.maps.MapTypeId.SATELLITE,
            enableAutocomplete: true
        });
        //Создание тикета
        $('#create-ticket').click(function() {
            $.ajax({
                    method: "POST",
                    url: "../ServerSide/addTicket.php",
                    data: {
                        lat: $('#us4-lat').val(),
                        lon: $('#us4-lon').val(),
                        objectId: $('#object-name').val(),
                        priority: $('#priority').val(),
                        userId: 1,
                        description: $('#description').val()
                    }

                }).done(function(data) {
                    // $(this).addClass("done");
                    console.log('Answer addTicket.php: ',data);
                    $('#body').remove();
                }).fail(function() {
                    console.error("Error addTicket.php");
                })
                .always(function() {
                    console.info("Sending data to addTicket.php");
                });
        });
    });
</script>
<style>
    #ticket .row {
        margin-top: 10px;
    }
</style>
<div class="container" id="ticket">
    <h3>Создание заявки</h3>
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
                            echo "<option value='{$item['id']}'>" . $item['Name'] . "</option>";
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
                    <select name="priority" id="priority" data-id="-1">
                        <?php
                        foreach ($result_rnk as &$item) {
                            echo "<option value='{$item['id']}'>{$item['Name']}</option>";
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
    <br>
    <span class="text-black">Адресс: </span>
    <input type="text" class="form-control pac-target-input" id="us4-address" placeholder="Введите местоположение" autocomplete="on">
    <br>
    <!-- <iframe src="https://yandex.ru/map-widget/v1/?ll=37.624513%2C55.748635&z=12" min-width="360" height="400" frameborder="0" allowfullscreen="true" style="width: -webkit-fill-available;"></iframe> -->
    <div id="map-picker" style="width: 500px; height: 400px; width: -webkit-fill-available;"></div>

    <div class="row">
        <input type="text" class="form-control" style="width: 110px;" id="us4-lat" disabled>
        <input type="text" class="form-control" style="width: 110px" id="us4-lon" disabled>
    </div>
    <div class="row"><input type="button" class="form-control btn-primary" id="create-ticket" value="Создать"></div>
</div>