<?php

namespace humhub\modules\emailWhitelist\models;

use humhub\modules\user\models\Group as BaseGroup;
use Yii;

/**
 * Group model extensions for e-mail mapping
 *
 * @author Luke
 */
class Group extends BaseGroup
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['enterprise_email_map', 'string'];
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['editEmailMap'] = ['enterprise_email_map'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'enterprise_email_map' => Yii::t('EmailWhitelistModule.base', 'E-Mails'),
        ];
    }

    public function attributeHints()
    {
        return ['enterprise_email_map' => Yii::t('EmailWhitelistModule.base', 'Separate multiple rules by a new line.')];
    }

}
