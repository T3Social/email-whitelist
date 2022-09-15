<?php

/** @noinspection MissedFieldInspection */

use humhub\components\ActiveRecord;
use humhub\modules\ui\menu\widgets\Menu;

return [
    'id' => 'email-whitelist',
    'class' => 'humhub\modules\emailWhitelist\Module',
    'namespace' => 'humhub\modules\emailWhitelist',
    'events' => [
        ['humhub\modules\user\models\forms\Registration', 'beforeValidate', ['humhub\modules\emailWhitelist\Events', 'onRegistrationBeforeValidate']],
        ['humhub\modules\user\models\Invite', ActiveRecord::EVENT_BEFORE_VALIDATE, ['humhub\modules\emailWhitelist\Events', 'onInviteBeforeValidate']],
        ['humhub\modules\user\models\forms\Invite', ActiveRecord::EVENT_BEFORE_VALIDATE, ['humhub\modules\emailWhitelist\Events', 'onInviteFormBeforeValidate']],
        ['humhub\modules\space\models\forms\InviteForm', ActiveRecord::EVENT_BEFORE_VALIDATE, ['humhub\modules\emailWhitelist\Events', 'onInviteFormBeforeValidate']],
        ['humhub\modules\admin\widgets\AuthenticationMenu', Menu::EVENT_INIT, ['humhub\modules\emailWhitelist\Events', 'onAuthenticationMenuInit']],
        ['humhub\modules\admin\widgets\UserMenu', Menu::EVENT_RUN, ['humhub\modules\emailWhitelist\Events', 'onAdminUserMenuInit']],
        ['humhub\modules\admin\widgets\GroupManagerMenu', Menu::EVENT_INIT, ['humhub\modules\emailWhitelist\Events', 'onAdminGroupMenuInit']],
        ['humhub\modules\user\models\User', \yii\db\ActiveRecord::EVENT_AFTER_INSERT, ['humhub\modules\emailWhitelist\Events', 'onUserInsert']],
    ]
];
?>