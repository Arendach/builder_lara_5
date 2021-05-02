<?php

namespace Vis\Builder\Fields;

use Illuminate\Support\Facades\App;

class Text extends Field
{
    protected $transliterationField;
    protected $transliterationOnlyEmpty;

    public function transliteration(string $field, bool $onlyEmpty = false)
    {
        $this->transliterationField = $field;
        $this->transliterationOnlyEmpty = $onlyEmpty;

        return $this;
    }

    public function getTraslationField() : ?string
    {
        return $this->transliterationField;
    }

    public function getTraslationOnlyEmpty() : ?bool
    {
        return $this->transliterationOnlyEmpty;
    }
}
