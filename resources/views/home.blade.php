@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" v-cloak>

        {{-- STEP 1 --}}
        <div v-if="step === 1">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="h3">Step 1: Paste</span>
                    </div>
                    <div class="panel-body">
                        Paste your Markdown into the input below.
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="h3">Paste Markdown Here</span>
                    </div>
                    <div class="panel-body">
                        <textarea name="text" class="form-control" v-model="text" rows="10" style="width: 100%;"></textarea>
                        <hr>
                        <button @click.prevent="parseMarkdown" class="btn btn-primary pull-right">Continue to Step 2</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- END STEP 1 --}}

        {{-- STEP 2 --}}
        <div v-if="step === 2">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="h3">Step 2: Name Your Codeblocks</span>
                    </div>
                    <div class="panel-body">
                        <div v-if="blocks.length">
                            We have parsed your Markdown and found the following codeblocks. Please name each code block (or leave the default) and continue on to step 3.
                            <hr>
                            <button @click.prevent="createAllGists" class="btn btn-primary pull-right">Continue to Step 3</button>
                            <button @click.prevent="step = 1" class="btn btn-primary">Back to Step 1</button>
                        </div>
                        <div v-else>
                            We did not find any codeblocks in your Markdown. Please continue on to step 3.
                            <hr>
                            <button @click.prevent="createAllGists" class="btn btn-primary pull-right">Continue to Step 3</button>
                            <button @click.prevent="step = 1" class="btn btn-primary">Back to Step 1</button>
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
        {{-- END STEP 2 --}}

        {{-- STEP 3 --}}
        <div v-if="step === 3">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="h3">Step 3: Publish</span>
                    </div>
                    <div class="panel-body">
                        <div v-if="creatingGists">
                            Generating Post
                        </div>
                        <div v-else>
                            Copy the following gist URL and use it to import your story into Medium.
                            <input v-model="finalGistUrl" type="text" class="form-control" />

                            <hr>
                            <a href="https://medium.com/p/import" target="_blank" class="btn btn-success pull-right">Import To Medium</a>
                            <a href="javascript:window.location.reload(true)" class="btn btn-primary">Start Over</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END STEP 3--}}

    </div>
</div>
@endsection
