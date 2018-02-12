@extends('layouts.form')

@section('card')

    @component('components.card')

        @slot('title')
            @lang('Ajouter un article')
        @endslot

        <form method="POST" action="{{ route('image.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            @include('partials.form-group', [
                'title' => __('Titre'),
                'type' => 'text',
                'name' => 'title',
                'required' => true,
                ])

            <div class="form-group{{ $errors->has('image') ? ' is-invalid' : '' }}">        
                <div class="custom-file">
                    <input type="file" id="image" name="image" class="{{ $errors->has('image') ? ' is-invalid ' : '' }}custom-file-input" required>
                    <label class="custom-file-label" for="image"></label>
                    @if ($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="category_id">@lang('Catégorie')</label>
                <select id="category_id" name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Texte de l'article</label>
                <textarea id="description" name="description" class="form-control">
                </textarea>
            </div>

            @component('components.button')
                @lang('Envoyer')
            @endcomponent

        </form>

    @endcomponent            

@endsection

@section('script')

    <script>
        $(function() {
            $('input[type="file"]').on('change',function(){
              let fileName = $(this).val().replace(/^.*[\\\/]/, '')
              $(this).next('.form-control-file').html(fileName)
            })
        })
    </script>

@endsection