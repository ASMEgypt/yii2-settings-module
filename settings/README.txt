���������:

������� ����� modules � ����� ���������� � ��������� ���� ����� "settings".
� ����� config/web.php ��������� ���������:

$config = [
    'components' => [
		...........
		'settings' => ['class' => 'app\modules\settings\components\Settings'], // ��� ������� � ����������
    ],
	
	// ��� ������� �� ������� �������������� ��������
	'modules' => [
		...........
		'settings' => [
			'class' => 'app\modules\settings\Module',
			// �������������� ���������
			'password' => '123', // ������ ��� � ����� �� �������� �������������� ��������. �� ��������� 123, ���� ������� ������, �� ���� ��� �����������
			'password_in_settings' => false, // ���� ������� true, �� ����� � ��������� ������ � ���������� (settings.json), � �� � web.config-�����.
			'allowedIPs' => ['127.0.0.1', '::1'], // ������ �� IP-�������
		],
	],
];

// ��� ���:
$config['components']['settings']['class'] = 'app\modules\settings\components\Settings'; // ��� ������� � ����������
$config['modules']['settings']['class']    = 'app\modules\settings\Module';              // ��� ������� �� ������� �������������� ��������


����� ��� ����� � ���������:
http://localhost/index.php?r=settings
������: 123

��� ��� ���������, ��������� � ����� settings/settings.json


������ ������� � ����������:
$db = Yii::$app->settings->param['db'];

� ���������� $db ����� value, label, description ���������.
������� ������ name (���� ���������) � �������� value (��������� ���������).
�.�., ���� � settiings.json ����:
{
	"db": {
		"value": {
			"connectionString": "sqlite:..\/..\/application\/data\/database.s3db",
			"username": "",
			"password": "",
			"tablePrefix": "",
			"class": "yii\\db\\Connection"
		},
		"label": "��������� ����������� � ���� ������.",
		"description": ""
	},
}
�� $db ����� �����:
[
	'connectionString' => 'sqlite:..\/..\/application\/data\/database.s3db',
	'username'         => '',
	'password'         => '',
	'tablePrefix'      => '',
	'class'            => 'yii\db\Connection',
]



��� ����� ������ ���������:

use app\modules\settings\models\SettingsModel;

$setting_name = 'db';
$data = [
	'SettingsModel' => [
		'value' => [
			'connectionString' => 'sqlite:..\/..\/application\/data\/database.s3db',
			'username'         => '',
			'password'         => '',
			'tablePrefix'      => '',
			'class'            => 'yii\db\Connection',
		],
	],
];
$model = SettingsModel::getModel($setting_name);
$model->setAttrAndSave($data);