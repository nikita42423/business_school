<!-- Страница запись клиента на обучение (для менеджера)|Пручковский -->
<div class="container">
    <div class="container-fluid" style="margin-top:40px">
        <div class="" style="margin-top:100">
            <div class="rounded d-flex justify-content-center">
                <h1>Записи клиента на обучение</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="container-fluid" style="margin-top:40px">
        <div class="" style="margin-top:100">
            <div class="rounded d-flex justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                    <select class="form-select" name="category">
                                        <?php foreach ($category as $row) {?>
                                        <option value="<?=$row['ID_category']?>"><?=$row['name_category']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                    <select class="form-select" name="type">
                                        <?php foreach ($type as $row) {?>
                                        <option value="<?=$row['ID_type']?>"><?=$row['name_type']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                    <select class="form-select" name="form">
                                        <?php foreach ($form as $row) {?>
                                        <option value="<?=$row['ID_form']?>"><?=$row['name_form']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                    <input type="text" class="form-control" name="number" placeholder="Макс. стоимость" required>
                                </div>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Поиск</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="container-fluid" style="margin-top:20px">
        Скрипт для пагинации
        <script>
            $(document).ready(function () {
            $('#record').DataTable();
        });
        </script>

        <table id="record" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Название программы</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Вид</th>
                    <th scope="col">Форма обучения</th>
                    <th scope="col">Вид документа</th>
                    <th scope="col">Преподаватель</th>
                    <th scope="col">Кол-во часов</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($record as $row) {?>
                <tr>
                    <th scope="row"><?=$row['ID_program']?></th>
                    <td><?=$row['name_program']?></td>
                    <td><?=$row['name_category']?></td>
                    <td><?=$row['name_type']?></td>
                    <td><?=$row['name_form']?></td>
                    <td><?=$row['name_doc']?></td>
                    <td><?=$row['full_name_teacher']?></td>
                    <td><?=$row['count_hour']?></td>
                    <td>
                    <form action="<?=base_url('manager/browse_schedule')?>" method="post">
                        <button class="btn btn-primary" name="ID_program" value="<?=$row['ID_program']?>">Выбрать</button>
                    </form>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>

<div class="container">
    <div class="container-fluid" style="margin-top:20px">
        <hr>
        Скрипт для пагинации
        <script>
            $(document).ready(function () {
            $('#teaching').DataTable();
        });
        </script>

        <table id="teaching" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">График курсов</th>
                    <th scope="col">Клиент</th>
                    <th scope="col">Дата начала</th>
                    <th scope="col">Дата конца</th>
                    <th scope="col">Номер документа</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teaching as $row) {?>
                <tr>
                    <th scope="row"><?=$row['ID_teaching']?></th>
                    <td><?=$row['name_program']?></td>
                    <td><?=$row['full_name_client']?></td>
                    <td><?=$row['date_start_t']?></td>
                    <td><?=$row['date_end_t']?></td>
                    <td><?=$row['number_doc']?></td>             
                    <td>

                    <!-- Триггер -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?=$row['ID_teaching']?>" <?php if (!empty($row['date_end_t'])){echo 'disabled';}?>>
                    Отметка об окончания
                    </button>

                    <div class="modal fade" id="<?=$row['ID_teaching']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddLabel1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalAddLabel1">Изменение записи №<?=$row['ID_teaching']?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                </div>
                                <form action="<?=base_url('manager/otm_record')?>" method="post">
                                    <div class="modal-body">
                                        <div class="p-4">

                                            <div class="input-group mb-3">
                                                <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                                <input type="text" class="form-control" name="teaching" required value="<?=$row['ID_teaching']?>">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                                <input type="text" class="form-control" name="number" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                                <input type="date" class="form-control" name="date_end_t" required>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                        <button type="submit" class="btn btn-primary">Добавить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        
                    </td>             
                </tr>
                <?php }?>
            </tbody>
        </table>
        <hr>
    </div>
</div>