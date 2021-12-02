<?php
/**
 * @copyright Copyright (c) 2017 Arthur Schiwon <blizzz@arthur-schiwon.de>
 *
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
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

/** @var \OCP\Defaults $theme */
/** @var array $_ */
style('nmc-firstrunwizard', ['personalsettings']);
script('nmc-firstrunwizard', ['personalsettings']);
?>
<div class="devices-session">
<div id="clientsbox" class="clientsbox">
	<h2><?php p($l->t('Mobile applications'));?></h2>
	<div class="clientslinks">
		<a href="" rel="noreferrer noopener" target="_blank">
			<img src="<?php print_unescaped(image_path('apps', 'iOS.svg')); ?>"
				 alt="<?php p($l->t('iOS app'));?>" />
		</a>
		<a href="https://app.adjust.com/r4e1yl" rel="noreferrer noopener" target="_blank">
			<img src="<?php print_unescaped(image_path('apps', 'Google-Play-Store.svg')); ?>"
				 alt="<?php p($l->t('Android app'));?>" />
		</a>
	</div>
	<h2><?php p($l->t('Desktop clients'));?></h2>
	<div id="clientslinks">
		<a href="https://static.magentacloud.de/software/MagentaCLOUD.dmg" rel="noreferrer noopener" target="_blank">
			<img src="<?php print_unescaped(image_path('apps', 'MacOS.svg')); ?>"
				 alt="<?php p($l->t('mac os'));?>" />
		</a>
		<a href="https://static.magentacloud.de/software/MagentaCLOUD.exe" rel="noreferrer noopener" target="_blank">
			<img src="<?php print_unescaped(image_path('apps', 'WinOS.svg')); ?>"
				 alt="<?php p($l->t('Desktop client'));?>"/>
		</a>
	</div>
	<?php
		$appPasswordUrl = \OC::$server->getURLGenerator()->linkToRoute('settings.PersonalSettings.index', ['section' => 'security']);
		$macOSProfile = \OCP\Util::linkToRemote('dav') . 'provisioning/apple-provisioning.mobileconfig';
		$usesTLS = \OC::$server->getRequest()->getServerProtocol() === 'https';
	?>
</div>

<div id="webdav-address" class="clientsbox">
<h2><?php p($l->t('WebDAV Address'));?></h2>
<em><?php p($l->t('With the WebDAV address, you can set up your MagentaCLOUD as a network drive on Windows, for example. You can find more information about WebDAV and how to use it '))?><a href="https://cloud.telekom-dienste.de/hilfe#einrichten" target="_blank" rel="noreferrer noopener"><span><?php p($l->t('here.'));?></span></a></em>
<div id="webdav-url">
<input id="endpoint-url" type="text" value="https://magentacloud.de/remote.php/webdav" readonly />
<a class="button clipboardButton icon-clippy" data-clipboard-target="#endpoint-url"></a>
</div>
</div>
</div>
