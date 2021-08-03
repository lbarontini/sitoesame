@php
        if (empty($imgFile)) {
            $imgFile = 'articleimage.jpg';
        }
        if (null !== $attrs) {
            $attrs = 'class="' . $attrs . '"';
        }

@endphp
<img src="{{ asset('images/products/' . $imgFile) }}" {!! $attrs !!}>
