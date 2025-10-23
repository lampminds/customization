<?php

namespace Lampminds\Customization\Traits;

use Filament\Resources\Resource;

trait CustomizableResource
{
    /**
     * Get the navigation group from configuration
     */
    public static function getNavigationGroup(): ?string
    {
        $configKey = strtolower(\class_basename(static::class)) . '_navigation_group';
        return \config("lmpcustomization.{$configKey}", parent::getNavigationGroup());
    }

    /**
     * Get the navigation sort from configuration
     */
    public static function getNavigationSort(): ?int
    {
        $configKey = strtolower(\class_basename(static::class)) . '_navigation_sort';
        return \config("lmpcustomization.{$configKey}", parent::getNavigationSort());
    }

    /**
     * Get the navigation icon from configuration
     */
    public static function getNavigationIcon(): ?string
    {
        $configKey = strtolower(\class_basename(static::class)) . '_navigation_icon';
        return \config("lmpcustomization.{$configKey}", parent::getNavigationIcon());
    }

    /**
     * Get the navigation label from configuration
     */
    public static function getNavigationLabel(): string
    {
        $configKey = strtolower(\class_basename(static::class)) . '_navigation_label';
        return \config("lmpcustomization.{$configKey}", parent::getNavigationLabel());
    }

    /**
     * Get the plural model label from configuration
     */
    public static function getPluralModelLabel(): string
    {
        $configKey = strtolower(\class_basename(static::class)) . '_plural_model_label';
        return \config("lmpcustomization.{$configKey}", parent::getPluralModelLabel());
    }

    /**
     * Get the model label from configuration
     */
    public static function getModelLabel(): string
    {
        $configKey = strtolower(\class_basename(static::class)) . '_model_label';
        return \config("lmpcustomization.{$configKey}", parent::getModelLabel());
    }

    /**
     * Check if the resource should be hidden from navigation
     */
    public static function shouldRegisterNavigation(): bool
    {
        $configKey = 'enable_' . strtolower(\class_basename(static::class));
        return \config("lmpcustomization.{$configKey}", true);
    }
}
