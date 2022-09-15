<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\emailWhitelist\controllers;

use humhub\modules\emailWhitelist\models\Group;
use humhub\modules\user\models\Group as BaseGroup;
use Yii;
use humhub\modules\admin\components\Controller;
use yii\web\HttpException;

/**
 * GroupController provides e-mail mapping for group
 *
 * @author luke
 */
class GroupController extends Controller
{

    /**
     * @var BaseGroup
     */
    public $group;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->group = BaseGroup::findOne(['id' => (int) Yii::$app->request->get('groupId')]);

        if ($this->group === null) {
            throw new HttpException(404, 'Could not load group!');
        }

        $this->subLayout = '@admin/views/layouts/user';
    }

    public function actionIndex()
    {

        $group = Group::findOne(['id' => $this->group->id]);

        if ($group->load(Yii::$app->request->post()) && $group->save()) {
            Yii::$app->getSession()->setFlash('data-saved', Yii::t('EmailWhitelistModule.base', 'Saved'));
        }

        return $this->render('index', [
                    'group' => $group
        ]);
    }

}
