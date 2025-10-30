<?php
namespace Lampminds\Customization\Filament\LmpCustomization\FormComponents;

use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;

class LmpFormPhone
{
    /**
     * Create a new generic phone number input.
     * This format is valid for the rest of the world, except United States and Canada.
     *
     * @param string $label
     * @param string $name
     * @return \Filament\Forms\Components\TextInput
     */
    static function make(string $label = 'Phone', string $name = '') : TextInput
    {
        return TextInput::make($name == '' ? Str::snake($label) : $name)
            ->label(__($label))
            ->suffixIcon('heroicon-o-phone')
            ->tel()
            ->maxLength(50);
    }
}
