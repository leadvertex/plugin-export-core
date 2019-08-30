<?php
/**
 * @author Timur Kasumov (aka XAKEPEHOK)
 * Datetime: 20.06.2019 17:43
 */

namespace Leadvertex\Plugin\Handler;


use Leadvertex\Plugin\Components\ApiClient\ApiClient;
use Leadvertex\Plugin\Components\Developer\Developer;
use Leadvertex\Plugin\Components\Purpose\PluginPurpose;
use Leadvertex\Plugin\Handler\Components\HandleParams;
use Leadvertex\Plugin\Components\Form\Form;
use Leadvertex\Plugin\Components\I18n\I18nInterface;

interface PluginInterface
{

    public function __construct(
        ApiClient $apiClient,
        string $runtimeDir,
        string $publicDir,
        string $publicUrl
    );

    /**
     * @see \Leadvertex\Plugin\Components\I18n\I18nInterface::getLanguages
     * @return array
     */
    public static function getLanguages(): array;

    /**
     * Default language, that will be used when user language does't supported by your plugin
     * @see \Leadvertex\Plugin\Components\I18n\I18nInterface constants
     * @return string alpha-2 language code, for example: I18nInterface::en_US
     */
    public static function getDefaultLanguage(): string;

    /**
     * Should return human-friendly name of this plugin
     * @return I18nInterface
     */
    public static function getName(): I18nInterface;

    /**
     * Should return human-friendly description of this plugin
     * @return I18nInterface
     */
    public static function getDescription(): I18nInterface;

    /**
     * @return PluginPurpose of entities, that can be handled by plugin
     */
    public function getPurpose(): PluginPurpose;

    /**
     * @return Developer
     */
    public function getDeveloper(): Developer;

    /**
     * Should return settings form for plugin configs
     * @return Form|null
     */
    public function getSettingsForm(): ?Form;

    /**
     * Should return form for plugin options (before-handle form)
     * @return Form|null
     */
    public function getOptionsForm(): ?Form;

    /**
     * @param HandleParams $params
     * @return mixed
     */
    public function handle(HandleParams $params);

}