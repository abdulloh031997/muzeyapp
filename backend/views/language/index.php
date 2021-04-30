<?php
$request = Yii::$app->request;
$this->title = Yii::t('template', 'lang');; ?>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th class="text-center" width="150px">ISO Code</th>
                        <th class="text-center" width="100px">Code</th>
                        <th class="text-center" width="100px">RTL</th>
                        <th class="text-center" width="100px">Active</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($languages as $language) : ?>
                        <tr>
                            <td><?= $language['name']; ?></td>
                            <td class="text-center"><?= $language['locale']; ?></td>
                            <td class="text-center"><?= $language['lang_code']; ?></td>
                            <td class="text-center"><?= $language['rtl'] ? 'Yes' : 'No'; ?></td>
                            <td class="text-center">
                                <?php $checkbox_id = 'switch_' . $language['lang_code']; ?>
                                <?php $checked = $language['status'] ? 'checked' : ''; ?>
                                <div class="custom-control custom-switch" dir="ltr">
                                    <input type="checkbox" class="custom-control-input language-switcher" value="<?= $language['id']; ?>" id="<?= $checkbox_id; ?>" <?= $checked; ?>>
                                    <label class="custom-control-label" for="<?= $checkbox_id; ?>"></label>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
$this->registerJs(<<<JS
$(document).ready(function() {
    $(document).on('click', '.language-switcher', function () {
        var id = parseInt($(this).val());
        var checked = $(this).prop('checked');
        
        if (!isNaN(id) && id > 0) {
            $.ajax({
                type: 'POST',
                url: window.location.href,
                data: {
                    ajax: 'update-action',
                    id: id,
                    checked: checked,
                },
                dataType: 'json',
                error: function () {
                    alert(ajax_error_msg);
                },
            });
        }
    });
});
JS
); ?>