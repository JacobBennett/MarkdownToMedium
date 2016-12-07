@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" v-if="finalGistUrl !== ''">
                <div class="panel-heading">Gist to import to Medium</div>
                <div class="panel-body">
                    <input type="text" v-model="finalGistUrl"/>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Paste Markdown Here</div>
                <div class="panel-body">
                    <textarea name="text" v-model="text" rows="10" style="width: 100%;"></textarea>
                    <hr>
                    <transition>
                        <button v-if="! blocks.length" @click.prevent="parse" class="btn btn-primary">click me</button>
                        <button v-else @click.prevent="createAllGists" class="btn btn-primary">build</button>
                    </transition>
                </div>
            </div>
        </div>
        <div v-if="blocks.length" class="blocks col-md-12">
            <div class="panel panel-default" v-for="(block, index) in blocks">
                {{--<div class="panel-heading">@{{ block.name }}</div>--}}
                <div class="panel-heading"><input type="" v-model="blocks[index].name"></div>
                <div class="panel-body">
                    <pre>@{{ block.code }}</pre>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
