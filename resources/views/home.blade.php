@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" v-if="finalGistUrl !== ''">
                <div class="panel-heading">Gist to import to Medium</div>
                <div class="panel-body">
                    <input v-model="finalGistUrl" type="text" class="form-control" />
                </div>
            </div>
        </div>

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
                        <button v-if="! blocks.length" @click.prevent="parseMarkdown" class="btn btn-primary">Continue to Step 2</button>
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
                        <span class="h3">Step 2: Parse</span>
                    </div>
                    <div class="panel-body">
                        <div v-if="blocks.length">
                            We have parsed your Markdown and found the following code blocks. Please name each code block (or leave the default) and continue on to step 3.
                            <hr>
                            <button @click.prevent="createAllGists" class="btn btn-primary">Continue to Step 3</button>
                        </div>
                        <div v-else>
                            We did not find any code blocks in your Markdown. Please continue on to step 3.
                            <hr>
                            <button @click.prevent="createAllGists" class="btn btn-primary">Continue to Step 3</button>
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
</div>
@endsection
