<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'CreateActivationsTable' => $baseDir . '/src/Migrations/2018_02_22_100056_create_activations_table.php',
    'CreatePersistencesTable' => $baseDir . '/src/Migrations/2018_02_22_103113_create_persistences_table.php',
    'CreateRemindersTable' => $baseDir . '/src/Migrations/2018_02_22_103444_create_reminders_table.php',
    'CreateRevisions' => $baseDir . '/src/Migrations/2018_02_22_141402_create_revisions.php',
    'CreateRoleUsersTable' => $baseDir . '/src/Migrations/2018_02_22_095823_create_role_users_table.php',
    'CreateRolesTable' => $baseDir . '/src/Migrations/2018_02_22_094422_create_roles_table.php',
    'CreateSettingSelectTable' => $baseDir . '/src/Migrations/2018_02_22_104132_create_setting_select_table.php',
    'CreateSettingsTable' => $baseDir . '/src/Migrations/2018_02_22_103844_create_settings_table.php',
    'CreateTbTreeTable' => $baseDir . '/src/Migrations/2018_02_22_104452_create_tb_tree_table.php',
    'CreateThrottleTable' => $baseDir . '/src/Migrations/2018_02_22_105621_create_throttle_table.php',
    'CreateTranslationsCmsTable' => $baseDir . '/src/Migrations/2018_02_22_110107_create_translations_cms_table.php',
    'CreateTranslationsPhrasesCmsTable' => $baseDir . '/src/Migrations/2018_02_22_105933_create_translations_phrases_cms_table.php',
    'CreateUsersTable' => $baseDir . '/src/Migrations/2018_02_22_093849_create_users_table.php',
    'Vis\\Builder\\AdminSeeder' => $baseDir . '/src/Seeds/AdminSeeder.php',
    'Vis\\Builder\\Authenticate' => $baseDir . '/src/Http/Middleware/Authenticate.php',
    'Vis\\Builder\\AuthenticateFrontend' => $baseDir . '/src/Http/Middleware/AuthenticateFrontend.php',
    'Vis\\Builder\\ChangeRangeController' => $baseDir . '/src/Http/Controllers/ChangeRangeController.php',
    'Vis\\Builder\\ControllersNew\\TreeController' => $baseDir . '/src/Http/ControllersNew/TreeController.php',
    'Vis\\Builder\\CreateConfig' => $baseDir . '/src/Console/CreateConfig.php',
    'Vis\\Builder\\CreateImgWebp' => $baseDir . '/src/Console/CreateImgWebp.php',
    'Vis\\Builder\\DashboardController' => $baseDir . '/src/Http/Controllers/DashboardController.php',
    'Vis\\Builder\\Definitions\\BaseTree' => $baseDir . '/src/Http/Definitions/BaseTree.php',
    'Vis\\Builder\\Definitions\\Resource' => $baseDir . '/src/Http/Definitions/Resource.php',
    'Vis\\Builder\\Definitions\\ResourceAdditionTree' => $baseDir . '/src/Http/Definitions/ResourceAdditionTree.php',
    'Vis\\Builder\\Definitions\\ResourceTree' => $baseDir . '/src/Http/Definitions/ResourceTree.php',
    'Vis\\Builder\\EditorController' => $baseDir . '/src/Http/Controllers/EditorController.php',
    'Vis\\Builder\\Event' => $baseDir . '/src/Models/Event.php',
    'Vis\\Builder\\Fields\\Checkbox' => $baseDir . '/src/Http/Fields/Checkbox.php',
    'Vis\\Builder\\Fields\\Color' => $baseDir . '/src/Http/Fields/Color.php',
    'Vis\\Builder\\Fields\\Date' => $baseDir . '/src/Http/Fields/Date.php',
    'Vis\\Builder\\Fields\\Datetime' => $baseDir . '/src/Http/Fields/Datetime.php',
    'Vis\\Builder\\Fields\\Definition' => $baseDir . '/src/Http/Fields/Definition.php',
    'Vis\\Builder\\Fields\\Field' => $baseDir . '/src/Http/Fields/Field.php',
    'Vis\\Builder\\Fields\\File' => $baseDir . '/src/Http/Fields/File.php',
    'Vis\\Builder\\Fields\\Foreign' => $baseDir . '/src/Http/Fields/Foreign.php',
    'Vis\\Builder\\Fields\\ForeignAjax' => $baseDir . '/src/Http/Fields/ForeignAjax.php',
    'Vis\\Builder\\Fields\\Froala' => $baseDir . '/src/Http/Fields/Froala.php',
    'Vis\\Builder\\Fields\\Hidden' => $baseDir . '/src/Http/Fields/Hidden.php',
    'Vis\\Builder\\Fields\\Id' => $baseDir . '/src/Http/Fields/Id.php',
    'Vis\\Builder\\Fields\\Image' => $baseDir . '/src/Http/Fields/Image.php',
    'Vis\\Builder\\Fields\\ManyToMany' => $baseDir . '/src/Http/Fields/ManyToMany.php',
    'Vis\\Builder\\Fields\\ManyToManyAjax' => $baseDir . '/src/Http/Fields/ManyToManyAjax.php',
    'Vis\\Builder\\Fields\\MultiFile' => $baseDir . '/src/Http/Fields/MultiFile.php',
    'Vis\\Builder\\Fields\\MultiImage' => $baseDir . '/src/Http/Fields/MultiImage.php',
    'Vis\\Builder\\Fields\\Number' => $baseDir . '/src/Http/Fields/Number.php',
    'Vis\\Builder\\Fields\\Password' => $baseDir . '/src/Http/Fields/Password.php',
    'Vis\\Builder\\Fields\\Permissions' => $baseDir . '/src/Http/Fields/Permissions.php',
    'Vis\\Builder\\Fields\\Readonly' => $baseDir . '/src/Http/Fields/Readonly.php',
    'Vis\\Builder\\Fields\\Relations\\Options' => $baseDir . '/src/Http/Fields/Relations/Options.php',
    'Vis\\Builder\\Fields\\Select' => $baseDir . '/src/Http/Fields/Select.php',
    'Vis\\Builder\\Fields\\SelectWithPicture' => $baseDir . '/src/Http/Fields/SelectWithPicture.php',
    'Vis\\Builder\\Fields\\Text' => $baseDir . '/src/Http/Fields/Text.php',
    'Vis\\Builder\\Fields\\Textarea' => $baseDir . '/src/Http/Fields/Textarea.php',
    'Vis\\Builder\\GeneratePassword' => $baseDir . '/src/Console/GeneratePassword.php',
    'Vis\\Builder\\Group' => $baseDir . '/src/Models/Group.php',
    'Vis\\Builder\\Helpers\\Traits\\ImagesTrait' => $baseDir . '/src/Http/Traits/ImagesTrait.php',
    'Vis\\Builder\\Helpers\\Traits\\Query\\Builder' => $baseDir . '/src/Http/Traits/Query/Builder.php',
    'Vis\\Builder\\Helpers\\Traits\\QuickEditTrait' => $baseDir . '/src/Http/Traits/QuickEditTrait.php',
    'Vis\\Builder\\Helpers\\Traits\\Rememberable' => $baseDir . '/src/Http/Traits/Rememberable.php',
    'Vis\\Builder\\Helpers\\Traits\\SeoTrait' => $baseDir . '/src/Http/Traits/SeoTrait.php',
    'Vis\\Builder\\Helpers\\Traits\\TranslateTrait' => $baseDir . '/src/Http/Traits/TranslateTrait.php',
    'Vis\\Builder\\Helpers\\Traits\\ViewPageTrait' => $baseDir . '/src/Http/Traits/ViewPageTrait.php',
    'Vis\\Builder\\Helpers\\Traits\\ViewedTrait' => $baseDir . '/src/Http/Traits/ViewedTrait.php',
    'Vis\\Builder\\Helpers\\URLify' => $baseDir . '/src/libs/URLify.php',
    'Vis\\Builder\\Img' => $baseDir . '/src/libs/Img.php',
    'Vis\\Builder\\InstallCommand' => $baseDir . '/src/Console/InstallCommand.php',
    'Vis\\Builder\\Libs\\LaravelLogViewer' => $baseDir . '/src/libs/LaravelLogViewer.php',
    'Vis\\Builder\\LocalizationMiddlewareRedirect' => $baseDir . '/src/Http/Middleware/LocalizationMiddlewareRedirect.php',
    'Vis\\Builder\\LogViewerController' => $baseDir . '/src/Http/Controllers/LogViewerController.php',
    'Vis\\Builder\\LoginController' => $baseDir . '/src/Http/Controllers/LoginController.php',
    'Vis\\Builder\\OptmizationImg' => $baseDir . '/src/libs/OptmizationImg.php',
    'Vis\\Builder\\Revision' => $baseDir . '/src/Models/Revision.php',
    'Vis\\Builder\\Services\\Actions' => $baseDir . '/src/Http/Services/Actions.php',
    'Vis\\Builder\\Services\\Listing' => $baseDir . '/src/Http/Services/Listing.php',
    'Vis\\Builder\\Services\\Revisions' => $baseDir . '/src/Http/Services/Revisions.php',
    'Vis\\Builder\\Setting' => $baseDir . '/src/Models/Setting.php',
    'Vis\\Builder\\SettingSelect' => $baseDir . '/src/Models/SettingSelect.php',
    'Vis\\Builder\\Setting\\AdminBase' => $baseDir . '/src/Settings/AdminBase.php',
    'Vis\\Builder\\Setting\\Login' => $baseDir . '/src/Settings/Login.php',
    'Vis\\Builder\\SettingsController' => $baseDir . '/src/Http/Controllers/SettingsController.php',
    'Vis\\Builder\\TBController' => $baseDir . '/src/Http/Controllers/TBController.php',
    'Vis\\Builder\\TableAdminController' => $baseDir . '/src/Http/Controllers/TableAdminController.php',
    'Vis\\Builder\\Tree' => $baseDir . '/src/Models/Tree.php',
    'Vis\\Builder\\TreeController' => $baseDir . '/src/Http/Controllers/TreeController.php',
    'Vis\\Builder\\User' => $baseDir . '/src/Models/User.php',
    'Vis\\Builder\\Watermark' => $baseDir . '/src/libs/Watermark.php',
    'Vis\\TranslationsCMS\\Trans' => $baseDir . '/src/Models/Trans.php',
    'Vis\\TranslationsCMS\\Translate' => $baseDir . '/src/Models/Translate.php',
    'Vis\\TranslationsCMS\\TranslateController' => $baseDir . '/src/Http/Controllers/TranslateController.php',
);
