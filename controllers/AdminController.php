<?php

namespace humhub\modules\emailWhitelist\controllers;

use Yii;
use humhub\modules\admin\components\Controller;
use \humhub\modules\emailWhitelist\models\forms\WhitelistSettingsForm;

/**
 * Whitelist AdminController. Used to define the email whitelist setting, which
 * can restrict allowed emails for invitations and registrations.
 *
 * @author buddha
 */
class AdminController extends Controller
{
    /**
     * Index email whitelist admin action.
     * @return string
     */
    public function actionIndex()
    {
        $form = new WhitelistSettingsForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate() && $form->save()) {
            $this->view->saved();
            return $this->redirect(['/email-whitelist/admin/index']);
        }

        $this->subLayout = '@admin/views/layouts/user';
        return $this->render('index', ['model' => $form]);
    }

}