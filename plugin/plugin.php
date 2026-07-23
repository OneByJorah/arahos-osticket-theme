<?php
/**
 * ARAHOST Help Desk Theme — osTicket plugin manifest.
 *
 * Returned array is parsed by osTicket's PluginManager (include/class.plugin.php).
 * The "plugin" key format is "file.php:ClassName" — osTicket includes file.php
 * from the plugin root and instantiates ClassName.
 */
return array(
    'name'        => 'ARAHOST Help Desk Theme',
    'version'     => '1.0.0',
    'plugin'      => 'arahos-theme.php:ArahosOSTicketTheme',
    'author'      => 'Virgin Islands Department of Education — Office of Information Technology',
    'description' => 'Applies the Arahos navy & gold branding to the osTicket '
                    . 'client support portal and the staff (agent) control panel.',
    'ost_version' => '1.18',
);
