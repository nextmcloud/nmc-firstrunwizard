<?php
/**
 * @copyright Copyright (c) 2016, Joas Schilling <coding@schilljs.com>
 *
 * @author Joas Schilling <coding@schilljs.com>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\NmcFirstRunWizard\Tests\AppInfo;


use OCA\NmcFirstRunWizard\AppInfo\Application;
use OCA\NmcFirstRunWizard\Controller\WizardController;
use OCA\NmcFirstRunWizard\Notification\BackgroundJob;
use OCA\NmcFirstRunWizard\Notification\Notifier;
use OCP\AppFramework\App;
use OCP\AppFramework\Controller;
use OCP\BackgroundJob\IJob;
use OCP\Notification\IManager;
use OCP\Notification\INotifier;
use Test\TestCase;

/**
 * Class ApplicationTest
 *
 * @package OCA\NmcFirstRunWizard\Tests\AppInfo
 * @group DB
 */
class ApplicationTest extends TestCase {
	/** @var \OCA\NmcFirstRunWizard\AppInfo\Application */
	protected $app;

	/** @var \OCP\AppFramework\IAppContainer */
	protected $container;

	public function testContainerAppName() {
		$app = new Application();
		$this->assertEquals('nmc-firstrunwizard', $app->getContainer()->getAppName());
	}

	public function dataContainerQuery() {
		return [
			[Application::class, Application::class],
			[Application::class, App::class],

			[WizardController::class, WizardController::class],
			[WizardController::class, Controller::class],

			[Notifier::class, Notifier::class],
			[Notifier::class, INotifier::class],

			[BackgroundJob::class, BackgroundJob::class],
			[BackgroundJob::class, IJob::class],
		];
	}

	/**
	 * @dataProvider dataContainerQuery
	 * @param string $service
	 * @param string $expected
	 */
	public function testContainerQuery($service, $expected) {
		$app = new Application();
		$this->assertInstanceOf($expected, $app->getContainer()->query($service));
	}
}
