<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit92ce10362f3539484f1905e296aad13e
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Vis\\Builder\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Vis\\Builder\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'CreateActivationsTable' => __DIR__ . '/../..' . '/src/Migrations/2018_02_22_100056_create_activations_table.php',
        'CreatePersistencesTable' => __DIR__ . '/../..' . '/src/Migrations/2018_02_22_103113_create_persistences_table.php',
        'CreateRemindersTable' => __DIR__ . '/../..' . '/src/Migrations/2018_02_22_103444_create_reminders_table.php',
        'CreateRevisions' => __DIR__ . '/../..' . '/src/Migrations/2018_02_22_141402_create_revisions.php',
        'CreateRoleUsersTable' => __DIR__ . '/../..' . '/src/Migrations/2018_02_22_095823_create_role_users_table.php',
        'CreateRolesTable' => __DIR__ . '/../..' . '/src/Migrations/2018_02_22_094422_create_roles_table.php',
        'CreateSettingSelectTable' => __DIR__ . '/../..' . '/src/Migrations/2018_02_22_104132_create_setting_select_table.php',
        'CreateSettingsTable' => __DIR__ . '/../..' . '/src/Migrations/2018_02_22_103844_create_settings_table.php',
        'CreateTbTreeTable' => __DIR__ . '/../..' . '/src/Migrations/2018_02_22_104452_create_tb_tree_table.php',
        'CreateThrottleTable' => __DIR__ . '/../..' . '/src/Migrations/2018_02_22_105621_create_throttle_table.php',
        'CreateTranslationsCmsTable' => __DIR__ . '/../..' . '/src/Migrations/2018_02_22_110107_create_translations_cms_table.php',
        'CreateTranslationsPhrasesCmsTable' => __DIR__ . '/../..' . '/src/Migrations/2018_02_22_105933_create_translations_phrases_cms_table.php',
        'CreateUsersTable' => __DIR__ . '/../..' . '/src/Migrations/2018_02_22_093849_create_users_table.php',
        'Vis\\Builder\\AdminSeeder' => __DIR__ . '/../..' . '/src/Seeds/AdminSeeder.php',
        'Vis\\Builder\\Authenticate' => __DIR__ . '/../..' . '/src/Http/Middleware/Authenticate.php',
        'Vis\\Builder\\AuthenticateFrontend' => __DIR__ . '/../..' . '/src/Http/Middleware/AuthenticateFrontend.php',
        'Vis\\Builder\\ChangeRangeController' => __DIR__ . '/../..' . '/src/Http/Controllers/ChangeRangeController.php',
        'Vis\\Builder\\ControllersNew\\ListController' => __DIR__ . '/../..' . '/src/Http/ControllersNew/ListController.php',
        'Vis\\Builder\\ControllersNew\\TreeController' => __DIR__ . '/../..' . '/src/Http/ControllersNew/TreeController.php',
        'Vis\\Builder\\CreateConfig' => __DIR__ . '/../..' . '/src/Console/CreateConfig.php',
        'Vis\\Builder\\CreateImgWebp' => __DIR__ . '/../..' . '/src/Console/CreateImgWebp.php',
        'Vis\\Builder\\DashboardController' => __DIR__ . '/../..' . '/src/Http/Controllers/DashboardController.php',
        'Vis\\Builder\\Definitions\\BaseTree' => __DIR__ . '/../..' . '/src/Http/Definitions/BaseTree.php',
        'Vis\\Builder\\Definitions\\Resource' => __DIR__ . '/../..' . '/src/Http/Definitions/Resource.php',
        'Vis\\Builder\\Definitions\\ResourceTree' => __DIR__ . '/../..' . '/src/Http/Definitions/ResourceTree.php',
        'Vis\\Builder\\EditorController' => __DIR__ . '/../..' . '/src/Http/Controllers/EditorController.php',
        'Vis\\Builder\\Event' => __DIR__ . '/../..' . '/src/Models/Event.php',
        'Vis\\Builder\\Fields\\Checkbox' => __DIR__ . '/../..' . '/src/Http/Fields/Checkbox.php',
        'Vis\\Builder\\Fields\\Color' => __DIR__ . '/../..' . '/src/Http/Fields/Color.php',
        'Vis\\Builder\\Fields\\Date' => __DIR__ . '/../..' . '/src/Http/Fields/Date.php',
        'Vis\\Builder\\Fields\\Datetime' => __DIR__ . '/../..' . '/src/Http/Fields/Datetime.php',
        'Vis\\Builder\\Fields\\Definition' => __DIR__ . '/../..' . '/src/Http/Fields/Definition.php',
        'Vis\\Builder\\Fields\\Field' => __DIR__ . '/../..' . '/src/Http/Fields/Field.php',
        'Vis\\Builder\\Fields\\File' => __DIR__ . '/../..' . '/src/Http/Fields/File.php',
        'Vis\\Builder\\Fields\\Foreign' => __DIR__ . '/../..' . '/src/Http/Fields/Foreign.php',
        'Vis\\Builder\\Fields\\ForeignAjax' => __DIR__ . '/../..' . '/src/Http/Fields/ForeignAjax.php',
        'Vis\\Builder\\Fields\\Froala' => __DIR__ . '/../..' . '/src/Http/Fields/Froala.php',
        'Vis\\Builder\\Fields\\Hidden' => __DIR__ . '/../..' . '/src/Http/Fields/Hidden.php',
        'Vis\\Builder\\Fields\\Id' => __DIR__ . '/../..' . '/src/Http/Fields/Id.php',
        'Vis\\Builder\\Fields\\Image' => __DIR__ . '/../..' . '/src/Http/Fields/Image.php',
        'Vis\\Builder\\Fields\\ManyToMany' => __DIR__ . '/../..' . '/src/Http/Fields/ManyToMany.php',
        'Vis\\Builder\\Fields\\ManyToManyAjax' => __DIR__ . '/../..' . '/src/Http/Fields/ManyToManyAjax.php',
        'Vis\\Builder\\Fields\\MultiFile' => __DIR__ . '/../..' . '/src/Http/Fields/MultiFile.php',
        'Vis\\Builder\\Fields\\MultiImage' => __DIR__ . '/../..' . '/src/Http/Fields/MultiImage.php',
        'Vis\\Builder\\Fields\\Number' => __DIR__ . '/../..' . '/src/Http/Fields/Number.php',
        'Vis\\Builder\\Fields\\Password' => __DIR__ . '/../..' . '/src/Http/Fields/Password.php',
        'Vis\\Builder\\Fields\\Permissions' => __DIR__ . '/../..' . '/src/Http/Fields/Permissions.php',
        'Vis\\Builder\\Fields\\Readonly' => __DIR__ . '/../..' . '/src/Http/Fields/Readonly.php',
        'Vis\\Builder\\Fields\\Relations\\Options' => __DIR__ . '/../..' . '/src/Http/Fields/Relations/Options.php',
        'Vis\\Builder\\Fields\\Select' => __DIR__ . '/../..' . '/src/Http/Fields/Select.php',
        'Vis\\Builder\\Fields\\SelectWithPicture' => __DIR__ . '/../..' . '/src/Http/Fields/SelectWithPicture.php',
        'Vis\\Builder\\Fields\\Text' => __DIR__ . '/../..' . '/src/Http/Fields/Text.php',
        'Vis\\Builder\\Fields\\Textarea' => __DIR__ . '/../..' . '/src/Http/Fields/Textarea.php',
        'Vis\\Builder\\GeneratePassword' => __DIR__ . '/../..' . '/src/Console/GeneratePassword.php',
        'Vis\\Builder\\Group' => __DIR__ . '/../..' . '/src/Models/Group.php',
        'Vis\\Builder\\Helpers\\Traits\\ImagesTrait' => __DIR__ . '/../..' . '/src/Http/Traits/ImagesTrait.php',
        'Vis\\Builder\\Helpers\\Traits\\Query\\Builder' => __DIR__ . '/../..' . '/src/Http/Traits/Query/Builder.php',
        'Vis\\Builder\\Helpers\\Traits\\QuickEditTrait' => __DIR__ . '/../..' . '/src/Http/Traits/QuickEditTrait.php',
        'Vis\\Builder\\Helpers\\Traits\\Rememberable' => __DIR__ . '/../..' . '/src/Http/Traits/Rememberable.php',
        'Vis\\Builder\\Helpers\\Traits\\SeoTrait' => __DIR__ . '/../..' . '/src/Http/Traits/SeoTrait.php',
        'Vis\\Builder\\Helpers\\Traits\\TranslateTrait' => __DIR__ . '/../..' . '/src/Http/Traits/TranslateTrait.php',
        'Vis\\Builder\\Helpers\\Traits\\ViewPageTrait' => __DIR__ . '/../..' . '/src/Http/Traits/ViewPageTrait.php',
        'Vis\\Builder\\Helpers\\Traits\\ViewedTrait' => __DIR__ . '/../..' . '/src/Http/Traits/ViewedTrait.php',
        'Vis\\Builder\\Helpers\\URLify' => __DIR__ . '/../..' . '/src/libs/URLify.php',
        'Vis\\Builder\\Img' => __DIR__ . '/../..' . '/src/libs/Img.php',
        'Vis\\Builder\\InstallCommand' => __DIR__ . '/../..' . '/src/Console/InstallCommand.php',
        'Vis\\Builder\\Libs\\LaravelLogViewer' => __DIR__ . '/../..' . '/src/libs/LaravelLogViewer.php',
        'Vis\\Builder\\LocalizationMiddlewareRedirect' => __DIR__ . '/../..' . '/src/Http/Middleware/LocalizationMiddlewareRedirect.php',
        'Vis\\Builder\\LogViewerController' => __DIR__ . '/../..' . '/src/Http/Controllers/LogViewerController.php',
        'Vis\\Builder\\LoginController' => __DIR__ . '/../..' . '/src/Http/Controllers/LoginController.php',
        'Vis\\Builder\\OptmizationImg' => __DIR__ . '/../..' . '/src/libs/OptmizationImg.php',
        'Vis\\Builder\\Revision' => __DIR__ . '/../..' . '/src/Models/Revision.php',
        'Vis\\Builder\\Services\\Actions' => __DIR__ . '/../..' . '/src/Http/Services/Actions.php',
        'Vis\\Builder\\Services\\Listing' => __DIR__ . '/../..' . '/src/Http/Services/Listing.php',
        'Vis\\Builder\\Services\\Revisions' => __DIR__ . '/../..' . '/src/Http/Services/Revisions.php',
        'Vis\\Builder\\Setting' => __DIR__ . '/../..' . '/src/Models/Setting.php',
        'Vis\\Builder\\SettingSelect' => __DIR__ . '/../..' . '/src/Models/SettingSelect.php',
        'Vis\\Builder\\Setting\\AdminBase' => __DIR__ . '/../..' . '/src/Settings/AdminBase.php',
        'Vis\\Builder\\Setting\\Login' => __DIR__ . '/../..' . '/src/Settings/Login.php',
        'Vis\\Builder\\SettingsController' => __DIR__ . '/../..' . '/src/Http/Controllers/SettingsController.php',
        'Vis\\Builder\\TBController' => __DIR__ . '/../..' . '/src/Http/Controllers/TBController.php',
        'Vis\\Builder\\TableAdminController' => __DIR__ . '/../..' . '/src/Http/Controllers/TableAdminController.php',
        'Vis\\Builder\\Tree' => __DIR__ . '/../..' . '/src/Models/Tree.php',
        'Vis\\Builder\\TreeController' => __DIR__ . '/../..' . '/src/Http/Controllers/TreeController.php',
        'Vis\\Builder\\User' => __DIR__ . '/../..' . '/src/Models/User.php',
        'Vis\\Builder\\Watermark' => __DIR__ . '/../..' . '/src/libs/Watermark.php',
        'Vis\\TranslationsCMS\\Trans' => __DIR__ . '/../..' . '/src/Models/Trans.php',
        'Vis\\TranslationsCMS\\Translate' => __DIR__ . '/../..' . '/src/Models/Translate.php',
        'Vis\\TranslationsCMS\\TranslateController' => __DIR__ . '/../..' . '/src/Http/Controllers/TranslateController.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit92ce10362f3539484f1905e296aad13e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit92ce10362f3539484f1905e296aad13e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit92ce10362f3539484f1905e296aad13e::$classMap;

        }, null, ClassLoader::class);
    }
}
