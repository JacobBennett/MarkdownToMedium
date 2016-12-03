
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

// parse markdown for code blocks
// create private gists for code blocks and get urls
// replace code blocks with urls

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',
    data: {
        text: '',
        parsed: {blocks: []},
        blocks: [],
    },
    methods: {
        parse() {
            this.parsed = extract.parseBlocks(this.text);
            this.blocks = this.parsed.blocks.map(
                (block, index) => ({...block, name: `block${index+1}.${block.lang}`})
            );
        },

        createAllGists() {
            Promise.all(
                this.blocks.map(
                    block => this.createGist(block).then(url => ({...block, url}))
                )
            ).then(blocksWithUrls => {
                this.blocks = blocksWithUrls;
                this.replaceCodeWithUrls();
            });

        },

        createGist(gist) {
            return this.$http.post('/gist', gist).then(
                response => response.data.html_url,
                response => console.log('error', response)
            )
        },

        replaceCodeWithUrls() {
            this.text = extract.injectBlocks(this.parsed.text, this.blocks);
        }
    }
});

// exports.injectBlocks = function(str, o) {
//     var arr = str.match(idRegex) || [];
//     return arr.reduce(function(acc, match, i) {
//         return acc.replace(match, exports.createBlock(o[i]));
//     }, str);
// };
