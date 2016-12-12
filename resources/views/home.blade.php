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
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Paste Markdown Here</div>
                <div class="panel-body">
                    <textarea name="text" class="form-control" v-model="text" rows="10" style="width: 100%;"></textarea>
                    <hr>
                    <button v-if="! blocks.length" @click.prevent="parse" class="btn btn-primary">Parse Markdown</button>
                    <button v-else @click.prevent="createAllGists" class="btn btn-primary">Build Markdown Import</button>
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
@endsection
