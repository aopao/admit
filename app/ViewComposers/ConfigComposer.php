<?php
/**
 * 网站所有配置字段共享变量传递到模板中
 */

namespace App\ViewComposers;

use App\Repositories\ConfigRepository;
use Cache;
use Illuminate\View\View;
use App\Repositories\SettingRepository;

/**
 * Class SeetingComposer
 * @package App\ViewComposers
 */
class ConfigComposer
{
	/**
	 * @var SettingRepository
	 */
	public $config;

	/**
	 * SeetingComposer constructor.
	 * @param $configRepository $configRepository
	 */
	public function __construct(ConfigRepository $configRepository)
	{
		$this->config = $configRepository;
	}

	/**
	 * @param View $view
	 */
	public function compose(View $view)
	{
		$view->with('config' , $this->changeToArray());
	}

	/**
	 * @return array|mixed
	 */
	public function changeToArray()
	{
		if (Cache::get('config')) {
			return Cache::get('config');
		} else {
			$data = $this->config->getAll()->toArray();
			$info = [];
			foreach ($data as $value) {
				$info[ $value[ 'key' ] ] = $value[ 'value' ];
			}
			Cache::forever('config' , $info);
			return $info;
		}
	}
}