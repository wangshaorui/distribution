@extends('layout')

@section('css')
<link href="/css/highlight/github.css" rel="stylesheet">
<link href="/css/bootstrap-markdown.min.css" rel="stylesheet">
@stop

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="page-header">
            <legend>问题</legend>
        </div>

        <div class="question-detail">
            <h2>{{{$question->title}}}</h2>

            <div class="">
                {{$question->content}}
            </div>
        </div>
        
        <hr>

        <div class="page-header">
            <legend>回答</legend>
        </div>

        <form class="form-horizontal" action="{{ action('AskController@postQuestionAnswer') }}" method="post">

            <div class="form-group">
                <div class="col-sm-12">
                    <textarea id="editor" rows="10" name="markdown">{{$markdown or ''}}</textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    <input type="hidden" name="question_id" value="{{$question->id}}">
                    <button type="submit" class="btn btn-primary btn-wide">回答</button>
                </div>
            </div>
        </form>

    </div>

    <div class="col-sm-4">
        @include('sidebar')
    </div>
</div>
@stop

@section('js')
<script src="/js/libs/highlight.pack.js"></script>

<script src="/js/libs/marked.min.js"></script>
<script src="/js/libs/to-markdown.js"></script>
<script src="/js/bootstrap-markdown.js"></script>
<script src="/js/bootstrap-markdown.zh.js"></script>

<script>
$(function(){
    // code hightlight
    $('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
    });

    $("#editor").markdown({
        language:'zh',
        iconlibrary: 'fa',
        onPreview: function(e) {

            if (e.isDirty()) {

                // hack
                setTimeout(function(){
                    preview = $('.md-preview');
                    MathJax.Hub.Queue(['Typeset', MathJax.Hub, preview[0]]);

                    // hightlight
                    preview.find('pre code').each(function(i, block) {
                        hljs.highlightBlock(block);
                    });
                }, 100);

            }
            else {

            }

        },
    });

});
</script>
@stop