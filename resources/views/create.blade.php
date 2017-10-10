@extends('layouts.app')
@section('header_scripts')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@endsection
@section('content')
<div class="container">
    <div class="row" v-cloak>

        {{-- STEP 1 --}}
        <div v-if="step === 1">
            <div class="row">
                <aside class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="fw7">Step 1:</span>
                            Paste
                            <svg class="icon icon-sm fwhite" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10.5 20H2a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h1V3l2.03-.4a3 3 0 0 1 5.94 0L13 3v1h1a2 2 0 0 1 2 2v1h-2V6h-1v1H3V6H2v12h5v2h3.5zM8 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm2 4h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-8a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2zm0 2v8h8v-8h-8z"/></svg>
                        </li>
                    </ul>
                </aside>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="h3">Paste Markdown Here</span>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <textarea name="text" class="form-control" v-model="text" rows="10" style="width: 100%;"></textarea>
                            </div>
                            <div class="form-group">
                                <button @click.prevent="parseMarkdown" class=":bg1--light aic bc1--dark bg1 brdr3--bottom ft6 fw6 iflex lh1 ph2 pv1.5 tcw pull-right">Continue to Step 2</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END STEP 1 --}}

        {{-- STEP 2 --}}
        <div v-if="step === 2">

         <div class="row">
            <aside class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="fw7">Step 2:</span>
                        Name Your Codeblocks
                        <svg class="icon icon-sm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
                    </li>
                </ul>
            </aside>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="h3">Name Your Codeblocks Here</span>
                    </div>
                    <div class="panel-body">
                        <div v-if="blocks.length">
                            We have parsed your Markdown and found the following codeblocks. Please name each code block (or leave the default) and continue on to step 3.
                            <hr>
                            <button @click.prevent="createAllGists" class=":bg1--light aic bc1--dark bg1 brdr3--bottom ft6 fw6 iflex lh1 ph2 pv1.5 tcw pull-right">Continue to Step 3</button>
                            <button @click.prevent="step = 1" class=":bg1--light aic bc1--dark bg1 brdr3--bottom ft6 fw6 iflex lh1 ph2 pv1.5 tcw">Back to Step 1</button>
                        </div>
                        <div v-else>
                            We did not find any codeblocks in your Markdown. Please continue on to step 3.
                            <hr>
                            <button @click.prevent="createAllGists" class=":bg1--light aic bc1--dark bg1 brdr3--bottom ft6 fw6 iflex lh1 ph2 pv1.5 tcw pull-right">Continue to Step 3</button>
                            <button @click.prevent="step = 1" class=":bg1--light aic bc1--dark bg1 brdr3--bottom ft6 fw6 iflex lh1 ph2 pv1.5 tcw">Back to Step 1</button>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="blocks.length" class="blocks col-md-12">
                <div class="panel panel-default" v-for="(block, index) in blocks">
                    <div class="panel-heading">
                        <input v-model="blocks[index].name" type="text" class="form-control" >
                    </div>
                    <div class="panel-body">
                        <pre>@{{ block.code }}</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END STEP 2 --}}

    {{-- STEP 3 --}}
    <div v-if="step === 3">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="h4">Step 3: Publish <svg class="icon icon-sm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 10c0-1.1.9-2 2-2h8c1.1 0 2 .9 2 2v8c0 1.1-.9 2-2 2H6c-1.1 0-2-.9-2-2v-8zm2 0v8h8v-8h-2V8H8v2H6zm3-6.17V16h2V3.83l3.07 3.07 1.42-1.41L10 0l-.7.7L4.5 5.5l1.42 1.4L9 3.84z"/></svg>
                    </span>
                </div>
                <div class="panel-body">
                    <div v-if="creatingGists">
                        Generating Post
                    </div>
                    <div v-else>
                        Copy the following gist URL and use it to import your story into Medium.
                        <input v-model="finalGistUrl" type="text" class="form-control" />

                        <hr>
                        <a href="https://medium.com/p/import" target="_blank" class=":bg1--light aic bc1--dark bg1 brdr3--bottom ft6 fw6 iflex lh1 ph2 pv1.5 tcw pull-right">Import To Medium</a>
                        <a href="javascript:window.location.reload(true)" class="btn btn-primary aic ft6 fw6 iflex lh1 ph2 pv1.5">Start Over</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END STEP 3--}}

</div>
</div>
@endsection
