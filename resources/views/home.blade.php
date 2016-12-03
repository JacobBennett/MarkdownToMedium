@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                {{--<div class="panel-heading">Dashboard</div>--}}

                {{--<div class="panel-body">--}}
                    {{--You are logged in!--}}
                {{--</div>--}}
                <div class="panel-body">
                    <textarea name="text" v-model="text" rows="10" style="width: 100%;"></textarea>
                    <hr>
                    <button @click.prevent="parse">click me</button>
                    <button @click.prevent="createAllGists">build</button>
                </div>
            </div>
        </div>
        <div v-if="parsed.blocks.length" class="blocks col-md-12">
            <div class="panel panel-default" v-for="(block, index) in parsed.blocks">
                {{--<div class="panel-heading">@{{ block.name }}</div>--}}
                <div class="panel-heading"><input type="" v-model="parsed.blocks[index].name"></div>
                <div class="panel-body">
                    <pre>@{{ block.code }}</pre>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
