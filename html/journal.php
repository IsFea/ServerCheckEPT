<?php
include "../private/php/DbConnecter.php";

//Получение журнала с информацией по тикетам
$sql = "exec rep_GetTicketListPerEmployee 1";
$q = sqlsrv_query($conn, $sql);
while ($row = sqlsrv_fetch_array($q, SQLSRV_FETCH_ASSOC)) {
    $result[] = $row;
}
$jsonData = json_encode($result);

?>
<script>
    $(document).ready(function() {
        var $table = $('#table');
        var mydata = <?= $jsonData ?>;

        $('#table').bootstrapTable({
            data: mydata,
            formatLoadingMessage: function() {
                return '';
            }
        });
    });
</script>
<style>
    #ticket .row {
        margin-top: 10px;
    }
</style>
<div class="container" id="ticket">
    <h3>Список заявок</h3>
    <!-- <div class="container"> -->
    <table class="table table-striped table-lg" id="table">
        <thead>
            <tr>
                <th data-field="TicketNumber">Номер заявки</th>
                <th data-field="ObjectName">Объект</th>
                <th data-field="description">Описание</th>
                <th data-field="DateTimeCreatedUTC">Дата заявки</th>
                <th data-field="PlanCompletedUTC">Плановый срок</th>
                <th data-field="RankName">Приоритет</th>
                <th data-field="TicketType">Тип заявки</th>
                <th data-field="Author">Автор</th>
                <th data-field="Executor">Исполнитель</th>
            </tr>
        </thead>
    </table>
    <!-- </div> -->
</div>