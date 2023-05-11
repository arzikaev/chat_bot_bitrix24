<?php
require_once(__DIR__ . '/crest.php');
//CRest::writeToLog($_REQUEST, 'Request install');

$result = CRest::installApp();
print_r($result);

$admin = CRest::call('profile', ['auth' => $_REQUEST['AUTH_ID']], $_REQUEST['DOMAIN']);
$user = CRest::call('user.current', ['auth' => $_REQUEST['AUTH_ID']], $_REQUEST['DOMAIN']);
//CRest::writeToLog($admin, 'admin');
//CRest::writeToLog($user, 'user');
$userToData = [
    'STATUS' => 'true',
    'ADMINNAME' => $user['result']['LAST_NAME'] . '_' . $user['result']['NAME'],
    'ADMINEMAIL' => $user['result']['EMAIL'],
    'ADMINPHONE' => $user['result']['WORK_PHONE']
];
CRest::updateAppSettings($_REQUEST['DOMAIN'] ,$userToData);
if($result['rest_only'] === false):?>
    <head>
        <script src="//api.bitrix24.com/api/v1/"></script>
        <?php if ($result['install'] == true): ?>
            <script>
                BX24.init(async function () {
                    BX24.installFinish();
                });
            </script>
        <?php endif; ?>
    </head>
    <body>
    <?php if($result['install'] == true):?>
        installation has been finished
    <?php else:?>
        installation error
    <?php endif;?>
    </body>
<?php endif;