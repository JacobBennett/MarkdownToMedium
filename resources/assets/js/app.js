
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

var extract = require('extract-gfm');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// parse markdown for code blocks +
// create private gists for code blocks and get urls +
// replace code blocks with urls +
// create new private gist for new text
// show popup with new gist url to paste into medium

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',
    data: {
        step: 1,
        creatingGists: false,
        text: '',
        parsed: {blocks: []},
        blocks: [],
        finalGistUrl: '',
    },
    methods: {
        parseMarkdown() {
            this.parsed = extract.parseBlocks(this.text);
            this.blocks = this.parsed.blocks.map(
                (block, index) => {
                    let lang = block.lang === 'python' ? 'py' : block.lang;
                    return {...block, name: `block${index+1}.${lang}`}
                }
            );

            this.step = 2;
        },

        createGist(gist) {
            return this.$http.post('/gist', gist).then(
                response => response.data.html_url,
                response => console.log('error', response)
            )
        },

        createAllGists() {
            this.step = 3;
            this.creatingGists = true;
            Promise.all(
                this.blocks.map(
                    block => this.createGist(block).then(url => ({...block, url}))
                )
            ).then(blocksWithUrls => {
                this.blocks = blocksWithUrls;
                this.replaceCodeWithUrls();
                this.createGist({name: 'blog.md', code: this.text})
                    .then(url => {
                        this.creatingGists = false;
                        this.finalGistUrl = url;
                    });
            });

        },

        replaceCodeWithUrls() {
            let injectBlocks = function(str, o) {
                var arr = str.match(/(__CODE_BLOCK\d+__)/g) || [];
                return arr.reduce(function(acc, match, i) {
                    return acc.replace(match, `${o[i].url}\n`);
                }, str);
            };
            this.text = injectBlocks(this.parsed.text, this.blocks);
        }
    }
});