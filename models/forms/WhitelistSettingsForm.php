<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\emailWhitelist\models\forms;

use Yii;
use yii\base\Model;

/**
 * WhitelistSettingsForm used to define a email whitelist for restricting allowed
 * emails for invitations and registration.
 *
 * @author buddha
 */
class WhitelistSettingsForm extends Model
{
    /**
     * New line seperated list of emails
     * @var type 
     */
    public $whitelist;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [['whitelist', 'trim']];
    }
    
    public function attributeHints()
    {
        return ['whitelist' => Yii::t('EmailWhitelistModule.base', 'Separate multiple whitelist rules by a new line.')];
    }
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->whitelist = Yii::$app->getModule('email-whitelist')->settings->get('email.whitelist');
    }
    
    /**
     * Saves the whitelist settings
     * @return boolean
     */
    public function save() 
    {
        Yii::$app->getModule('email-whitelist')->settings->set('email.whitelist', $this->whitelist);
        return true;
    }
}
