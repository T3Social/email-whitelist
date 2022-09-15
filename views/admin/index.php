<?php

use humhub\modules\ui\form\widgets\ActiveForm;
use humhub\libs\Html;

/* @var $model humhub\modules\emailWhitelist\models\forms\WhitelistSettingsForm */
?>

<?php $this->beginContent('@admin/views/authentication/_authenticationLayout.php'); ?>
    <div class="panel-body">
        <div class="help-block">
            <?php if (Yii::$app->getModule('user')->settings->get('auth.needApproval')): ?>
                <?= Yii::t('EmailWhitelistModule.base', 'The email whitelist allows you to specify email rules for users who don\'t need to be approved after registration.'); ?>
            <?php else: ?>
                <?= Yii::t('EmailWhitelistModule.base', 'The email whitelist allows you to specify email rules for restricting allowed email adresses for user registration and invites.'); ?>
            <?php endif; ?>
            <br/>
            <?= Yii::t('EmailWhitelistModule.base', 'A whitelist rule can either be in the form <strong>@example.com</strong> to allow each email of the given host or a complete address as <strong>user@example.com</strong>'); ?>
        </div>
        <?php $form = ActiveForm::begin(['id' => 'whitelist-settings-form']); ?>
        <?= $form->field($model, 'whitelist')->textarea(['id' => 'whitelist-settings-form-whitelist', 'rows' => 12])->label(false); ?>
        <?= Html::submitButton(Yii::t('base', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => ""]); ?>
        <?php ActiveForm::end(); ?>
    </div>
    <script type="text/javascript">
        $('#whitelist-settings-form-whitelist').autosize();
    </script>
<?php $this->endContent(); ?>