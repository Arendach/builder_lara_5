
@foreach ($fields as $ident)
    @if (is_array($ident))
        <div class="row">
            @include('admin::tb.modal_form_edit_field_tabbed', ['fields' => $ident])
        </div>
        @continue
    @endif
    <?php
    $options = $def['fields'][$ident];
    $field = $controller->getField($ident);
    ?>

    @if ($field->isHidden())
        @continue
    @endif

    @if (isset($options['tabs']))
        {!! $field->getTabbedEditInput($row) !!}

        @continue
    @endif

    @if ($options['type'] == 'checkbox')
      <section class="{{$field->getAttribute('class_name') ? "section_field ".$field->getAttribute('class_name'): ""}}">
        {!! $field->getEditInput($row) !!}
      </section>
      @continue
    @endif
    @if ($options['type'] == 'hidden')
        {!! $field->getEditInput() !!}
        @continue
    @endif

    <section class="{{$field->getAttribute('class_name') ? "section_field ".$field->getAttribute('class_name'): ""}}">
        @if (!isset($options['is_hide_caption']) || !$options['is_hide_caption'])
            <label class="label" for="{{$ident}}">{{__cms($options['caption'])}}</label>
        @endif
        <div style="position: relative;">
            {!! $field->getEditInput($row) !!}
            {!! $field->getSubActions() !!}
        </div>
    </section>

@endforeach
