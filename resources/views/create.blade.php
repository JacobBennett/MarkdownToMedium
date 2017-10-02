@extends('layouts.app')
@section('content')
    <div class="frame mt3 w100" v-cloak>
        <div class="md-blk3"></div>
        <div class="md-blk6">
            {{-- STEP 1 --}}
            <div v-if="step === 1" class="frame bgw pt3 pb2 ph1 br6 fdc">
                <div class="blk">
                    <h2 class="ft9 tc1 fw7 brdr2--bottom">
                        Step 1 <small class="fw3">Paste your Markdown into the input below</small>
                    </h2>
                </div>
                <div class="blk mv2">
                    <textarea name="text" class="w100 brdr2 br6 ft3 pa2" style="border-color: #f18cb9;" v-model="text" rows="10" placeholder="Paste your Markdown here"></textarea>
                </div>
                <hr>
                <div class="blk mt2 tar">
                    <button @click.prevent="parseMarkdown" class="bg1 tcw ft4 pa1 br6">Continue to Step 2</button>
                </div>
            </div>
            {{-- STEP 2 --}}
            <div v-if="step === 2" class="frame bgw pt3 pb2 ph1 br6 fdc">
                <div class="blk">
                    <h2 class="ft9 tc1 fw7 brdr2--bottom">
                        Step 2 <small class="fw3">Name Your Codeblocks</small>
                    </h2>
                </div>
                <div class="blk mv2">
                    <div v-if="blocks.length">
                        <p class="ft4 mb2">
                            We have parsed your Markdown and found the following codeblocks. Please name each code block (or leave the default) and continue on to step 3.
                        </p>
                        <hr>
                        <div class="frame">
                            <div class="blk mt2">
                                <button @click.prevent="step = 1"  class="bg1 tcw ft4 pa1 br6">Back to Step 1</button>
                            </div>
                            <div class="blk mt2 tar">
                                <button @click.prevent="createAllGists" class="bg1 tcw ft4 pa1 br6">Continue to Step 3</button>
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <p class="ft4 mb2">
                            We did not find any codeblocks in your Markdown. Please continue on to step 3.
                        </p>
                        <hr>
                        <div class="frame">
                            <div class="blk mt2">
                                <button @click.prevent="step = 1"  class="bg1 tcw ft4 pa1 br6">Back to Step 1</button>
                            </div>
                            <div class="blk mt2 tar">
                                <button @click.prevent="createAllGists" class="bg1 tcw ft4 pa1 br6">Continue to Step 3</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="blocks.length" class="blk mt2">
                    <div class="blk bgg20 br6 mb2 pv2" v-for="(block, index) in blocks">
                        <div class="title">
                            <input v-model="blocks[index].name" type="text" class="brdr2 br6 ft3" style="border-color: #f18cb9; padding: .5rem;">
                        </div>
                        <div class="mt2">
                            <pre class="pa1"><code :class="'language-' + block.lang">@{{ block.code }}</code></pre>
                        </div>
                    </div>
                </div>
            </div>
            {{-- STEP 3 --}}
            <div v-if="step === 3" class="frame bgw pt3 pb2 ph1 br6 fdc">
                <div class="blk">
                    <h2 class="ft9 tc1 fw7 brdr2--bottom">
                        Step 3 <small class="fw3">Publish</small>
                    </h2>
                </div>
                <div class="blk mv2">
                    <div v-if="creatingGists" class="ft6 tac">
                        Generating Post
                    </div>
                    <div v-else>
                        <p class="ft4">
                            Copy the following gist URL and use it to import your story into Medium.
                        </p>
                        <div class="mv2">
                            <input v-model="finalGistUrl" type="text" class="w100 brdr2 br6 ft3" style="border-color: #f18cb9; padding: .5rem;"/>
                        </div>
                        <hr>
                        <div class="frame">
                            <div class="blk mt2">
                                <a href="javascript:window.location.reload(true)" class="bg1 tcw ft4 pa1 br6">Start Over</a>
                            </div>
                            <div class="blk mt2 tar">
                                <a href="https://medium.com/p/import" target="_blank" class="bg1 tcw ft4 pa1 br6">Import To Medium</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
