<?php
/**
 * 
 * @author Сидорович Николай <sidorovich21101986@mail.ru>
 * @link https://github.com/alhimik1986
 * @copyright Copyright (c) 2016 alhimik1986
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace alhimik1986\yii2_settings_module\components;

use alhimik1986\yii2_settings_module\models\SettingsModel;

class Settings extends \yii\base\Component
{
	/**
	 * Параметры настройки.
	 */
	public $param;


	public function __construct()
	{
		$this->param = $this->getAllSettings();
	}

	protected function getAllSettings()
	{
		$settings = SettingsModel::getSettings();
		if (is_array($settings)) foreach($settings as $key=>$value)
			$settings[$key] = $value['value'];
		
		return $settings;
	}

	public function get($name)
	{
		return SettingsModel::getSetting($name);
	}

	public function set($name, $value)
	{
		$result = SettingsModel::setSetting($name, $value);
		$this->param = $this->getAllSettings();
		return $result;
	}

	public function getAll()
	{
		return $this->getAllSettings();
	}
}