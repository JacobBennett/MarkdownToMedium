<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Markdown To Medium - The fastest way to get your Markdown post onto Medium</title>
        <meta name="description" content="If you want to publish a Markdown post to Medium with syntax highlighted code snippets, there is literally no faster way to make that happen than by using this tool.">

        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">

        <!-- Styles -->
        <link rel="stylesheet" href="{{elixir('css/app.css')}}">
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-51293444-5', 'auto');
            ga('send', 'pageview');

        </script>

    </head>
    <body class="bgg10">
    <div class="full landing-bg">

        <div class="site-width ph3 center">
            <div class="blk pt2 tal">
                <a href="http://markdowntomedium.com" class="dim">
                    @include('assets.logo')
                </a>
            </div>
            <div class="blk pt2 tac">
                <h1 class="hero-text tcw mt5">
                    Create Medium posts<br/>
                    from Markdown in a snap.
                </h1>
                <p class="ft6 tcw mt1 lh1-7">
                    Including syntax highlighting for all your fancy<br/>
                    code blocks.
                </p>
                <p class="mt4">
                    <a href="create" class="iflex aic ft6 fw6 pv1.5 ph2 tcw bg1 lh1 brdr3--bottom bc1--dark :bg1--light">
                        <span class="mr1">
                            <svg style="width: 2.5rem; height: 2.5rem" width="2.5rem" height="2.5rem" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><title>github-white</title><path d="M256,0C114.61,0,0,114.61,0,256S114.61,512,256,512,512,397.39,512,256,397.39,0,256,0ZM408,408a214.35,214.35,0,0,1-68.35,46.09q-9.75,4.13-19.8,7.25V423q0-30.25-20.75-44.5A224,224,0,0,0,323,375a180.19,180.19,0,0,0,23-6.5,113.94,113.94,0,0,0,21.75-10.12,90.69,90.69,0,0,0,18.5-15.25,89.21,89.21,0,0,0,14.88-21.25,116.48,116.48,0,0,0,9.5-28.5,178,178,0,0,0,3.5-36.62q0-38.75-25.25-66,11.5-30-2.5-65.25l-6.25-.75q-6.5-.75-23.37,5.5t-37.87,20.5a230,230,0,0,0-61.75-8.25,225.51,225.51,0,0,0-61.5,8.25,214.12,214.12,0,0,0-25.12-14.87,129.34,129.34,0,0,0-19-8,65.16,65.16,0,0,0-13.25-2.62,47,47,0,0,0-7.87-.25,16,16,0,0,0-2.5.5q-14,35.5-2.5,65.25-25.25,27.25-25.25,66a178.07,178.07,0,0,0,3.5,36.63,116.53,116.53,0,0,0,9.5,28.5A89.24,89.24,0,0,0,128,343.13a90.75,90.75,0,0,0,18.5,15.25,114,114,0,0,0,21.75,10.13,180.24,180.24,0,0,0,23,6.5,224.05,224.05,0,0,0,23.88,3.5q-20.5,14-20.5,44.5v39.11a215.13,215.13,0,0,1-22.3-404.24A215,215,0,0,1,408,408Z" fill="#fff"/></svg>
                        </span>
                        Get Started
                    </a>
                </p>
            </div>
            <div class="tac mt5">
                <img src="img/markdowneditor.jpg" alt="Markdown Code Editor describing how markdown to medium works" style="width: 75%">
            </div>
        </div>

    </div>

    <div class="full bgw pv5">

        <div class="site-width ph3 center">
            <div class="frame">
                <div class="blk md-blk6">
                    <h2 class="ft5 tc1 fw3">Why do I need this?</h2>

                    <p class="ft4 mv2 lh1-6 tcg50">
                        If you want to publish a Markdown post to Medium and you want it to contain syntax highlighted code
                        snippets, there is literally no faster way to make that happen than by using this tool.
                    </p>

                    <h2 class="ft5 tc1 fw3">How does it work?</h2>

                    <p class="ft4 mv2 lh1-6 tcg50">
                        This tool takes the pain out of importing a Markdown post into Medium by doing the
                        manual labor for you (creating a gist on Github of your markdown). It also scans your Markdown
                        file for any code blocks and extracts them into their own gists
                        so Medium can syntax highlight them.
                    </p>
                </div>

                <div class="blk md-blk6">
                    <h2 class="ft5 tc1 fw3">Why Github?</h2>

                    <p class="ft4 mv2 lh1-6 tcg50">
                        To import your Markdown to Medium, we need to create a few gists for you which requires Github authorization.
                        Promise we won't use your email for anything except for the purpose of this tool!
                    </p>

                    <h2 class="ft5 tc1 fw3">How can I ever thank you?</h2>

                    <p class="ft4 mv2 lh1-6 tcg50">
                        Wow! That was really kind of you to ask. Really, most people don't even read this far, but not you. You my friend
                        are a rare breed. You can thank me by saying hi on twitter <a href="https://twitter.com/jacobbennett" class="tc2 dim">@jacobbennett</a>
                        and by sharing this with those that could use it.
                    </p>

                </div>
            </div>

            <div class="center mt3 brdr1--top bcg05">
                <p class="mt2 ft3 tar tcg30">
                    created by <a href="http://jakebennett.net" class="tc2">Jake Bennett</a>
                </p>
            </div>
        </div>


    </div>

    </body>
</html>
